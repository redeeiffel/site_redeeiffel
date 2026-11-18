
@extends('layouts.main_admin')

@section('content')

<div class="row espaco-m-top-1">
    <div class="col s12">
        <h5 class="Jost-Bold grey-text text-darken-2">
            <i class="fa fa-images"></i>
            &rightarrow; Galeria &rightarrow; Nova Fotografia
        </h5>
        <div class="borda-titulo-3"></div>
    </div>
</div>

{{-- Mensagens de sucesso --}}
@if (session('success'))
    <div class="row">
        <div class="col s12">
            <div class="card-panel green lighten-5 green-text text-darken-4">
                <i class="fa fa-check-circle"></i>
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif

{{-- Mensagens de falha --}}
@if (session('fail'))
    <div class="row">
        <div class="col s12">
            <div class="card-panel red lighten-5 red-text text-darken-4">
                <i class="fa fa-exclamation-circle"></i>
                {{ session('fail') }}
            </div>
        </div>
    </div>
@endif

{{-- Erros de validação --}}
@if ($errors->any())
    <div class="row">
        <div class="col s12">
            <div class="card-panel red lighten-5 red-text text-darken-4">
                <strong>
                    <i class="fa fa-exclamation-triangle"></i>
                    Verifique os seguintes erros:
                </strong>

                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

<div class="row">
    <div class="col s12">
        <div class="new-card-admin">

            <div class="new-card-header-light">
                <h6>
                    <i class="fa fa-camera"></i>
                    Registar nova fotografia na galeria
                </h6>
            </div>

            <div class="new-card-content">
                <div class="espaco-p-1">

                    <form
                        action="{{ route('admin.add_galery') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf

                        {{-- Categoria --}}
                        <div class="row">
                            <div class="col s12">
                                <label for="tipo">
                                    Categoria da fotografia
                                    <span class="red-text">*</span>
                                </label>

                                <select
                                    name="tipo"
                                    id="tipo"
                                    required
                                    class="browser-default estilo-input"
                                >
                                    <option value="" disabled
                                        {{ old('tipo') ? '' : 'selected' }}>
                                        Seleccione uma categoria
                                    </option>

                                    <option value="filter-app"
                                        {{ old('tipo') == 'filter-app' ? 'selected' : '' }}>
                                        Aulas
                                    </option>

                                    <option value="filter-card"
                                        {{ old('tipo') == 'filter-card' ? 'selected' : '' }}>
                                        Actividades
                                    </option>

                                    <option value="filter-web"
                                        {{ old('tipo') == 'filter-web' ? 'selected' : '' }}>
                                        Laboratório
                                    </option>
                                </select>

                                @error('tipo')
                                    <span class="red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Título --}}
                        <div class="row">
                            <div class="col s12">
                                <label for="titulo">
                                    Título ou descrição da fotografia
                                    <span class="red-text">*</span>
                                </label>

                                <textarea
                                    name="titulo"
                                    id="titulo"
                                    class="materialize-textarea estilo-input"
                                    rows="4"
                                    maxlength="5000"
                                    required
                                    placeholder="Descreva a fotografia ou actividade realizada..."
                                >{{ old('titulo') }}</textarea>

                                @error('titulo')
                                    <span class="red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Fotografia --}}
                        <div class="row">
                            <div class="col s12">
                                <label for="fotografia">
                                    Carregar fotografia
                                    <span class="red-text">*</span>
                                </label>

                                <input
                                    type="file"
                                    name="fotografia"
                                    id="fotografia"
                                    accept=".jpg,.jpeg,.png,.webp"
                                    required
                                    class="estilo-input"
                                >

                                <p class="grey-text" style="font-size: 13px;">
                                    <i class="fa fa-info-circle"></i>
                                    Formatos permitidos: JPG, JPEG, PNG e WEBP.
                                    Tamanho máximo: 5 MB.
                                </p>

                                @error('fotografia')
                                    <span class="red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Pré-visualização --}}
                        <div class="row" id="preview-container" style="display: none;">
                            <div class="col s12">
                                <label>Pré-visualização da fotografia</label>

                                <div style="margin-top: 12px;">
                                    <img
                                        id="preview-imagem"
                                        src=""
                                        alt="Pré-visualização"
                                        style="
                                            max-width: 100%;
                                            max-height: 300px;
                                            border-radius: 10px;
                                            object-fit: contain;
                                            border: 1px solid #ddd;
                                        "
                                    >
                                </div>
                            </div>
                        </div>

                        {{-- Botões --}}
                        <div class="row">
                            <div class="col s12">

                                <button
                                    type="submit"
                                    id="btn-enviar"
                                    class="btn bg-primary-1 borda-1"
                                >
                                    <i class="fa fa-save"></i>
                                    Guardar Fotografia
                                </button>

                                <a
                                    href="{{ route('admin.ver_galeria') }}"
                                    class="btn grey lighten-4 grey-text text-darken-3 borda-1"
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
    const preview = document.getElementById('preview-imagem');
    const container = document.getElementById('preview-container');
    const botao = document.getElementById('btn-enviar');
    const formulario = input.closest('form');

    let imagemURL = null;

    input.addEventListener('change', function () {
        const ficheiro = this.files[0];

        if (imagemURL) {
            URL.revokeObjectURL(imagemURL);
            imagemURL = null;
        }

        if (!ficheiro) {
            container.style.display = 'none';
            return;
        }

        const formatosPermitidos = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!formatosPermitidos.includes(ficheiro.type)) {
            alert('Seleccione uma imagem JPG, PNG ou WEBP.');
            input.value = '';
            container.style.display = 'none';
            return;
        }

        if (ficheiro.size > 5 * 1024 * 1024) {
            alert('A fotografia não pode ultrapassar 5 MB.');
            input.value = '';
            container.style.display = 'none';
            return;
        }

        imagemURL = URL.createObjectURL(ficheiro);
        preview.src = imagemURL;
        container.style.display = 'block';
    });

    formulario.addEventListener('submit', function () {
        if (!formulario.checkValidity()) {
            return;
        }

        botao.disabled = true;
        botao.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> A guardar...';
    });

    window.addEventListener('pagehide', function () {
        if (imagemURL) {
            URL.revokeObjectURL(imagemURL);
        }
    });

});
</script>

@endsection
