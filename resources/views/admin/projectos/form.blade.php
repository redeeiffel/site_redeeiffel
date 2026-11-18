
@extends('layouts.main_admin')

@section('content')
@php
    $editar = $projecto->exists;
@endphp

<style>
    .projecto-form h4 {
        color: #103c73;
        font-weight: 700;
    }

    .projecto-form .card {
        border-radius: 12px;
    }

    .projecto-form label {
        display: block;
        font-size: 14px;
        color: #24415f;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .projecto-form input,
    .projecto-form select,
    .projecto-form textarea {
        box-sizing: border-box;
    }

    .projecto-form .campo {
        margin-bottom: 22px;
    }

    .projecto-form select {
        display: block;
        width: 100%;
        height: 45px;
        border: 1px solid #ccc;
        background: white;
        border-radius: 6px;
    }

    .projecto-form textarea {
        width: 100%;
        min-height: 170px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    .projecto-form .btn {
        text-transform: none;
        border-radius: 6px;
    }

    .projecto-form .opcao-checkbox {
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        margin-bottom: 8px;
    }

    .projecto-form .opcao-checkbox input[type="checkbox"] {
        position: static;
        opacity: 1;
        pointer-events: auto;
        width: 18px;
        height: 18px;
        margin: 0;
        accent-color: #103c73;
        flex-shrink: 0;
    }

    .projecto-form .opcao-checkbox span {
        color: #24415f;
        font-size: 14px;
        font-weight: 600;
    }

    .projecto-form .slider-config {
        background: #f4f8fd;
        border: 1px solid #d8e5f3;
        border-left: 4px solid #103c73;
        padding: 18px;
        border-radius: 8px;
    }

    .projecto-form .slider-config p {
        margin: 8px 0 0 30px;
        font-size: 13px;
        line-height: 1.6;
        color: #52677e;
    }
</style>

<div class="projecto-form">
    <h4>{{ $editar ? 'Editar Projecto' : 'Adicionar Projecto' }}</h4>

    <div class="card">
        <div class="card-content">

            @if($errors->any())
                <div class="card-panel red lighten-4 red-text text-darken-4">
                    <ul>
                        @foreach($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST"
                  enctype="multipart/form-data"
                  action="{{ $editar
                      ? route('admin.projectos.update', $projecto)
                      : route('admin.projectos.store') }}">

                @csrf

                @if($editar)
                    @method('PUT')
                @endif

                <div class="campo">
                    <label for="titulo">Título do Projecto *</label>
                    <input type="text"
                           id="titulo"
                           name="titulo"
                           value="{{ old('titulo', $projecto->titulo) }}"
                           required
                           maxlength="255">
                </div>

                <div class="campo">
                    <label for="categoria">Categoria *</label>

                    <select id="categoria" name="categoria" required>
                        <option value="">Seleccione a categoria</option>

                        @foreach(\App\Models\Projecto::CATEGORIAS as $valor => $nome)
                            <option value="{{ $valor }}"
                                @selected(old('categoria', $projecto->categoria) === $valor)>
                                {{ $nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="campo">
                    <label for="liceu">Liceu responsável</label>

                    <input type="text"
                           id="liceu"
                           name="liceu"
                           value="{{ old('liceu', $projecto->liceu) }}"
                           placeholder="Ex.: Liceu Eiffel de Ondjiva">
                </div>

                <div class="campo">
                    <label for="data_projecto">Data do Projecto</label>

                    <input type="date"
                           id="data_projecto"
                           name="data_projecto"
                           value="{{ old('data_projecto', $projecto->data_projecto?->format('Y-m-d')) }}">
                </div>

                <div class="campo">
                    <label for="descricao">Descrição do Projecto *</label>

                    <textarea id="descricao"
                              name="descricao"
                              required>{{ old('descricao', $projecto->descricao) }}</textarea>
                </div>

                <div class="campo">
                    <label for="fotografia">Fotografia do Projecto</label>

                    <input type="file"
                           id="fotografia"
                           name="fotografia"
                           accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">

                    @if($editar && $projecto->fotografia)
                        <div style="margin-top: 12px;">
                            <img src="{{ asset('storage/'.$projecto->fotografia) }}"
                                 alt="Fotografia actual"
                                 style="max-width: 230px; border-radius: 8px;">
                        </div>
                    @endif
                </div>

                {{-- PUBLICAÇÃO NO SITE --}}
                <div class="campo">
                    <label class="opcao-checkbox">
                        <input type="checkbox"
                               name="publicado"
                               value="1"
                               @checked(old('publicado', $projecto->publicado))>

                        <span>Publicar no site</span>
                    </label>
                </div>

                {{-- ADICIONAR AO SLIDER PRINCIPAL --}}
                <div class="campo slider-config">
                    <label class="opcao-checkbox">
                        <input type="checkbox"
                               id="adicionar_ao_slider"
                               name="adicionar_ao_slider"
                               value="1"
                               @checked(old('adicionar_ao_slider', $projecto->adicionar_ao_slider ?? false))>

                        <span>Adicionar ao Slider Principal</span>
                    </label>

                    <p>
                        Ao activar esta opção, o projecto poderá aparecer
                        no slider da página inicial, juntamente com os
                        slides institucionais. O projecto também deverá
                        estar publicado e possuir uma fotografia.
                    </p>
                </div>

                <div style="display:flex; gap:12px; flex-wrap:wrap;">
                    <button type="submit" class="btn blue darken-3">
                        <i class="fa fa-save"></i>
                        {{ $editar ? 'Guardar Alterações' : 'Registar Projecto' }}
                    </button>

                    <a href="{{ route('admin.projectos.index') }}"
                       class="btn grey">
                        Cancelar
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
