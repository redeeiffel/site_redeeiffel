<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentoController extends Controller
{
    // Listagem administrativa
    public function index()
    {
        $documentos = Documento::orderBy('ordem')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.documentos.index', compact('documentos'));
    }

    // Publicar documento
    public function guardar(Request $request)
    {
        $dados = $request->validate([
            'titulo' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'tipo_calendario' => 'nullable|in:nacional,coordenacao|unique:documentos,tipo_calendario',
            'descricao' => 'nullable|string',
            'ano_letivo' => 'nullable|string|max:20',
            'ficheiro' => 'required|file|mimes:pdf|max:20480',
            'ordem' => 'nullable|integer|min:0',
        ]);

        $caminho = $request->file('ficheiro')
            ->store('documentos', 'public');

        Documento::create([
            'titulo' => $dados['titulo'],
            'categoria' => $dados['categoria'],
            'tipo_calendario' => $dados['tipo_calendario'] ?? null,
            'descricao' => $dados['descricao'] ?? null,
            'ano_letivo' => $dados['ano_letivo'] ?? null,
            'ficheiro' => $caminho,
            'nome_original' => $request->file('ficheiro')->getClientOriginalName(),
            'ativo' => true,
            'ordem' => $dados['ordem'] ?? 0,
        ]);

        return back()->with('success', 'Documento publicado com sucesso.');
    }

    // Actualizar documento e substituir PDF
    public function atualizar(Request $request, Documento $documento)
    {
        $dados = $request->validate([
            'titulo' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'descricao' => 'nullable|string',
            'ano_letivo' => 'nullable|string|max:20',
            'ficheiro' => 'nullable|file|mimes:pdf|max:20480',
            'ordem' => 'nullable|integer|min:0',
        ]);

        $alteracoes = [
            'titulo' => $dados['titulo'],
            'categoria' => $dados['categoria'],
            'descricao' => $dados['descricao'] ?? null,
            'ano_letivo' => $dados['ano_letivo'] ?? null,
            'ordem' => $dados['ordem'] ?? 0,
        ];

        if ($request->hasFile('ficheiro')) {
            $novoCaminho = $request->file('ficheiro')
                ->store('documentos', 'public');

            $alteracoes['ficheiro'] = $novoCaminho;
            $alteracoes['nome_original'] = $request->file('ficheiro')
                ->getClientOriginalName();
        }

        $caminhoAntigo = $documento->ficheiro;

        $documento->update($alteracoes);

        if (
            isset($novoCaminho) &&
            $caminhoAntigo !== $novoCaminho &&
            Storage::disk('public')->exists($caminhoAntigo)
        ) {
            Storage::disk('public')->delete($caminhoAntigo);
        }

        return back()->with('success', 'Documento actualizado com sucesso.');
    }

    // Activar ou desactivar
    public function alterarEstado(Documento $documento)
    {
        $documento->update([
            'ativo' => !$documento->ativo,
        ]);

        return back()->with('success', 'Estado do documento actualizado.');
    }

    // Eliminar documento
    public function eliminar(Documento $documento)
    {
        $caminho = $documento->ficheiro;

        $documento->delete();

        if ($caminho && Storage::disk('public')->exists($caminho)) {
            Storage::disk('public')->delete($caminho);
        }

        return back()->with('success', 'Documento eliminado.');
    }

    // Página pública de documentos
    public function publico()
    {
        $documentos = Documento::where('ativo', true)
            ->orderBy('ordem')
            ->orderByDesc('created_at')
            ->get();

        return view('documentos.index', compact('documentos'));
    }

    // Abrir PDF
    public function visualizar(Documento $documento)
    {
        abort_unless($documento->ativo, 404);

        abort_unless(
            Storage::disk('public')->exists($documento->ficheiro),
            404
        );

        return response()->file(
            Storage::disk('public')->path($documento->ficheiro),
            ['Content-Type' => 'application/pdf']
        );
    }

    // Descarregar PDF
    public function baixar(Documento $documento)
    {
        abort_unless($documento->ativo, 404);

        abort_unless(
            Storage::disk('public')->exists($documento->ficheiro),
            404
        );

        $nome = Str::slug($documento->titulo) . '.pdf';

        return Storage::disk('public')->download(
            $documento->ficheiro,
            $nome
        );
    }

    // Calendário publicado
    public function calendario(string $tipo)
    {
        abort_unless(in_array($tipo, ['nacional', 'coordenacao']), 404);

        $documento = Documento::where('tipo_calendario', $tipo)
            ->where('ativo', true)
            ->firstOrFail();

        return $this->visualizar($documento);
    }
}
