
@extends('layouts.main_admin')

@section('content')

<style>
    .galeria-admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin: 25px 0;
    }

    .galeria-admin-header h4 {
        color: #075a9c;
        font-weight: 700;
        margin: 0;
    }

    .galeria-admin-header p {
        color: #777;
        margin: 8px 0 0;
    }

    .galeria-admin-card {
        background: #fff;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 50, 100, .08);
        margin-bottom: 25px;
        transition: transform .2s ease;
    }

    .galeria-admin-card:hover {
        transform: translateY(-4px);
    }

    .galeria-admin-imagem {
        width: 100%;
        height: 210px;
        object-fit: cover;
        background: #eef3f8;
        display: block;
    }

    .galeria-admin-conteudo {
        padding: 18px;
    }

    .galeria-admin-titulo {
        font-size: 16px;
        font-weight: 700;
        color: #173b60;
        margin: 12px 0;
        overflow-wrap: anywhere;
    }

    .galeria-admin-categoria {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        background: #e7f2fc;
        color: #075a9c;
        font-size: 12px;
        font-weight: 600;
    }

    .galeria-admin-data {
        font-size: 12px;
        color: #888;
        margin-bottom: 15px;
    }

    .galeria-admin-acoes {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        align-items: center;
    }

    .galeria-admin-acoes form {
        margin: 0;
    }

    .galeria-admin-acoes .btn {
        border-radius: 7px;
        text-transform: none;
    }

    .galeria-admin-vazio {
        text-align: center;
        padding: 55px 20px;
        background: #f4f8fc;
        border-radius: 14px;
    }
</style>

<div class="row espaco-m-top-1">
    <div class="col s12">
        <div class="galeria-admin-header">
            <div>
                <h4>
                    <i class="fa fa-images"></i>
                    Gestão da Galeria
                </h4>
                <p>
                    Organize as fotografias e actividades da Rede Eiffel.
                </p>
            </div>

            <a href="{{ route('admin.add_galeria') }}"
               class="btn bg-primary-1">
                <i class="fa fa-plus"></i>
                Nova Fotografia
            </a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="row">
        <div class="col s12">
            <div class="card-panel blue lighten-5 blue-text text-darken-4">
                <i class="fa fa-check-circle"></i>
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif

@if(session('fail'))
    <div class="row">
        <div class="col s12">
            <div class="card-panel red lighten-5 red-text text-darken-4">
                <i class="fa fa-exclamation-circle"></i>
                {{ session('fail') }}
            </div>
        </div>
    </div>
@endif

<div class="row">
    <div class="col s12">
        <p>
            <strong>Total de fotografias:</strong>
            {{ $galerias->count() }}
        </p>
    </div>
</div>

<div class="row">

    @forelse($galerias as $galeria)

        @php
            $categorias = [
                'filter-app' => 'Aulas',
                'filter-card' => 'Actividades',
                'filter-web' => 'Laboratórios',
            ];

            $categoria = $categorias[$galeria->tipo] ?? 'Outras';

            $imagem = $galeria->fotografia
                ? asset('media/galeria/' . $galeria->fotografia)
                : null;
        @endphp

        <div class="col s12 m6 l4">

            <div class="galeria-admin-card">

                @if($imagem)
                    <img
                        src="{{ $imagem }}"
                        alt="{{ strip_tags($galeria->titulo ?? '') }}"
                        class="galeria-admin-imagem"
                        loading="lazy"
                    >
                @else
                    <div class="galeria-admin-imagem"
                         style="display:flex;align-items:center;justify-content:center;">
                        <i class="fa fa-image fa-3x grey-text"></i>
                    </div>
                @endif

                <div class="galeria-admin-conteudo">

                    <span class="galeria-admin-categoria">
                        {{ $categoria }}
                    </span>

                    <div class="galeria-admin-titulo">
                        {{ \Illuminate\Support\Str::limit(strip_tags($galeria->titulo ?? ''), 85) }}
                    </div>

                    <div class="galeria-admin-data">
                        <i class="fa fa-calendar"></i>
                        {{ $galeria->created_at
                            ? $galeria->created_at->format('d/m/Y')
                            : 'Sem data' }}
                    </div>

                    <div class="galeria-admin-acoes">

                        @if($imagem)
                            <a href="{{ $imagem }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="btn blue btn-small"
                               title="Visualizar fotografia">
                                <i class="fa fa-eye"></i>
                            </a>
                        @endif

                        <a href="{{ route('admin.editar_galeria', $galeria->id) }}"
                           class="btn orange btn-small"
                           title="Editar fotografia">
                            <i class="fa fa-edit"></i>
                        </a>

                        <form
                            action="{{ route('admin.delete_galeria', $galeria->id) }}"
                            method="POST"
                            onsubmit="return confirm('Tem a certeza de que deseja eliminar esta fotografia?');"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn red btn-small"
                                title="Eliminar fotografia"
                            >
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    @empty

        <div class="col s12">
            <div class="galeria-admin-vazio">
                <i class="fa fa-images fa-3x blue-text"></i>

                <h5>Nenhuma fotografia registada</h5>

                <p>
                    Comece por adicionar fotografias das actividades
                    da Rede Eiffel.
                </p>

                <a href="{{ route('admin.add_galeria') }}"
                   class="btn bg-primary-1">
                    Adicionar Fotografia
                </a>
            </div>
        </div>

    @endforelse

</div>

@endsection
