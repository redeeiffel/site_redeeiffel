<?php

namespace App\Http\Controllers;

use App\Services\BuscaConteudoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AssistenteController extends Controller
{
    public function perguntar(
        Request $request,
        BuscaConteudoService $busca
    ): JsonResponse {
        $dados = $request->validate([
            'pergunta' => ['required', 'string', 'max:300'],
            'idioma' => ['nullable', 'in:pt,en,fr'],
        ]);

        return response()->json(
            $busca->pesquisar(
                $dados['pergunta'],
                $dados['idioma'] ?? 'pt'
            )
        );
    }
}
