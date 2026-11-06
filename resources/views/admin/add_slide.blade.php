
@extends('layouts.main_admin')

@section('content')

<style>
    .slide-admin-page {
        padding-bottom: 35px;
    }

    .slide-admin-page .slide-header {
        margin-bottom: 22px;
    }

    .slide-admin-page .slide-header h5 {
        color: #123f8c;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .slide-admin-page .slide-header p {
        color: #64748b;
        font-size: 14px;
        margin-top: 5px;
    }

    .slide-admin-page .slide-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 5px 22px rgba(18, 63, 140, 0.05);
    }

    .slide-admin-page .slide-card-header {
        padding: 19px 24px;
        background: #f3f7fd;
        border-bottom: 1px solid #e2e8f0;
    }

    .slide-admin-page .slide-card-header h6 {
        margin: 0;
        font-size: 17px;
        font-weight: 700;
        color: #123f8c;
    }

    .slide-admin-page .slide-card-content {
        padding: 25px;
    }

    .slide-admin-page .slide-section-title {
        font-size: 15px;
        font-weight: 700;
        color: #123f8c;
        margin: 12px 0 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e2e8f0;
    }

    .slide-admin-page .slide-field {
        margin-bottom: 20px;
    }

    .slide-admin-page .slide-field label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #334155;
        margin-bottom: 9px;
    }

    .slide-admin-page .slide-input,
    .slide-admin-page .slide-textarea {
        display: block;
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        background: #ffffff;
        padding: 12px 14px;
        font-size: 14px;
        color: #334155;
        outline: none;
    }

    .slide-admin-page .slide-input:focus,
    .slide-admin-page .slide-textarea:focus {
        border-color: #123f8c;
        box-shadow: 0 0 0 3px rgba(18, 63, 140, 0.08);
    }

    .slide-admin-page .slide-textarea {
        min-height: 110px;
        resize: vertical;
    }

    .slide-admin-page .slide-help {
        font-size: 12px;
        color: #64748b;
        line-height: 1.6;
        margin-top: 8px;
    }

    .slide-admin-page .slide-upload {
        border: 1px dashed #9eb5d4;
        border-radius: 10px;
        background: #f8fafd;
        padding: 20px;
        margin-bottom: 20px;
    }

    .slide-admin-page .slide-upload input[type="file"] {
        display: block;
        width: 100%;
        max-width: 100%;
        margin-top: 12px;
        box-sizing: border-box;
    }

    .slide-admin-page .slide-actions {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 12px;
        padding-top: 20px;
        border-top: 1px solid #e2e8f0;
        margin-top: 25px;
    }

    .slide-admin-page .slide-btn-save {
        background: #123f8c;
        color: #ffffff;
        border: none;
        border-radius: 8px;
        padding: 12px 22px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 9px;
    }

    .slide-admin-page .slide-btn-save:hover {
        background: #0c2f6a;
    }

    .slide-admin-page .slide-btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 20px;
        border-radius: 8px;
        border: 1px solid #cbd5e1;
        color: #475569;
        background: #f8fafc;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .slide-admin-page .slide-btn-back:hover {
        background: #edf2f7;
    }

    .slide-admin-page .slide-alert {
        padding: 14px 18px;
        border-radius: 9px;
        margin-bottom: 18px;
        font-size: 14px;
    }

    .slide-admin-page .slide-alert-success {
        background: #edf4ff;
        border: 1px solid #bcd1f0;
        color: #123f8c;
    }

    .slide-admin-page .slide-alert-error {
        background: #fff1f2;
        border: 1px solid #fecdd3;
        color: #9f1239;
    }

    @media (max-width: 600px) {
        .slide-admin-page .slide-card-content {
            padding: 16px;
        }

        .slide-admin-page .slide-card-header {
            padding: 16px;
        }

        .slide-admin-page .slide-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .slide-admin-page .slide-btn-save,
        .slide-admin-page .slide-btn-back {
            justify-content: center;
            width: 100%;
            box-sizing: border-box;
        }
    }
</style>

