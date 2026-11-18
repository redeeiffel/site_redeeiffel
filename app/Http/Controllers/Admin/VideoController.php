<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class VideoController extends Controller
{
    private const CATEGORIAS = [
        'aulas', 'actividades', 'laboratorios', 'projectos', 'testemunhos',
    ];

    public function index()
    {
        $videos = Video::latest()->paginate(12);
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.form');
    }

    public function store(Request $request)
    {
        $dados = $this->validar($request);
        $dados['publicado'] = $request->boolean('publicado');
        $dados['url_video'] = null;
        $dados['ficheiro_video'] = null;

        if ($dados['origem'] === 'youtube') {
            $dados['url_video'] = $this->normalizarYoutube($dados['url_video_input']);
        }
        unset($dados['url_video_input']);

        $novoFicheiro = null;
        $novaImagem = null;

        try {
            if ($dados['origem'] === 'ficheiro') {
                $novoFicheiro = $request->file('ficheiro_video')->store('videos/ficheiros', 'public');
                $dados['ficheiro_video'] = $novoFicheiro;
            }
            if ($request->hasFile('imagem_capa')) {
                $novaImagem = $this->guardarImagem($request);
                $dados['imagem_capa'] = $novaImagem;
            }
            Video::create($dados);
        } catch (\Throwable $e) {
            if ($novoFicheiro) Storage::disk('public')->delete($novoFicheiro);
            if ($novaImagem) $this->eliminarImagem($novaImagem);
            throw $e;
        }

        return redirect()->route('admin.videos.index')->with('success', 'Vídeo registado com sucesso!');
    }

    public function edit(Video $video)
    {
        return view('admin.videos.form', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $dados = $this->validar($request, $video);
        $dados['publicado'] = $request->boolean('publicado');

        $ficheiroAntigo = $video->ficheiro_video;
        $imagemAntiga = $video->imagem_capa;
        $novoFicheiro = null;
        $novaImagem = null;

        if ($dados['origem'] === 'youtube') {
            $url = $dados['url_video_input'] ?? $video->url_video;
            $dados['url_video'] = $this->normalizarYoutube($url);
            $dados['ficheiro_video'] = null;
        } else {
            $dados['url_video'] = null;
            $dados['ficheiro_video'] = $video->origem === 'ficheiro' ? $ficheiroAntigo : null;
        }
        unset($dados['url_video_input']);

        try {
            if ($dados['origem'] === 'ficheiro' && $request->hasFile('ficheiro_video')) {
                $novoFicheiro = $request->file('ficheiro_video')->store('videos/ficheiros', 'public');
                $dados['ficheiro_video'] = $novoFicheiro;
            }
            if ($request->hasFile('imagem_capa')) {
                $novaImagem = $this->guardarImagem($request);
                $dados['imagem_capa'] = $novaImagem;
            }
            $video->update($dados);
        } catch (\Throwable $e) {
            if ($novoFicheiro) Storage::disk('public')->delete($novoFicheiro);
            if ($novaImagem) $this->eliminarImagem($novaImagem);
            throw $e;
        }

        if ($ficheiroAntigo && $ficheiroAntigo !== $dados['ficheiro_video']) {
            Storage::disk('public')->delete($ficheiroAntigo);
        }
        if ($novaImagem && $imagemAntiga) $this->eliminarImagem($imagemAntiga);

        return redirect()->route('admin.videos.index')->with('success', 'Vídeo actualizado com sucesso!');
    }

    public function destroy(Video $video)
    {
        $imagem = $video->imagem_capa;
        $ficheiro = $video->ficheiro_video;
        $video->delete();

        if ($ficheiro) Storage::disk('public')->delete($ficheiro);
        if ($imagem) $this->eliminarImagem($imagem);

        return redirect()->route('admin.videos.index')->with('success', 'Vídeo eliminado com sucesso!');
    }

    private function validar(Request $request, ?Video $video = null): array
    {
        $origem = $request->input('origem', 'youtube');
        $ficheiroObrigatorio = $origem === 'ficheiro'
            && (!$video || $video->origem !== 'ficheiro' || !$video->ficheiro_video);

        $regras = [
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string', 'max:5000'],
            'categoria' => ['required', Rule::in(self::CATEGORIAS)],
            'origem' => ['required', Rule::in(['youtube', 'ficheiro'])],
            'imagem_capa' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'ficheiro_video' => [
                Rule::requiredIf($ficheiroObrigatorio), 'nullable', 'file',
                'mimes:mp4,webm,mov', 'max:512000',
            ],
            'url_video_input' => [
                Rule::requiredIf($origem === 'youtube' && (!$video || !$video->url_video)),
                'nullable', 'url', 'max:500',
                function ($attribute, $value, $fail) use ($origem) {
                    if ($origem === 'youtube' && $value && !$this->youtubeId($value)) {
                        $fail('Introduza uma ligação válida de vídeo do YouTube.');
                    }
                },
            ],
        ];

        $dados = $request->validate($regras);
        if ($origem === 'youtube' && empty($dados['url_video_input']) && $video && !$video->url_video) {
            throw ValidationException::withMessages(['url_video_input' => 'Introduza uma ligação do YouTube.']);
        }
        return $dados;
    }

    private function youtubeId(string $url): ?string
    {
        $partes = parse_url($url);
        if (!$partes || empty($partes['host']) || strtolower($partes['scheme'] ?? '') !== 'https') return null;
        $host = strtolower($partes['host']);
        $caminho = trim($partes['path'] ?? '', '/');
        $id = null;

        if (in_array($host, ['youtube.com', 'www.youtube.com', 'm.youtube.com'], true)) {
            if ($caminho === 'watch') {
                parse_str($partes['query'] ?? '', $query);
                $id = $query['v'] ?? null;
            } elseif (preg_match('~^(embed|shorts|live)/([^/]+)$~', $caminho, $matches)) {
                $id = $matches[2];
            }
        } elseif (in_array($host, ['youtu.be', 'www.youtu.be'], true)) {
            $id = $caminho;
        }

        return is_string($id) && preg_match('/^[A-Za-z0-9_-]{11}$/', $id) ? $id : null;
    }

    private function normalizarYoutube(string $url): string
    {
        return 'https://www.youtube.com/embed/' . $this->youtubeId($url);
    }

    private function guardarImagem(Request $request): string
    {
        $diretorio = public_path('media/videos');
        if (!File::isDirectory($diretorio)) File::makeDirectory($diretorio, 0755, true);
        $ficheiro = $request->file('imagem_capa');
        $nome = Str::uuid() . '.' . $ficheiro->extension();
        $ficheiro->move($diretorio, $nome);
        return $nome;
    }

    private function eliminarImagem(string $nome): void
    {
        if ($nome !== basename($nome)) return;
        $caminho = public_path('media/videos/' . $nome);
        if (File::isFile($caminho)) File::delete($caminho);
    }
}
