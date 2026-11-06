
@extends('layouts.main_admin')

@section('content')

@if (Session::has('success'))
    <div class="card-body">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
            {{ Session::get('success') }}
        </div>
    </div>
@endif

@if (Session::has('fail'))
    <div class="card-body">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Falha!</h5>
            {{ Session::get('fail') }}
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="card-body">
        <div class="alert alert-danger">
            <h5><i class="icon fas fa-exclamation-triangle"></i> Verifique os dados introduzidos.</h5>
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div class="row espaco-m-top-1">
    <div class="col s12">
        <h5 class="Jost-Bold grey-text text-darken-2">
            <span class="fa fa-home"></span>
            &rightarrow; Comentários
            &rightarrow; Novo comentário
        </h5>
        <div class="borda-titulo-3"></div>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="new-card-admin">

            <div class="new-card-header-light">
                <h6>Registar novo comentário ou testemunho</h6>
            </div>

            <div class="new-card-content">
                <div class="espaco-p-1">

                    <form action="{{ route('admin.add_com') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        {{-- Nome do estudante --}}
                        <div class="row">
                            <div class="col s12">
                                <label for="nome">Nome do estudante</label>
                                <input
                                    type="text"
                                    name="nome"
                                    id="nome"
                                    class="browser-default estilo-input"
                                    value="{{ old('nome') }}"
                                    required>
                            </div>
                        </div>

                        {{-- Classe / Turma --}}
                        <div class="row">
                            <div class="col s12">
                                <label for="turma">Classe / Turma</label>
                                <input
                                    type="text"
                                    name="turma"
                                    id="turma"
                                    class="browser-default estilo-input"
                                    value="{{ old('turma') }}"
                                    required>
                            </div>
                        </div>

                        {{-- Liceu --}}
                        <div class="row">
                            <div class="col s12">
                                <label for="liceu">Liceu</label>
                                <input
                                    type="text"
                                    name="liceu"
                                    id="liceu"
                                    class="browser-default estilo-input"
                                    value="{{ old('liceu') }}"
                                    required>
                            </div>
                        </div>

                        {{-- Comentário --}}
                        <div class="row">
                            <div class="col s12">
                                <label for="comentario">Comentário / Testemunho</label>
                                <textarea
                                    name="comentario"
                                    id="comentario"
                                    class="browser-default estilo-input"
                                    rows="7"
                                    required>{{ old('comentario') }}</textarea>
                            </div>
                        </div>

                        {{-- Fotografia --}}
                        <div class="row">
                            <div class="col s12">
                                <label for="fotografia">Fotografia do estudante</label>

                                <input
                                    type="file"
                                    name="fotografia"
                                    id="fotografia"
                                    accept="image/*"
                                    class="browser-default">

                                <p class="grey-text">
                                    Seleccione uma fotografia e ajuste o enquadramento antes de guardar.
                                </p>

                                <x-editor-imagem
                                    campo="fotografia"
                                    prefixo="imagem"
                                    :posicao-x="old('imagem_posicao_x', 50)"
                                    :posicao-y="old('imagem_posicao_y', 15)"
                                    :zoom="old('imagem_zoom', 100)"
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
                                    Registar comentário
                                </button>

                                <br>

                                <a
                                    href="{{ route('admin.ver_comentario') }}"
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
