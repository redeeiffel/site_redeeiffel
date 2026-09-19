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
            <span class="fa fa-home"></span> → Blog → Editar Post
        </h5>
        <div class="borda-titulo-3"></div>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="new-card-admin">

            <div class="new-card-header-light">
                <h6>Editar post</h6>
            </div>

            <div class="new-card-content">
                <div class="espaco-p-1">

                    <form action="{{ route('admin.edit_publicacao', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Tipo + Data -->
                        <div class="row">
                            <div class="col s6">
                                <label>Tipo</label>
                                <select name="tipo" required class="browser-default estilo-input">
                                    <option value="1" {{ $post->tipo == 1 ? 'selected' : '' }}>Notícia</option>
                                    <option value="2" {{ $post->tipo == 2 ? 'selected' : '' }}>Evento</option>
                                </select>
                            </div>

                            <div class="col s6">
                                <label>Data</label>
                                <input type="date" name="data" required
                                       class="browser-default estilo-input"
                                       value="{{ old('data', $post->data) }}">
                            </div>
                        </div>

                        <!-- Título -->
                        <div class="row">
                            <div class="col s12">
                                <label>Título</label>
                                <input type="text" name="titulo" required
                                       class="browser-default estilo-input"
                                       value="{{ old('titulo', $post->titulo) }}">
                            </div>
                        </div>

                        <!-- Local + Link -->
                        <div class="row">
                            <div class="col s6">
                                <label>Local</label>
                                <input type="text" name="local"
                                       class="browser-default estilo-input"
                                       value="{{ old('local', $post->local) }}">
                            </div>

                            <div class="col s6">
                                <label>Link</label>
                                <input type="url" name="link"
                                       class="browser-default estilo-input"
                                       value="{{ old('link', $post->link) }}">
                            </div>
                        </div>

                        <!-- Descrição -->
                        <div class="row">
                            <div class="col s12">
                                <label>Descrição</label>
                                <textarea name="descricao" required>
                                    {{ old('descricao', $post->descricao) }}
                                </textarea>
                            </div>
                        </div>

                        <!-- Corpo -->
                        <div class="row">
                            <div class="col s12">
                                <label>Corpo da notícia</label>
                                <textarea name="texto_inicial" required>
                                    {{ old('texto_inicial', $post->texto_inicial) }}
                                </textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <label>Continuação</label>
                                <textarea name="texto_secundario">
                                    {{ old('texto_secundario', $post->texto_secundario) }}
                                </textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <label>Parte 3</label>
                                <textarea name="texto_terceario">
                                    {{ old('texto_terceario', $post->texto_terceario) }}
                                </textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <label>Parte 4</label>
                                <textarea name="texto_quarto">
                                    {{ old('texto_quarto', $post->texto_quarto) }}
                                </textarea>
                            </div>
                        </div>

                        <!-- Imagens atuais -->
                        <div class="row">
                            <div class="col s4">
                                <label>Imagem externa atual</label><br>
                                @if($post->imagem_externa)
                                    <img src="{{ asset('/media/publicacao/' . $post->imagem_externa) }}" width="100%">
                                @endif
                            </div>

                            <div class="col s4">
                                <label>Imagem interna atual</label><br>
                                @if($post->imagem_interna)
                                    <img src="{{ asset('/media/publicacao/' . $post->imagem_interna) }}" width="100%">
                                @endif
                            </div>

                            <div class="col s4">
                                <label>Imagem interna 2 atual</label><br>
                                @if($post->imagem_interna_tercearia)
                                    <img src="{{ asset('/media/publicacao/' . $post->imagem_interna_tercearia) }}" width="100%">
                                @endif
                            </div>
                        </div>

                        <!-- Upload novas -->
                        <div class="row">
                            <div class="col s4">
                                <label>Alterar imagem externa</label>
                                <input type="file" name="imagem_externa" accept="image/*" onchange="preview(event,'img1')">
                                <img id="img1" style="display:none; max-width:100%; margin-top:10px;">
                            </div>

                            <div class="col s4">
                                <label>Alterar imagem interna</label>
                                <input type="file" name="imagem_interna" accept="image/*" onchange="preview(event,'img2')">
                                <img id="img2" style="display:none; max-width:100%; margin-top:10px;">
                            </div>

                            <div class="col s4">
                                <label>Alterar imagem interna 2</label>
                                <input type="file" name="imagem_interna_tercearia" accept="image/*" onchange="preview(event,'img3')">
                                <img id="img3" style="display:none; max-width:100%; margin-top:10px;">
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

<script>
function preview(event, id) {
    const img = document.getElementById(id);
    img.src = URL.createObjectURL(event.target.files[0]);
    img.style.display = 'block';
}
</script>

@endsection