
@extends('layouts.main')

@section('content')

<style>
    /* ==========================================
       SLIDER PRINCIPAL — REDE EIFFEL
    ========================================== */

    .eiffel-hero {
        width: 100%;
        overflow: hidden;
        position: relative;
        background: #102b53;
    }

    .eiffel-hero .slider,
    .eiffel-hero .slider .slides,
    .eiffel-hero .slider .slides > li {
        height: clamp(440px, 47vw, 700px) !important;
    }

    .eiffel-hero .slider {
        width: 100%;
        position: relative;
    }

    .eiffel-hero .slider .slides {
        background: #102b53;
        margin: 0;
    }

    .eiffel-hero .slider .slides > li {
        position: absolute;
        inset: 0;
        overflow: hidden;
    }

    /* Fotografias */

    .eiffel-hero .slider .slides > li > img {
        width: 100%;
        height: 100%;
        object-fit: cover !important;
        object-position: center 10% !important;
        background-position: center 10% !important;
        background-size: cover !important;
        background-repeat: no-repeat !important;
        max-width: none;
    }

    /* Camada de contraste para melhorar a leitura */

    .eiffel-hero .slider .slides > li::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
            90deg,
            rgba(5, 23, 49, 0.78) 0%,
            rgba(5, 23, 49, 0.49) 48%,
            rgba(5, 23, 49, 0.12) 100%
        );
        pointer-events: none;
        z-index: 1;
    }

    /* Bloco de título, descrição e botão */

    .eiffel-hero .slider .slides > li .caption {
        position: absolute;
        top: 50%;
        left: 7%;
        width: min(780px, 84%);
        height: auto;
        z-index: 2;
        margin: 0 !important;
        padding: 0;
        transform: translateY(-50%);
        color: #ffffff;
    }

    .eiffel-hero .hero-conteudo {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 17px;
    }

    /* Título principal */

    .eiffel-hero .hero-titulo {
        font-size: clamp(30px, 3.8vw, 60px);
        line-height: 1.12;
        font-weight: 800;
        color: #ffffff;
        margin: 0;
        max-width: 780px;
        overflow-wrap: anywhere;
        text-shadow: 0 2px 14px rgba(0, 0, 0, 0.22);
    }

    /* Descrição */

    .eiffel-hero .hero-descricao {
        font-size: clamp(15px, 1.45vw, 21px);
        line-height: 1.55;
        font-weight: 400;
        color: #f5f7fb;
        margin: 0;
        max-width: 650px;
        overflow-wrap: anywhere;
        text-shadow: 0 1px 8px rgba(0, 0, 0, 0.2);
    }

    /* Botão */

    .eiffel-hero .hero-acoes {
        margin: 5px 0 0;
    }

    .eiffel-hero .hero-botao {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: auto;
        max-width: 100%;
        min-height: 48px;
        height: auto;
        padding: 12px 23px;
        box-sizing: border-box;
        border: 1px solid rgba(255, 255, 255, 0.85);
        border-radius: 6px;
        background: rgba(255, 255, 255, 0.08);
        color: #ffffff;
        font-size: 14px;
        font-weight: 700;
        line-height: 1.4;
        text-transform: none;
        text-decoration: none;
        white-space: normal;
        text-align: center;
        overflow-wrap: anywhere;
        transition: background 0.2s ease;
    }

    .eiffel-hero .hero-botao:hover,
    .eiffel-hero .hero-botao:focus {
        background: #ffffff;
        color: #123f8c;
    }

    /* Indicadores do Materialize */

    .eiffel-hero .slider .indicators {
        position: absolute;
        bottom: 12px;
        z-index: 5;
    }

    .eiffel-hero .slider .indicators .indicator-item {
        width: 10px;
        height: 10px;
        margin: 0 6px;
    }

    .eiffel-hero .slider .indicators .indicator-item.active {
        background-color: #d5ad54;
    }

    /* ==========================================
       ECRÃS GRANDES
    ========================================== */

    @media (min-width: 1600px) {

        .eiffel-hero .slider,
        .eiffel-hero .slider .slides,
        .eiffel-hero .slider .slides > li {
            height: 720px !important;
        }

        .eiffel-hero .slider .slides > li .caption {
            left: max(7%, calc((100vw - 1450px) / 2));
            width: min(850px, 70%);
        }

        .eiffel-hero .hero-titulo {
            font-size: 62px;
        }

    }

    /* ==========================================
       TABLETS
    ========================================== */

    @media (min-width: 601px) and (max-width: 992px) {

        .eiffel-hero .slider,
        .eiffel-hero .slider .slides,
        .eiffel-hero .slider .slides > li {
            height: 540px !important;
        }

        .eiffel-hero .slider .slides > li .caption {
            left: 6%;
            width: 86%;
        }

        .eiffel-hero .hero-titulo {
            font-size: clamp(30px, 4.3vw, 43px);
        }

        .eiffel-hero .hero-descricao {
            font-size: 17px;
        }

    }

    /* ==========================================
       TELEMÓVEIS
    ========================================== */

    @media (max-width: 600px) {

        .eiffel-hero .slider,
        .eiffel-hero .slider .slides,
        .eiffel-hero .slider .slides > li {
            height: 520px !important;
        }

        .eiffel-hero .slider .slides > li > img {
            object-position: center 12% !important;
            background-position: center 12% !important;
        }

        .eiffel-hero .slider .slides > li::after {
            background: linear-gradient(
                180deg,
                rgba(5, 23, 49, 0.20) 0%,
                rgba(5, 23, 49, 0.54) 32%,
                rgba(5, 23, 49, 0.84) 100%
            );
        }

        .eiffel-hero .slider .slides > li .caption {
            top: auto;
            bottom: 65px;
            left: 6%;
            width: 88%;
            transform: none;
        }

        .eiffel-hero .hero-conteudo {
            gap: 13px;
        }

        .eiffel-hero .hero-titulo {
            font-size: clamp(25px, 7vw, 35px);
            line-height: 1.16;
        }

        .eiffel-hero .hero-descricao {
            font-size: 15px;
            line-height: 1.5;
        }

        .eiffel-hero .hero-acoes {
            margin-top: 5px;
        }

        .eiffel-hero .hero-botao {
            min-height: 44px;
            padding: 11px 17px;
            font-size: 13px;
        }

        .eiffel-hero .slider .indicators {
            bottom: 10px;
        }

    }

    /* Telemóveis pequenos */

    @media (max-width: 380px) {

        .eiffel-hero .slider,
        .eiffel-hero .slider .slides,
        .eiffel-hero .slider .slides > li {
            height: 550px !important;
        }

        .eiffel-hero .hero-titulo {
            font-size: 25px;
        }

        .eiffel-hero .hero-descricao {
            font-size: 14px;
        }

        .eiffel-hero .slider .slides > li .caption {
            bottom: 58px;
        }

    }

    @media (prefers-reduced-motion: reduce) {
        .eiffel-hero .hero-botao {
            transition: none;
        }
    }

</style>

{{-- ==========================================
     SLIDER PRINCIPAL
========================================== --}}

<section class="eiffel-hero">

    <div class="slider">

        <ul class="slides">

            @foreach($slides as $slide)

                <li>

                    <img
                        src="{{ asset('media/slide/' . $slide->fotografia) }}"
                        alt="{{ $slide->titulo_um }}"
                    >

                    <div class="caption left-align">

                        <div class="hero-conteudo">

                            <h1 class="Roboto-Black hero-titulo">
                                {{ $slide->titulo_um }}
                            </h1>

                            <h5 class="font_logo Roboto-Regular hero-descricao">
                                {{ $slide->titulo_dois }}
                            </h5>

                            @if($slide->titulo_botao && $slide->link_botao)

                                <p class="hero-acoes">

                                    <a
                                        href="{{ $slide->link_botao }}"
                                        class="hero-botao Roboto-Bold"
                                    >
                                        <span class="fa fa-edit"></span>
                                        {{ $slide->titulo_botao }}
                                    </a>

                                </p>

                            @endif

                        </div>

                    </div>

                </li>

            @endforeach

        </ul>

    </div>

</section>

{{-- ==========================================
     PARCEIROS
========================================== --}}

<section class="white espaco-m-top-1 py-5">

    <div class="container">

        <div class="row" data-aos="fade-up" data-aos-delay="100">

            <div class="col s12">

                <p>
                    <span class="fa fa-handshake transparent-text texto-5"></span>
                </p>

                <h5>
                    NOSSOS <span class="negrito">PARCEIROS</span>
                </h5>

                <div class="borda-titulo-0"></div>

            </div>

        </div>

        <div class="row mb-4">

            {{-- Ministério da Educação --}}

            <div class="col s12 m4 l3" data-aos="fade-up" data-aos-delay="100">

                <a href="https://governo.gov.ao/" target="_blank" rel="noopener noreferrer" class="center">

                    <div class="boxCategoria z-depth-2 borda-2">

                        <div class="child">

                            <img
                                src="{{ asset('assets/img/parceiros/images.jpeg') }}"
                                class="responsive-img"
                                alt="Ministério da Educação"
                                loading="lazy"
                            >

                        </div>

                    </div>

                    <h6>Ministério da Educação</h6>

                </a>

            </div>

            {{-- Total Energies --}}

            <div class="col s12 m4 l3" data-aos="fade-up" data-aos-delay="200">

                <a href="https://totalenergies.com/" target="_blank" rel="noopener noreferrer" class="center">

                    <div class="boxCategoria z-depth-2 borda-2">

                        <div class="child">

                            <img
                                src="{{ asset('assets/img/parceiros/totalenergies-logo.png') }}"
                                class="responsive-img"
                                alt="Total Energies"
                                loading="lazy"
                            >

                        </div>

                    </div>

                    <h6>Total Energies</h6>

                </a>

            </div>

            {{-- Missão Laica Francesa --}}

            <div class="col s12 m4 l3" data-aos="fade-up" data-aos-delay="300">

                <a href="https://www.mlfmonde.org/" target="_blank" rel="noopener noreferrer" class="center">

                    <div class="boxCategoria z-depth-2 borda-2">

                        <div class="child">

                            <img
                                src="{{ asset('assets/img/parceiros/Imagem1.png') }}"
                                class="responsive-img"
                                alt="Missão Laica Francesa"
                                loading="lazy"
                            >

                        </div>

                    </div>

                    <h6>Missão Laica Francesa</h6>

                </a>

            </div>

            {{-- Embaixada de França --}}

            <div class="col s12 m4 l3" data-aos="fade-up" data-aos-delay="400">

                <a
                    href="https://ao.ambafrance.org/-Embaixada-de-Franca-em-Luanda-"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="center"
                >

                    <div class="boxCategoria z-depth-2 borda-2">

                        <div class="child">

                            <img
                                src="{{ asset('assets/img/parceiros/embaixada-logo.jpg') }}"
                                class="responsive-img"
                                alt="Embaixada de França"
                                loading="lazy"
                            >

                        </div>

                    </div>

                    <h6>Embaixada de França</h6>

                </a>

            </div>

        </div>

    </div>

