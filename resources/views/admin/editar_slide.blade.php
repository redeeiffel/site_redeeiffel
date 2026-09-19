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
            <span class="fa fa-home"></span> → Blog → Editar slide
        </h5>
        <div class="borda-titulo-3"></div>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="new-card-admin">
            <div class="new-card-header-light">
                <h6>Editar Slide</h6>
            </div>

            <div class="new-card-content">
                <div class="espaco-p-1">

                    <form action="{{ route('admin.edit_slider', $slide->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col s12">
                                <label>Título Inicial</label>
                                <input type="text" name="titulo_um" 
                                       value="{{ old('titulo_um', $slide->titulo_um) }}" 
                                       required class="browser-default estilo-input">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <label>Descrição</label>
                                <textarea name="titulo_dois" id="summernote" required>
                                    {{ old('titulo_dois', $slide->titulo_dois) }}
                                </textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <label>Legenda do botão</label>
                                <input type="text" name="titulo_botao" 
                                       value="{{ old('titulo_botao', $slide->titulo_botao) }}" 
                                       required class="browser-default estilo-input">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <label>Link do botão</label>
                                <input type="url" name="link_botao" 
                                       value="{{ old('link_botao', $slide->link_botao) }}" 
                                       required class="browser-default estilo-input">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <label>Imagem atual</label><br>
                                @if($slide->fotografia)
                                    <img src="{{ asset('/media/slide/' . $slide->fotografia) }}" 
                                         width="200" class="borda-1">
                                @else
                                    <p>Sem imagem</p>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <label>Alterar imagem</label>
                                <input type="file" name="fotografia">
                            </div>
                        </div>

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