

@extends('layouts.main_admin')

@section('content')

{{-- Mensagem de sucesso --}}

@if (Session::has('success'))

    <div class="card-body">

        <div class="alert alert-success alert-dismissible">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">

                &times;

            </button>

            <h5>

                <i class="icon fas fa-check"></i>

                Sucesso!

            </h5>

            {{ Session::get('success') }}

        </div>

    </div>

@endif

{{-- Mensagem de falha --}}

@if (Session::has('fail'))

    <div class="card-body">

        <div class="alert alert-danger alert-dismissible">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">

                &times;

            </button>

            <h5>

                <i class="icon fas fa-ban"></i>

                Falha!

            </h5>

            {{ Session::get('fail') }}

        </div>

    </div>

@endif

{{-- Erros de validação --}}

@if ($errors->any())

    <div class="card-body">

        <div class="alert alert-danger">

            <h5>

                <i class="icon fas fa-exclamation-triangle"></i>

                Verifique os dados introduzidos.

            </h5>

            <ul class="mb-0">

                @foreach ($errors->all() as $erro)

                    <li>{{ $erro }}</li>

                @endforeach

            </ul>

        </div>

    </div>

@endif

{{-- Título da página --}}

<div class="row espaco-m-top-1">

    <div class="col s12">

        <h5 class="Jost-Bold grey-text text-darken-2">

            <span class="fa fa-home"></span>

            &rightarrow; Blog

            &rightarrow; Novo post

        </h5>

        <div class="borda-titulo-3"></div>

    </div>

</div>

<div class="row">

    <div class="col s12">

        <div class="new-card-admin">

            <div class="new-card-header-light">

                <h6>Registar nova publicação</h6>

            </div>

            <div class="new-card-content">

                <div class="espaco-p-1">

                    <form

                        action="{{ route('admin.add_p') }}"

                        method="POST"

                        enctype="multipart/form-data">

                        @csrf

                        {{-- Tipo de publicação --}}

                        <div class="row">

                            <div class="col s12">

                                <label for="tipo">Tipo de publicação</label>

                                <select

                                    name="tipo"

                                    id="tipo"

                                    required

                                    class="browser-default estilo-input">

                                    <option value="1" {{ old('tipo', '1') == '1' ? 'selected' : '' }}>

                                        Notícia

                                    </option>

                                    <option value="2" {{ old('tipo') == '2' ? 'selected' : '' }}>

                                        Evento

                                    </option>

                                </select>

                            </div>

                        </div>

                        {{-- Título --}}

                        <div class="row">

                            <div class="col s12">

                                <label for="titulo">Título da publicação</label>

                                <input

                                    type="text"

                                    name="titulo"

                                    id="titulo"

                                    class="browser-default estilo-input"

                                    value="{{ old('titulo') }}"

                                    maxlength="255"

                                    required>

                            </div>

                        </div>

                        {{-- Descrição --}}

                        <div class="row">

                            <div class="col s12">

                                <label for="descricao">Descrição</label>

                                <textarea

                                    name="descricao"

                                    id="descricao"

                                    class="browser-default estilo-input"

                                    rows="4"

                                    required>{{ old('descricao') }}</textarea>

                            </div>

                        </div>

                        {{-- Local --}}

                        <div class="row">

                            <div class="col s12">

                                <label for="local">Local</label>

                                <input

                                    type="text"

                                    name="local"

                                    id="local"

                                    class="browser-default estilo-input"

                                    value="{{ old('local') }}">

                            </div>

                        </div>

                        {{-- Link --}}

                        <div class="row">

                            <div class="col s12">

                                <label for="link">Link relacionado</label>

                                <input

                                    type="text"

                                    name="link"

                                    id="link"

                                    class="browser-default estilo-input"

                                    value="{{ old('link') }}"

                                    placeholder="https://exemplo.com">

                            </div>

                        </div>

                        {{-- Data --}}

                        <div class="row">

                            <div class="col s12">

                                <label for="data">

                                    Data da publicação

                                </label>

                                <input

                                    type="date"

                                    name="data"

                                    id="data"

                                    class="browser-default estilo-input"

                                    value="{{ old('data', date('Y-m-d')) }}"

                                    required>

                                <small class="grey-text">

                                    Seleccione a data no calendário.

                                </small>

                            </div>

                        </div>

                        {{-- Corpo da notícia 1 --}}

                        <div class="row">

                            <div class="col s12">

                                <label for="texto_inicial">

                                    Corpo da notícia 1

                                </label>

                                <textarea

                                    name="texto_inicial"

                                    id="texto_inicial"

                                    class="browser-default estilo-input"

                                    rows="7"

                                    required>{{ old('texto_inicial') }}</textarea>

                            </div>

                        </div>

                        {{-- Corpo da notícia 2 --}}

                        <div class="row">

                            <div class="col s12">

                                <label for="texto_secundario">

                                    Corpo da notícia 2

                                </label>

                                <textarea

                                    name="texto_secundario"

                                    id="texto_secundario"

                                    class="browser-default estilo-input"

                                    rows="7">{{ old('texto_secundario') }}</textarea>

                            </div>

                        </div>

                        {{-- Corpo da notícia 3 --}}

                        <div class="row">

                            <div class="col s12">

                                <label for="texto_terceario">

                                    Corpo da notícia 3

                                </label>

                                <textarea

                                    name="texto_terceario"

                                    id="texto_terceario"

                                    class="browser-default estilo-input"

                                    rows="7">{{ old('texto_terceario') }}</textarea>

                            </div>

                        </div>

                        {{-- Corpo da notícia 4 --}}

                        <div class="row">

                            <div class="col s12">

                                <label for="texto_quarto">

                                    Corpo da notícia 4

                                </label>

                                <textarea

                                    name="texto_quarto"

                                    id="texto_quarto"

                                    class="browser-default estilo-input"

                                    rows="7">{{ old('texto_quarto') }}</textarea>

                            </div>

                        </div>

                        {{-- Imagem de capa --}}

                        <div class="row">

                            <div class="col s12">

                                <label for="imagem_externa">

                                    Fotografia de capa principal

                                </label>

                                <input

                                    type="file"

                                    name="imagem_externa"

                                    id="imagem_externa"

                                    accept="image/*"

                                    class="browser-default">

                                <x-editor-imagem
                                    campo="imagem_externa"
                                    prefixo="imagem_externa"
                                />

                            </div>

                        </div>

                        {{-- Imagem interna 1 --}}

                        <div class="row">

                            <div class="col s12">

                                <label for="imagem_interna">

                                    Fotografia interna 1

                                </label>

                                <input

                                    type="file"

                                    name="imagem_interna"

                                    id="imagem_interna"

                                    accept="image/*"

                                    class="browser-default">

                                <x-editor-imagem
                                    campo="imagem_interna"
                                    prefixo="imagem_interna"
                                />

                            </div>

                        </div>

                        {{-- Imagem interna 2 --}}

                        <div class="row">

                            <div class="col s12">

                                <label for="imagem_interna_tercearia">

                                    Fotografia interna 2

                                </label>

                                <input

                                    type="file"

                                    name="imagem_interna_tercearia"

                                    id="imagem_interna_tercearia"

                                    accept="image/*"

                                    class="browser-default">

                                <x-editor-imagem
                                    campo="imagem_interna_tercearia"
                                    prefixo="imagem_interna_tercearia"
                                />

                            </div>

                        </div>

                        {{-- Botões --}}

                        <div class="row">

                            <div class="col s12">

                                <button

                                    type="submit"

                                    name="btn-enviar"

                                    class="bg-primary borda-1 btn bg-primary-1">

                                    <span class="fa fa-plus"></span>

                                    Registar publicação

                                </button>

                                <br>

                                <a

                                    href="{{ url()->previous() }}"

                                    class="borda-1 btn grey lighten-4 grey-text espaco-m-top-0">

                                    <span class="fa fa-chevron-left"></span>

                                    Voltar

                                </a>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="{{ asset('assets/js/editor-imagem-eiffel.js') }}?v=2"></script>

@endsection
