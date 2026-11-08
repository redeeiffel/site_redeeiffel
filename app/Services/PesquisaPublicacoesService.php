<?php

namespace App\Services;

use App\Models\Publicacao;
use Illuminate\Support\Str;

class PesquisaPublicacoesService
{
    public function pesquisar(string $pergunta, string $idioma = 'pt'): ?array
    {
        $texto = $this->normalizar($pergunta);

        $noticias = $this->contemTermo($texto, [
            'noticia', 'noticias', 'publicacao', 'publicacoes',
            'novidade', 'novidades', 'news',
            'actualite', 'actualites', 'nouvelles'
        ]);

        $eventos = $this->contemTermo($texto, [
            'evento', 'eventos', 'actividade', 'actividades',
            'atividade', 'atividades', 'event', 'events',
            'activities', 'evenement', 'evenements', 'activites'
        ]);

        if (!$noticias && !$eventos) {
            return null;
        }

        $tipo = $eventos && !$noticias ? 2 : 1;

        $termos = $this->extrairTermos($texto);

        $registos = Publicacao::query()
            ->where('tipo', $tipo)
            ->orderByDesc('id')
            ->get();

        $resultados = [];

        foreach ($registos as $publicacao) {
            $pontuacao = $this->pontuar($publicacao, $termos);

            if (!empty($termos) && $pontuacao === 0) {
                continue;
            }

            $resultados[] = [
                'publicacao' => $publicacao,
                'pontuacao' => $pontuacao,
            ];
        }

        usort($resultados, function ($a, $b) {
            if ($a['pontuacao'] === $b['pontuacao']) {
                return $b['publicacao']->id <=> $a['publicacao']->id;
            }

            return $b['pontuacao'] <=> $a['pontuacao'];
        });

        $resultados = array_slice($resultados, 0, 5);

        if (empty($resultados)) {
            return [
                'encontrado' => false,
                'resposta' => $this->mensagemSemResultados(
                    $idioma,
                    $tipo,
                    !empty($termos)
                ),
                'fontes' => [],
            ];
        }

        $linhas = [];
        $fontes = [];

        foreach ($resultados as $resultado) {
            $publicacao = $resultado['publicacao'];

            $titulo = trim((string) $publicacao->titulo);

            if ($titulo === '') {
                continue;
            }

            $descricao = Str::limit(
                trim(strip_tags((string) $publicacao->descricao)),
                180
            );

            $linhas[] = $titulo
                . ($descricao !== '' ? ' — ' . $descricao : '');

            $fontes[] = [
                'titulo' => $titulo,
                'url' => $tipo === 1
                    ? route('detalhes_noticias', ['id' => $publicacao->id])
                    : route('eventos'),
            ];
        }

        if (empty($linhas)) {
            return [
                'encontrado' => false,
                'resposta' => $this->mensagemSemResultados(
                    $idioma,
                    $tipo,
                    !empty($termos)
                ),
                'fontes' => [],
            ];
        }

        $introducao = match ($idioma) {
            'en' => $tipo === 1
                ? 'News found on the Rede Eiffel website:'
                : 'Events found on the Rede Eiffel website:',
            'fr' => $tipo === 1
                ? 'Actualités trouvées sur le site du Réseau Eiffel :'
                : 'Événements trouvés sur le site du Réseau Eiffel :',
            default => $tipo === 1
                ? 'Notícias encontradas no site da Rede Eiffel:'
                : 'Eventos encontrados no site da Rede Eiffel:',
        };

        return [
            'encontrado' => true,
            'resposta' => $introducao . "\n" . implode("\n", $linhas),
            'fontes' => $fontes,
        ];
    }

    private function extrairTermos(string $texto): array
    {
        $ignorar = [
            'quais', 'qual', 'sobre', 'existem', 'existe',
            'ultimas', 'ultima', 'ultimos', 'ultimo', 'novas', 'nova',
            'recentes', 'recente', 'noticias', 'noticia',
            'publicacoes', 'publicacao', 'novidades', 'novidade',
            'eventos', 'evento', 'actividades', 'actividade',
            'atividades', 'atividade', 'rede', 'eiffel',
            'para', 'com', 'das', 'dos', 'uma', 'uns',
            'que', 'sao', 'tem', 'mais', 'hoje',
            'news', 'latest', 'recent', 'about', 'what',
            'the', 'are', 'there', 'any', 'and',
            'actualites', 'actualite', 'dernieres',
            'derniere', 'quelles', 'quels', 'sont',
            'les', 'des', 'sur', 'dans', 'une',
            'nouvelles', 'evenements', 'evenement',
            'events', 'event', 'activities', 'activites',
            'publicadas', 'publicados', 'publicada', 'publicado',
            'aconteceu', 'aconteceram', 'acontecer',
            'recentemente', 'site', 'informacoes'
        ];

        $palavras = preg_split('/[^a-z0-9]+/', $texto, -1, PREG_SPLIT_NO_EMPTY);

        return array_values(array_unique(array_filter(
            $palavras,
            fn ($palavra) =>
                strlen($palavra) >= 3
                && !in_array($palavra, $ignorar, true)
        )));
    }

    private function pontuar(Publicacao $publicacao, array $termos): int
    {
        if (empty($termos)) {
            return 1;
        }

        $titulo = $this->normalizar((string) $publicacao->titulo);

        $descricao = $this->normalizar(
            strip_tags((string) $publicacao->descricao)
        );

        $conteudo = $this->normalizar(implode(' ', [
            (string) $publicacao->local,
            strip_tags((string) $publicacao->texto_inicial),
            strip_tags((string) $publicacao->texto_secundario),
            strip_tags((string) $publicacao->texto_terceario),
            strip_tags((string) $publicacao->texto_quarto),
        ]));

        $pontuacao = 0;

        foreach ($termos as $termo) {
            if ($this->contemPalavra($titulo, $termo)) {
                $pontuacao += 5;
            }

            if ($this->contemPalavra($descricao, $termo)) {
                $pontuacao += 3;
            }

            if ($this->contemPalavra($conteudo, $termo)) {
                $pontuacao += 1;
            }
        }

        return $pontuacao;
    }

    private function contemTermo(string $texto, array $termos): bool
    {
        foreach ($termos as $termo) {
            if ($this->contemPalavra($texto, $this->normalizar($termo))) {
                return true;
            }
        }

        return false;
    }

    private function contemPalavra(string $texto, string $termo): bool
    {
        return preg_match(
            '/(?<![a-z0-9])' . preg_quote($termo, '/') . '(?![a-z0-9])/',
            $texto
        ) === 1;
    }

    private function normalizar(string $texto): string
    {
        return trim(
            preg_replace('/\s+/u', ' ', Str::ascii(mb_strtolower($texto)))
        );
    }

    private function mensagemSemResultados(
        string $idioma,
        int $tipo,
        bool $pesquisaEspecifica
    ): string {
        if ($pesquisaEspecifica) {
            return match ($idioma) {
                'en' => 'No publications matching this subject were found.',
                'fr' => 'Aucune publication correspondant à ce sujet n’a été trouvée.',
                default => 'Não foram encontradas publicações relacionadas com esse assunto.',
            };
        }

        return match ($idioma) {
            'en' => 'There are currently no publications available in this category.',
            'fr' => 'Aucune publication n’est actuellement disponible dans cette catégorie.',
            default => 'Neste momento, não existem publicações disponíveis nesta categoria.',
        };
    }
}