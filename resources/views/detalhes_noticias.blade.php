
@extends('layouts.main')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/detalhes-noticias-eiffel.css') }}?v=2">

@foreach($detalhes as $noticia)

@php
    $titulo = $noticia->titulo ?: 'Notícia da Rede Eiffel';

    $imagemPrincipal = !empty($noticia->imagem_interna)
        ? asset('media/publicacao/' . ltrim($noticia->imagem_interna, '/'))
        : null;

    $imagemSecundaria = !empty($noticia->imagem_interna_tercearia)
        ? asset('media/publicacao/' . ltrim($noticia->imagem_interna_tercearia, '/'))
        : null;

    $linkExterno = trim((string) ($noticia->link ?? ''));

    $linkValido = filter_var($linkExterno, FILTER_VALIDATE_URL)
        && in_array(strtolower((string) parse_url($linkExterno, PHP_URL_SCHEME)), ['http', 'https'], true);

    $urlPartilha = url()->current();

    $textoPartilha = $titulo . ' | Rede Eiffel';

    $facebook = 'https://www.facebook.com/sharer/sharer.php?u='
        . rawurlencode($urlPartilha);

    $whatsapp = 'https://api.whatsapp.com/send?text='
        . rawurlencode($textoPartilha . ' - ' . $urlPartilha);

    $linkedin = 'https://www.linkedin.com/sharing/share-offsite/?url='
        . rawurlencode($urlPartilha);

    $twitter = 'https://twitter.com/intent/tweet?text='
        . rawurlencode($textoPartilha)
        . '&url=' . rawurlencode($urlPartilha);

    $email = 'mailto:?subject='
        . rawurlencode($textoPartilha)
        . '&body='
        . rawurlencode('Confira esta notícia da Rede Eiffel: ' . $urlPartilha);
@endphp

{{-- CABEÇALHO DA NOTÍCIA --}}
<section class="banner-other">
    <div class="container">
        <div class="row">
            <div class="col s12 white-text" data-aos="fade-up">
                <h5 class="title">{{ $titulo }}</h5>
            </div>
        </div>
    </div>
</section>

{{-- CONTEÚDO PRINCIPAL --}}
<section class="eiffel-article">
    <div class="container">
        <div class="row">
            <div class="col s12">

                <article class="article-card">

                    {{-- IDENTIFICAÇÃO DA PUBLICAÇÃO --}}
                    <header class="eiffel-news-header">

                        <div class="eiffel-news-category">
                            <i class="fa-solid fa-newspaper"></i>
                            <span>Rede Eiffel · Notícias e Publicações</span>
                        </div>

                        <h1 class="eiffel-news-title">
                            {{ $titulo }}
                        </h1>

                        @if(!empty($noticia->data))
                            <div class="article-date">
                                <i class="fa-regular fa-calendar-days"></i>
                                <span>{{ $noticia->data }}</span>
                            </div>
                        @endif

                    </header>

                    {{-- IMAGEM PRINCIPAL --}}
                    @if($imagemPrincipal)
                        <figure class="article-figure">
                            <img
                                src="{{ $imagemPrincipal }}"
                                alt="{{ $titulo }}"
                                class="article-image"
                                loading="lazy"
                                decoding="async"
                            >

                            @if(!empty($noticia->nomes))
                                <figcaption class="article-caption">
                                    {{ $noticia->nomes }}
                                </figcaption>
                            @endif
                        </figure>
                    @endif

                    {{-- TEXTO INICIAL --}}
                    @if(!empty($noticia->texto_inicial))
                        <div class="article-text">
                            {{ $noticia->texto_inicial }}
                        </div>
                    @endif

                    {{-- TEXTO SECUNDÁRIO --}}
                    @if(!empty($noticia->texto_secundario))
                        <div class="article-text">
                            {{ $noticia->texto_secundario }}
                        </div>
                    @endif

                    {{-- SEGUNDA IMAGEM --}}
                    @if($imagemSecundaria)
                        <figure class="article-figure">
                            <img
                                src="{{ $imagemSecundaria }}"
                                alt="{{ $noticia->nomes_um ?: $titulo }}"
                                class="article-image"
                                loading="lazy"
                                decoding="async"
                            >

                            @if(!empty($noticia->nomes_um))
                                <figcaption class="article-caption">
                                    {{ $noticia->nomes_um }}
                                </figcaption>
                            @endif
                        </figure>
                    @endif

                    {{-- TERCEIRO TEXTO --}}
                    @if(!empty($noticia->texto_terceario))
                        <div class="article-text">
                            {{ $noticia->texto_terceario }}
                        </div>
                    @endif

                    {{-- QUARTO TEXTO --}}
                    @if(!empty($noticia->texto_quarto))
                        <div class="article-text">
                            {{ $noticia->texto_quarto }}
                        </div>
                    @endif

                    {{-- LINK PARA INFORMAÇÕES ADICIONAIS --}}
                    @if($linkValido)
                        <div class="eiffel-news-more">
                            <a
                                href="{{ $linkExterno }}"
                                class="article-more"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                <span>Ver mais informações</span>
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        </div>
                    @endif

                    <div class="article-divider"></div>

                    {{-- PARTILHA DA NOTÍCIA --}}
                    <footer class="eiffel-news-footer">

                        <div class="eiffel-news-share-heading">
                            <div>
                                <h2 class="article-share-title">
                                    Partilhar esta notícia
                                </h2>
                                <p class="eiffel-share-description">
                                    Ajude a divulgar as informações da Rede Eiffel.
                                </p>
                            </div>

                            <i class="fa-solid fa-share-nodes eiffel-share-decoration"></i>
                        </div>

                        <div class="article-share">

                            {{-- FACEBOOK --}}
                            <a
                                href="{{ $facebook }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="share-button eiffel-share-facebook"
                                aria-label="Partilhar no Facebook"
                            >
                                <i class="fa-brands fa-facebook-f"></i>
                                <span>Facebook</span>
                            </a>

                            {{-- WHATSAPP --}}
                            <a
                                href="{{ $whatsapp }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="share-button eiffel-share-whatsapp"
                                aria-label="Partilhar no WhatsApp"
                            >
                                <i class="fa-brands fa-whatsapp"></i>
                                <span>WhatsApp</span>
                            </a>

                            {{-- LINKEDIN --}}
                            <a
                                href="{{ $linkedin }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="share-button eiffel-share-linkedin"
                                aria-label="Partilhar no LinkedIn"
                            >
                                <i class="fa-brands fa-linkedin-in"></i>
                                <span>LinkedIn</span>
                            </a>

                            {{-- X --}}
                            <a
                                href="{{ $twitter }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="share-button eiffel-share-x"
                                aria-label="Partilhar no X"
                            >
                                <i class="fa-brands fa-x-twitter"></i>
                                <span>X</span>
                            </a>

                            {{-- EMAIL --}}
                            <a
                                href="{{ $email }}"
                                class="share-button eiffel-share-email"
                                aria-label="Partilhar por email"
                            >
                                <i class="fa-regular fa-envelope"></i>
                                <span>Email</span>
                            </a>

                        </div>

                        <div class="eiffel-news-signature">
                            <i class="fa-solid fa-circle-check"></i>
                            <span>Publicação institucional · Rede Eiffel</span>
                        </div>

                    </footer>

                </article>

            </div>
        </div>
    </div>
</section>

@endforeach

@endsection
