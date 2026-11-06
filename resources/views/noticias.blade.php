
@extends('layouts.main')

@section('content')

{{-- Banner --}}
<section class="banner-other">
    <div class="container">
        <div class="row">
            <div class="col s12 white-text"
                 data-aos="fade-up"
                 data-aos-delay="100">
                <h5 class="title">Notícias</h5>
            </div>
        </div>
    </div>
</section>

{{-- Lista de notícias --}}
<section class="white noticias-eiffel-section">
    <div class="container">

        @if($noticias->isNotEmpty())

            <div class="noticias-eiffel-grid">

                @foreach($noticias as $noticia)

                    <article class="card z-depth-0 noticia-eiffel-card">

                        {{-- Imagem --}}
                        <div class="noticia-eiffel-imagem">

                            @if($noticia->imagem_externa)
                                <img
                                    src="{{ asset('media/publicacao/' . $noticia->imagem_externa) }}"
                                    alt="{{ $noticia->titulo }}"
                                    loading="lazy">
                            @else
                                <div class="noticia-eiffel-sem-imagem">
                                    <i class="far fa-image fa-3x"></i>
                                </div>
                            @endif

                        </div>

                        {{-- Conteúdo --}}
                        <div class="noticia-eiffel-conteudo">

                            <p class="noticia-eiffel-data Roboto-Regular">
                                {{ $noticia->data }}
                            </p>

                            <h2 class="noticia-eiffel-titulo Roboto-Bold text-primary">
                                {{ $noticia->titulo }}
                            </h2>

                            <p class="noticia-eiffel-descricao Roboto-Regular">
                                {{ strip_tags($noticia->descricao ?? '') }}
                            </p>

                        </div>

                        {{-- Botão --}}
                        <div class="noticia-eiffel-acao">

                            <a href="{{ url('/detalhes_noticias/' . $noticia->id) }}"
                               class="bg-primary btn z-depth-0">
                                Continuar a ler
                            </a>

                        </div>

                    </article>

                @endforeach

            </div>

        @else

            <div class="noticia-eiffel-vazio">
                <i class="far fa-newspaper fa-3x"></i>

                <h5>Sem notícias disponíveis</h5>

                <p>
                    As próximas novidades da Rede Eiffel
                    serão publicadas aqui.
                </p>
            </div>

        @endif

    </div>
</section>

@endsection
