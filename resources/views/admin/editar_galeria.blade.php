
@extends('layouts.main_admin')

@section('content')

<div class="row espaco-m-top-1">
    <div class="col s12">
        <h5 class="Jost-Bold grey-text text-darken-2">
            <i class="fa fa-images"></i>
            &rightarrow; Galeria &rightarrow; Editar Fotografia
        </h5>
        <div class="borda-titulo-3"></div>
    </div>
</div>

@if (session('success'))
    <div class="card-panel blue lighten-5 blue-text text-darken-4">
        {{ session('success') }}
    </div>
@endif

@if (session('fail'))
    <div class="card-panel red lighten-5 red-text text-darken-4">
        {{ session('fail') }}
    </div>
@endif

@if ($errors->any())
    <div class="card-panel red lighten-5 red-text text-darken-4">
        <strong>Corrija os seguintes erros:</strong>
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col s12">
        <div class="new-card-admin">

            <div class="new-card-header-light">
                <h6>
                    <i class="fa fa-edit"></i>
                    Editar fotografia da galeria
                </h6>
            </div>

            <div class="new-card-content">
                <div class="espaco-p-1">

                    <form
                        action="{{ route('admin.edit_galeria', $galeria->id) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col s12">
                                <label for="tipo">Categoria</label>

                                <select
                                    name="tipo"
                                    id="tipo"
                                    required
                                    class="browser-default estilo-input"
                                >
                                    <option value="filter-app"
                                        {{ old('tipo', $galeria->tipo) == 'filter-app' ? 'selected' : '' }}>
                                        Aulas
                                    </option>

                                    <option value="filter-card"
                                        {{ old('tipo', $galeria->tipo) == 'filter-card' ? 'selected' : '' }}>
                                        Actividades
                                    </option>

                                    <option value="filter-web"
                                        {{ old('tipo', $galeria->tipo) == 'filter-web' ? 'selected' : '' }}>
                                        Laboratório
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <label for="titulo">Título ou descrição</label>

                                <textarea
                                    name="titulo"
                                    id="titulo"
                                    class="materialize-textarea estilo-input"
                                    maxlength="5000"
                                    required
                                >{{ old('titulo', $galeria->titulo) }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <label>Fotografia actual</label>

                                <div style="margin-top: 12px;">
                                    @if ($galeria->fotografia)
                                        <img
                                            src="{{ asset('media/galeria/' . $galeria->fotografia) }}"
                                            alt="Fotografia actual"
                                            style="max-width:100%; max-height:250px; border-radius:10px;"
                                        >
                                    @else
                                        <p>Sem fotografia.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <label for="fotografia">
                                    Substituir fotografia (opcional)
                                </label>

                                <input
                                    type="file"
                                    name="fotografia"
                                    id="fotografia"
                                    accept=".jpg,.jpeg,.png,.webp"
                                    class="estilo-input"
                                >

                                <p class="grey-text">
                                    Deixe vazio para manter a fotografia actual.
                                    Máximo: 5 MB.
                                </p>
                            </div>
                        </div>

                        <div class="row" id="preview-container" style="display:none;">
                            <div class="col s12">
                                <label>Nova fotografia seleccionada</label>

                                <div style="margin-top:10px;">
                                    <img
                                        id="preview"
                                        alt="Pré-visualização"
                                        style="max-width:100%; max-height:250px; border-radius:10px;"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <button type="submit" class="btn bg-primary-1">
                                    <i class="fa fa-save"></i>
                                    Guardar Alterações
                                </button>

                                <a
                                    href="{{ route('admin.ver_galeria') }}"
                                    class="btn grey lighten-4 grey-text text-darken-3"
                                >
                                    <i class="fa fa-arrow-left"></i>
                                    Voltar à Galeria
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
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('fotografia');
    const preview = document.getElementById('preview');
    const container = document.getElementById('preview-container');

    let imagemURL = null;

    input.addEventListener('change', function () {
        if (imagemURL) {
            URL.revokeObjectURL(imagemURL);
            imagemURL = null;
        }

        const ficheiro = this.files[0];

        if (!ficheiro) {
            container.style.display = 'none';
            return;
        }

        if (
            !['image/jpeg', 'image/png', 'image/webp'].includes(ficheiro.type)
            || ficheiro.size > 5 * 1024 * 1024
        ) {
            alert('Seleccione uma imagem JPG, PNG ou WEBP com até 5 MB.');
            this.value = '';
            container.style.display = 'none';
            return;
        }

        imagemURL = URL.createObjectURL(ficheiro);
        preview.src = imagemURL;
        container.style.display = 'block';
    });

    window.addEventListener('pagehide', function () {
        if (imagemURL) URL.revokeObjectURL(imagemURL);
    });
});
</script>

@endsection
