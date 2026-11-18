<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProjectoController extends Controller
{
    public function index()
    {
        $projectos = Projecto::latest()->paginate(10);

        return view('admin.projectos.index', compact('projectos'));
    }

    public function create()
    {
        return view('admin.projectos.form', [
            'projecto' => new Projecto(),
        ]);
    }

    public function store(Request $request)
    {
        $dados = $this->validar($request);

        if ($request->hasFile('fotografia')) {
            $dados['fotografia'] = $request
                ->file('fotografia')
                ->store('projectos', 'public');
        }

        $dados['publicado'] = $request->boolean('publicado');

        $dados['adicionar_ao_slider'] = $request->boolean('adicionar_ao_slider');

        Projecto::create($dados);

        return redirect()
            ->route('admin.projectos.index')
            ->with('success', 'Projecto registado com sucesso.');
    }

    public function edit(Projecto $projecto)
    {
        return view('admin.projectos.form', compact('projecto'));
    }

    public function update(Request $request, Projecto $projecto)
    {
        $dados = $this->validar($request);

        if ($request->hasFile('fotografia')) {
            $novaFotografia = $request
                ->file('fotografia')
                ->store('projectos', 'public');

            $dados['fotografia'] = $novaFotografia;
        }

        $dados['publicado'] = $request->boolean('publicado');

        $dados['adicionar_ao_slider'] = $request->boolean('adicionar_ao_slider');

        $fotografiaAnterior = $projecto->fotografia;

        $projecto->update($dados);

        if (
            isset($novaFotografia) &&
            $fotografiaAnterior
        ) {
            Storage::disk('public')->delete($fotografiaAnterior);
        }

        return redirect()
            ->route('admin.projectos.index')
            ->with('success', 'Projecto actualizado com sucesso.');
    }

    public function destroy(Projecto $projecto)
    {
        $fotografia = $projecto->fotografia;

        $projecto->delete();

        if ($fotografia) {
            Storage::disk('public')->delete($fotografia);
        }

        return redirect()
            ->route('admin.projectos.index')
            ->with('success', 'Projecto eliminado com sucesso.');
    }

    private function validar(Request $request): array
    {
        return $request->validate([
            'titulo' => ['required', 'string', 'max:255'],

            'descricao' => ['required', 'string'],

            'categoria' => [
                'required',
                Rule::in(array_keys(Projecto::CATEGORIAS)),
            ],

            'liceu' => ['nullable', 'string', 'max:255'],

            'data_projecto' => ['nullable', 'date'],

            'fotografia' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'publicado' => ['nullable', 'boolean'],

            'adicionar_ao_slider' => ['nullable', 'boolean'],
        ]);
    }
}
