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

<div class="row">
    <div class="col s12">
        <div class="new-card-admin">

            <div class="new-card-header-light">
                <h6>Editar item da Galeria</h6>
            </div>

            <div class="new-card-content">
                <div class="espaco-p-1">

                    <form action="{{ route('admin.edit_galeria', $galeria->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Tipo -->
                        <div class="row">
                            <div class="col s12">
                                <label>Tipo</label>
                                <select name="tipo" required class="browser-default estilo-input">
                                    <option value="filter-app" {{ $galeria->tipo == 'filter-app' ? 'selected' : '' }}>Aulas</option>
                                    <option value="filter-card" {{ $galeria->tipo == 'filter-card' ? 'selected' : '' }}>Actividade</option>
                                    <option value="filter-web" {{ $galeria->tipo == 'filter-web' ? 'selected' : '' }}>Laboratório</option>
                                </select>
                            </div>
                        </div>

                        <!-- Título -->
                        <div class="row">
                            <div class="col s12">
                                <label>Título</label>
                                <input type="text" name="titulo" required
                                       class="browser-default estilo-input"
                                       value="{{ old('titulo', $galeria->titulo) }}">
                            </div>
                        </div>

                        <!-- Imagem atual -->
                        <div class="row">
                            <div class="col s12">
                                <label>Imagem atual</label><br>
                                @if($galeria->fotografia)
                                    <img src="{{ asset('/media/galeria/' . $galeria->fotografia) }}" 
                                         width="200" class="borda-1">
                                @else
                                    <p>Sem imagem</p>
                                @endif
                            </div>
                        </div>

                        <!-- Nova imagem -->
                        <div class="row">
                            <div class="col s12">
                                <label>Alterar imagem</label>
                                <input type="file" name="fotografia" accept="image/*" onchange="previewImagem(event)">
                            </div>
                        </div>

                        <!-- Preview -->
                        <div class="row">
                            <div class="col s12">
                                <img id="preview" src="#" style="display:none; max-width:200px; margin-top:10px;" class="borda-1">
                            </div>
                        </div>

                        <!-- Botões -->
                        <div class="row">
                            <div class="col s12">
                                <button type="submit" class="btn bg-primary-1">
                                    <span class="fa fa-save"></span> Atualizar
                                </button>

                                <a href="}" 
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

<!-- Preview script -->
<script>
function previewImagem(event) {
    const input = event.target;
    const preview = document.getElementById('preview');

    if (input.files && input.files[0]) {
        preview.src = URL.createObjectURL(input.files[0]);
        preview.style.display = 'block';
    }
}
</script>

@endsection