</section>

{{-- ==========================================
     ACESSO RÁPIDO
========================================== --}}

<section class="py-5">

    <div class="container">

        <div class="row">

            <div class="col s12 l12" data-aos="fade-up" data-aos-delay="100">

                <h5>
                    ACESSO <span class="negrito">RÁPIDO</span>
                </h5>

                <div class="borda-titulo-0"></div>

            </div>

        </div>

        <div class="row">

            {{-- Comentários recentes --}}

            <div class="col s12 m12 l2 mt-3" data-aos="fade-up" data-aos-delay="100">

                <div class="center linha-top-30">

                    <a
                        href="{{ route('comentarios') }}"
                        class="boxCategoria orange lighten-1 z-depth-2 borda-2 white-text"
                    >
                        <span class="bi bi-chat-dots texto-5"></span>
                    </a>

                    <p>
                        <a href="{{ route('comentarios') }}" class="mt-5 negrito">
                            Comentários recentes
                        </a>
                    </p>

                </div>

            </div>

            {{-- Inscrição --}}

            <div class="col s12 m12 l2 mt-3" data-aos="fade-up" data-aos-delay="100">

                <div class="center linha-top-30">

                    <a
                        href="{{ route('inscricoes') }}"
                        class="boxCategoria green z-depth-2 borda-2 white-text"
                    >
                        <span class="bi bi-pencil-square"></span>
                    </a>

                    <p>
                        <a href="{{ route('inscricoes') }}" class="mt-5 negrito">
                            Inscrição
                        </a>
                    </p>

                </div>

            </div>

            {{-- Galeria --}}

            <div class="col s12 m12 l2 mt-3" data-aos="fade-up" data-aos-delay="200">

                <div class="center linha-top-30">

                    <a
                        href="{{ route('galerias') }}"
                        class="boxCategoria light-green darken-1 z-depth-2 borda-2 white-text"
                    >
                        <span class="fa fa-file-image texto-5"></span>
                    </a>

                    <p>
                        <a href="{{ route('galerias') }}" class="mt-5 negrito">
                            Galeria
                        </a>
                    </p>

                </div>

            </div>

            {{-- Liceus --}}

            <div class="col s12 m12 l2 mt-3" data-aos="fade-up" data-aos-delay="200">

                <div class="center linha-top-30">

                    <a
                        href="{{ route('apresentacao_liceu') }}"
                        class="boxCategoria light-blue darken-2 z-depth-2 borda-2 white-text"
                    >
                        <span class="bi bi-pin-map texto-5"></span>
                    </a>

                    <p>
                        <a href="{{ route('apresentacao_liceu') }}" class="mt-5 negrito">
                            Liceus
                        </a>
                    </p>

                </div>

            </div>

            {{-- Projectos --}}

            <div class="col s12 m12 l2 mt-3" data-aos="fade-up" data-aos-delay="400">

                <div class="center linha-top-30">

                    <a
                        href="{{ route('projecto_educacional') }}"
                        class="boxCategoria teal darken-3 z-depth-2 borda-2 white-text"
                    >
                        <span class="bi bi-bar-chart texto-5"></span>
                    </a>

                    <p>
                        <a href="{{ route('projecto_educacional') }}" class="mt-5 negrito">
                            Projectos
                        </a>
                    </p>

                </div>

            </div>

            {{-- Fale connosco --}}

            <div class="col s12 m12 l2 mt-3" data-aos="fade-up" data-aos-delay="400">

                <div class="center linha-top-30">

                    <a
                        href="{{ route('fale_conosco') }}"
                        class="boxCategoria pink darken-4 z-depth-2 borda-2 white-text"
                    >
                        <span class="bi bi-headset texto-5"></span>
                    </a>

                    <p>
                        <a href="{{ route('fale_conosco') }}" class="mt-5 negrito">
                            Fale connosco
                        </a>
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- ==========================================
     ÚLTIMAS NOTÍCIAS