<div class="slide-admin-page">

    {{-- =========================================
         MENSAGENS
    ========================================== --}}

    @if(session('success'))
        <div class="slide-alert slide-alert-success">
            <i class="fa fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('fail'))
        <div class="slide-alert slide-alert-error">
            <i class="fa fa-exclamation-circle"></i>
            {{ session('fail') }}
        </div>
    @endif

    @if($errors->any())
        <div class="slide-alert slide-alert-error">
            <strong>Verifica os seguintes campos:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- =========================================
         CABEÇALHO
    ========================================== --}}

    <div class="row espaco-m-top-1">
        <div class="col s12">

            <div class="slide-header">

                <h5 class="Jost-Bold">
                    <i class="fa fa-images"></i>
                    Gestão de Sliders
                </h5>

                <p>
                    Página inicial /
                    Sliders /
                    Adicionar novo slider
                </p>

                <div class="borda-titulo-3"></div>

            </div>

        </div>
    </div>

    {{-- =========================================
         FORMULÁRIO
    ========================================== --}}

    <div class="row">
        <div class="col s12">

            <div class="slide-card">

                <div class="slide-card-header">
                    <h6>
                        <i class="fa fa-plus-circle"></i>
                        Registar novo slider
                    </h6>
                </div>

                <div class="slide-card-content">

                    <form
                        action="{{ route('admin.add_slid') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf

                        {{-- =========================================
                             INFORMAÇÕES DO SLIDER
                        ========================================== --}}

                        <div class="slide-section-title">
                            <i class="fa fa-align-left"></i>
                            Informações do slider
                        </div>

                        <div class="row">

                            <div class="col s12">

                                <div class="slide-field">

                                    <label for="titulo_um">
                                        Título principal
                                    </label>

                                    <input
                                        type="text"
                                        id="titulo_um"
                                        name="titulo_um"
                                        class="browser-default slide-input"
                                        value="{{ old('titulo_um') }}"
                                        placeholder="Ex.: Bem-vindo à Rede Eiffel"
                                        required
                                    >

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col s12">

                                <div class="slide-field">

                                    <label for="titulo_dois">
                                        Descrição do slider
                                    </label>

                                    <textarea
                                        id="titulo_dois"
                                        name="titulo_dois"
                                        class="browser-default slide-textarea"
                                        placeholder="Escreve uma breve descrição..."
                                        required
                                    >{{ old('titulo_dois') }}</textarea>

                                    <p class="slide-help">
                                        Esta descrição será apresentada
                                        sobre a fotografia do slider.
                                    </p>

                                </div>

                            </div>

                        </div>

                        {{-- =========================================
                             BOTÃO DO SLIDER
                        ========================================== --}}

                        <div class="slide-section-title">
                            <i class="fa fa-link"></i>
                            Botão de navegação
                        </div>

                        <div class="row">

                            <div class="col s12 m6">

                                <div class="slide-field">

                                    <label for="titulo_botao">
                                        Legenda do botão
                                    </label>

                                    <input
                                        type="text"
                                        id="titulo_botao"
                                        name="titulo_botao"
                                        class="browser-default slide-input"
                                        value="{{ old('titulo_botao') }}"
                                        placeholder="Ex.: Saber mais"
                                        required
                                    >

                                </div>

                            </div>

                            <div class="col s12 m6">

                                <div class="slide-field">

                                    <label for="link_botao">
                                        Link do botão
                                    </label>

                                    <input
                                        type="text"
                                        id="link_botao"
                                        name="link_botao"
                                        class="browser-default slide-input"
                                        value="{{ old('link_botao') }}"
                                        placeholder="Ex.: /projecto_educacional"
                                        required
                                    >

                                    <p class="slide-help">
                                        Podes utilizar um endereço interno
                                        ou um link completo.
                                    </p>

                                </div>

                            </div>

                        </div>

                        {{-- =========================================
                             FOTOGRAFIA DO SLIDER
                        ========================================== --}}

                        <div class="slide-section-title">
                            <i class="fa fa-image"></i>
                            Fotografia do slider
                        </div>

                        <div class="slide-upload">

                            <label for="fotografia_slider">
                                Seleccionar fotografia
                            </label>

                            <input
                                type="file"
                                id="fotografia_slider"
                                name="fotografia"
                                accept="image/jpeg,image/png,image/webp"
                                required
                            >

                            <p class="slide-help">
                                Recomenda-se uma fotografia horizontal
                                de boa qualidade, preferencialmente
                                com resolução de 1920 × 800 píxeis
                                ou superior.
                            </p>

                        </div>

                        {{-- =========================================
                             EDITOR DE ENQUADRAMENTO
                        ========================================== --}}

                        <div class="slide-section-title">
                            <i class="fa fa-crop"></i>
                            Enquadramento da fotografia
                        </div>

                        <x-editor-imagem
                            campo="fotografia"
                            prefixo="fotografia"
                            formato="horizontal"
                            :posicao-x="old('fotografia_posicao_x', 50)"
                            :posicao-y="old('fotografia_posicao_y', 15)"
                            :zoom="old('fotografia_zoom', 100)"
                        />

                        {{-- =========================================
                             BOTÕES
                        ========================================== --}}

                        <div class="slide-actions">

                            <button
                                type="submit"
                                name="btn-enviar"
                                class="slide-btn-save"
                            >
                                <i class="fa fa-save"></i>
                                Guardar slider
                            </button>

                            <a
                                href="{{ route('admin.ver_slider') }}"
                                class="slide-btn-back"
                            >
                                <i class="fa fa-chevron-left"></i>
                                Voltar à lista
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

<script
    src="{{ asset('assets/js/editor-imagem-eiffel.js') }}"
    defer
></script>

@endsection
