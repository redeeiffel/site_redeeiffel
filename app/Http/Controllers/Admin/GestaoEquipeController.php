<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Liceu;
use App\Models\MembroEquipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class GestaoEquipeController extends Controller
{
    public function index()
    {
        $liceus = Liceu::with([
            'membros' => function ($query) {
                $query->with('ajustesImagens')->orderBy('ordem')->orderBy('id');
            },
        ])
        ->orderByRaw("CASE WHEN tipo = 'coordenacao' THEN 0 ELSE 1 END")
        ->orderBy('ordem')
        ->orderBy('nome')
        ->get();

        return view('admin.gestao_equipe.index', compact('liceus'));
    }

    public function guardarLiceu(Request $request)
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255', 'unique:liceus,nome'],
            'codigo' => ['nullable', 'string', 'max:50', 'unique:liceus,codigo'],
            'website' => ['nullable', 'url', 'max:255'],
        ]);

        $dados['tipo'] = 'liceu';
        $dados['ativo'] = true;
        $dados['ordem'] = (Liceu::max('ordem') ?? 0) + 1;

        Liceu::create($dados);

        return back()->with('success', 'Liceu adicionado com sucesso.');
    }

    public function atualizarLiceu(Request $request, Liceu $liceu)
    {
        $dados = $request->validate([
            'nome' => [
                'required', 'string', 'max:255',
                Rule::unique('liceus', 'nome')->ignore($liceu->id),
            ],
            'codigo' => [
                'nullable', 'string', 'max:50',
                Rule::unique('liceus', 'codigo')->ignore($liceu->id),
            ],
            'website' => ['nullable', 'url', 'max:255'],
            'ativo' => ['required', 'boolean'],
        ]);

        if ($liceu->tipo === 'coordenacao') {
            $dados['ativo'] = true;
            $dados['nome'] = $liceu->nome;
            $dados['codigo'] = $liceu->codigo;
        }

        $liceu->update($dados);

        return back()->with('success', 'Instituição atualizada com sucesso.');
    }

    public function guardarMembro(Request $request)
    {
        $dados = $request->validate([
            'liceu_id' => ['required', 'exists:liceus,id'],
            'nome' => ['required', 'string', 'max:255'],
            'cargo' => ['required', 'string', 'max:255'],
            'biografia' => ['nullable', 'string', 'max:5000'],
            'fotografia' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
            'imagem_posicao_x' => ['sometimes', 'required', 'integer', 'between:0,100'],
            'imagem_posicao_y' => ['sometimes', 'required', 'integer', 'between:0,100'],
            'imagem_zoom' => ['sometimes', 'required', 'integer', 'between:100,200'],
        ]);

        $ajuste = $this->dadosEnquadramento($dados);
        unset($dados['imagem_posicao_x'], $dados['imagem_posicao_y'], $dados['imagem_zoom']);

        $novaFotografia = null;
        if ($request->hasFile('fotografia')) {
            $novaFotografia = $request->file('fotografia')->store('equipa', 'public');
            $dados['fotografia'] = $novaFotografia;
        }

        $dados['ordem'] = (
            MembroEquipe::where('liceu_id', $dados['liceu_id'])->max('ordem') ?? 0
        ) + 1;
        $dados['ativo'] = true;

        try {
            DB::transaction(function () use ($dados, $ajuste, $novaFotografia) {
                $membro = MembroEquipe::create($dados);
                if ($novaFotografia !== null) {
                    $membro->ajustesImagens()->updateOrCreate(
                        ['campo' => 'fotografia'],
                        $ajuste
                    );
                }
            });
        } catch (\Throwable $e) {
            if ($novaFotografia !== null) {
                Storage::disk('public')->delete($novaFotografia);
            }
            throw $e;
        }

        return back()->with('success', 'Membro adicionado com sucesso.');
    }

    public function atualizarMembro(Request $request, MembroEquipe $membro)
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cargo' => ['required', 'string', 'max:255'],
            'biografia' => ['nullable', 'string', 'max:5000'],
            'ordem' => ['required', 'integer', 'min:0'],
            'ativo' => ['required', 'boolean'],
            'fotografia' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
            'imagem_posicao_x' => ['sometimes', 'required', 'integer', 'between:0,100'],
            'imagem_posicao_y' => ['sometimes', 'required', 'integer', 'between:0,100'],
            'imagem_zoom' => ['sometimes', 'required', 'integer', 'between:100,200'],
        ]);

        $temAjuste = $request->has('imagem_posicao_x')
            && $request->has('imagem_posicao_y')
            && $request->has('imagem_zoom');
        $ajuste = $this->dadosEnquadramento($dados);
        unset($dados['imagem_posicao_x'], $dados['imagem_posicao_y'], $dados['imagem_zoom']);

        $fotografiaAnterior = $membro->fotografia;
        $novaFotografia = null;

        if ($request->hasFile('fotografia')) {
            $novaFotografia = $request->file('fotografia')->store('equipa', 'public');
            $dados['fotografia'] = $novaFotografia;
        }

        try {
            DB::transaction(function () use ($membro, $dados, $ajuste, $temAjuste, $novaFotografia) {
                $membro->update($dados);

                if ($membro->fotografia && ($temAjuste || $novaFotografia !== null)) {
                    $membro->ajustesImagens()->updateOrCreate(
                        ['campo' => 'fotografia'],
                        $ajuste
                    );
                }
            });
        } catch (\Throwable $e) {
            if ($novaFotografia !== null) {
                Storage::disk('public')->delete($novaFotografia);
            }
            throw $e;
        }

        if ($novaFotografia !== null && $fotografiaAnterior) {
            Storage::disk('public')->delete($fotografiaAnterior);
        }

        return back()->with('success', 'Membro atualizado com sucesso.');
    }

    public function alterarEstadoMembro(MembroEquipe $membro)
    {
        $membro->update([
            'ativo' => !$membro->ativo,
        ]);

        return back()->with('success', 'Estado do membro atualizado.');
    }

    private function dadosEnquadramento(array $dados): array
    {
        return [
            'posicao_x' => (int) ($dados['imagem_posicao_x'] ?? 50),
            'posicao_y' => (int) ($dados['imagem_posicao_y'] ?? 15),
            'zoom' => (int) ($dados['imagem_zoom'] ?? 100),
        ];
    }
}