========================================== --}}

<section class="white py-3" data-aos="fade-up" data-aos-delay="200">

    <div class="container">

        <div class="row">

            <div class="col s12 l12">

                <h5>
                    ÚLTIMAS <span class="negrito">NOTÍCIAS</span>

                    <a
                        href="{{ route('noticias') }}"
                        class="btn transparent grey-text text-darken-3 borda-1 right btn-outline-dark"
                    >
                        <span class="fa fa-chevron-right"></span>
                        Ver todas
                    </a>

                </h5>

                <div class="borda-titulo-0"></div>

            </div>

        </div>

        <div class="row">

            @foreach($noticias as $noticia)

                <div
                    class="col s12 m4 l6"
                    data-aos="fade-up"
                    data-aos-delay="100"
                >

                    <div class="card z-depth-0">

                        <div class="card-image">

                            <img
                                src="{{ asset('media/publicacao/' . $noticia->imagem_externa) }}"
                                style="height: 300px; object-fit: cover;"
                                loading="lazy"
                                alt="{{ $noticia->titulo }}"
                            >

                        </div>

                        <div class="card-content px-0">

                            <p>
                                <span class="Roboto-Regular">
                                    {{ $noticia->data }}
                                </span>
                            </p>

                            <span class="card-title Roboto-Bold text-primary">
                                {{ $noticia->titulo }}
                            </span>

                            <p class="Roboto-Regular">
                                {{ $noticia->descricao }}
                            </p>

                        </div>

                        <div class="card-action px-0">

                            <a
                                href="{{ url('/detalhes_noticias/' . $noticia->id) }}"
                                class="bg-primary btn z-depth-0"
                            >
                                Continuar a ler
                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

@endsection
