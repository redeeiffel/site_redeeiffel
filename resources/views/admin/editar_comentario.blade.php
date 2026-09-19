@extends('layouts.main_admin')

@section('content')

@if (Session::get('success'))
<div class="card-body">
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
        {{ Session::get('success') }}
    </div>
</div>
@endif

@if (Session::get('fail'))
<div class="card-body">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Falha!</h5>
        {{ Session::get('fail') }}
    </div>
</div>
@endif

<div class="row espaco-m-top-1">
    <div class="col s12">
        <h5 class="Jost-Bold grey-text text-darken-2">
            <span class="fa fa-home"></span> → Comentários → Editar Comentário
        </h5>
        <div class="borda-titulo-3"></div>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="new-card-admin">

            <div class="new-card-header-light">
                <h6>Editar comentário do estudante</h6>
            </div>

            <div class="new-card-content">
                <div class="espaco-p-1">

                    <form action="{{ route('admin.edit_comentario', $comentario->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nome -->
                        <div class="row">
                            <div class="col s12">
                                <label>Nome do estudante</label>
                                <input type="text" name="nome" required
                                       class="browser-default estilo-input"
                                       value="{{ old('nome', $comentario->nome) }}">
                            </div>
                        </div>

                        <!-- Turma -->
                        <div class="row">
                            <div class="col s12">
                                <label>Classe / Turma</label>
                                <input type="text" name="turma" required
                                       class="browser-default estilo-input"
                                       value="{{ old('turma', $comentario->turma) }}">
                            </div>
                        </div>

                        <!-- Liceu -->
                        <div class="row">
                            <div class="col s12">
                                <label>Liceu</label>
                                <input type="text" name="liceu" required
                                       class="browser-default estilo-input"
                                       value="{{ old('liceu', $comentario->liceu) }}">
                            </div>
                        </div>

                        <!-- Comentário -->
                        <div class="row">
                            <div class="col s12">
                                <label>Comentário</label>
                                <textarea name="comentario" id="summernote" required>
                                    {{ old('comentario', $comentario->comentario) }}
                                </textarea>
                            </div>
                        </div>

                        <!-- Imagem atual -->
                        <div class="row">
                            <div class="col s12">
                                <label>Foto atual</label><br>
                                @if($comentario->fotografia)
                                    <img src="{{ asset('/media/comentario/' . $comentario->fotografia) }}" width="150">
                                @endif
                            </div>
                        </div>

                        <!-- Nova imagem -->
                        <div class="row">
                            <div class="col s12">
                                <label>Alterar foto</label>
                                <input type="file" name="fotografia" accept="image/*">
                            </div>
                        </div>

                        <!-- Botões -->
                        <div class="row">
                            <div class="col s12">
                                <button type="submit" class="btn bg-primary-1">
                                    <span class="fa fa-save"></span> Atualizar
                                </button>

                                <a href="" 
                                   class="btn grey lighten-4 grey-text">
                                    <span class="fa fa-chevron-left"></span> Voltar
                                </a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection