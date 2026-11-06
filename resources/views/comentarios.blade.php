
@extends('layouts.main')

@section('content')

<style>
    .testemunhos-seccao {
        padding: 75px 0 90px;
        overflow: hidden;
        background: linear-gradient(180deg, #ffffff 0%, #f5f6f8 100%);
    }

    .testemunhos-titulo {
        font-size: clamp(23px, 3vw, 34px);
        font-weight: 700;
        text-align: center;
        color: #273344;
        margin: 0 0 12px;
    }

    .testemunhos-subtitulo {
        text-align: center;
        color: #697386;
        margin: 0 auto 30px;
        max-width: 650px;
        line-height: 1.7;
    }

    .testemunhos-palco {
        position: relative;
        width: 100%;
        height: 590px;
        perspective: 1400px;
        perspective-origin: center center;
    }

    .testemunho-cartao {
        position: absolute;
        top: 25px;
        left: 50%;
        width: min(390px, 76vw);
        height: 505px;
        margin-left: calc(min(390px, 76vw) / -2);
        border-radius: 20px;
        background: #fff;
        overflow: hidden;
        box-shadow: 0 18px 48px rgba(20, 34, 55, .13);
        transform-style: preserve-3d;
        transition:
            transform .75s cubic-bezier(.22, 1, .36, 1),
            opacity .75s ease,
            filter .75s ease,
            box-shadow .75s ease;
        cursor: pointer;
        opacity: 0;
        pointer-events: none;
        display: flex;
        flex-direction: column;
    }

    .testemunho-cartao[data-posicao="0"] {
        transform: translateX(0) translateZ(100px) rotateY(0deg) scale(1);
        opacity: 1;
        z-index: 10;
        filter: none;
        pointer-events: auto;
        cursor: default;
        box-shadow: 0 25px 65px rgba(20, 34, 55, .2);
    }

    .testemunho-cartao[data-posicao="-1"] {
        transform: translateX(-245px) translateZ(-100px) rotateY(28deg) scale(.85);
        opacity: .57;
        z-index: 8;
        filter: saturate(.75);
        pointer-events: auto;
    }

    .testemunho-cartao[data-posicao="1"] {
        transform: translateX(245px) translateZ(-100px) rotateY(-28deg) scale(.85);
        opacity: .57;
        z-index: 8;
        filter: saturate(.75);
        pointer-events: auto;
    }

    .testemunho-cartao[data-posicao="-2"] {
        transform: translateX(-410px) translateZ(-240px) rotateY(38deg) scale(.68);
        opacity: .22;
        z-index: 6;
        filter: saturate(.55);
        pointer-events: auto;
    }

    .testemunho-cartao[data-posicao="2"] {
        transform: translateX(410px) translateZ(-240px) rotateY(-38deg) scale(.68);
        opacity: .22;
        z-index: 6;
        filter: saturate(.55);
        pointer-events: auto;
    }

    .testemunho-fotografia {
        height: 275px;
        flex-shrink: 0;
        position: relative;
        overflow: hidden;
        background: #e9edf2;
    }

    .testemunho-fotografia img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
    }

    .testemunho-fotografia::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to top,
            rgba(10, 20, 35, .78),
            rgba(10, 20, 35, 0) 65%
        );
        pointer-events: none;
    }

    .testemunho-identidade {
        position: absolute;
        bottom: 18px;
        left: 22px;
        right: 22px;
        color: #fff;
        z-index: 2;
    }

    .testemunho-identidade h3 {
        margin: 0 0 5px;
        font-size: 21px;
        font-weight: 700;
        color: #fff;
        line-height: 1.3;
    }

    .testemunho-identidade p {
        margin: 0;
        font-size: 13px;
        color: rgba(255, 255, 255, .9);
    }

    .testemunho-corpo {
        padding: 23px 25px;
        flex: 1;
        overflow-y: auto;
        overscroll-behavior: contain;
    }

    .testemunho-aspas {
        font-size: 42px;
        line-height: .8;
        font-family: Georgia, serif;
        color: #b49a59;
        margin-bottom: 12px;
    }

    .testemunho-texto {
        margin: 0;
        color: #526072;
        line-height: 1.7;
        font-size: 14px;
        overflow-wrap: anywhere;
        white-space: pre-line;
    }

    .testemunhos-navegacao {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 18px;
        margin-top: 5px;
    }

    .testemunhos-seta {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        border: 1px solid #d7dce3;
        background: #fff;
        color: #334155;
        font-size: 24px;
        cursor: pointer;
        box-shadow: 0 5px 16px rgba(0, 0, 0, .06);
        transition: background .2s, transform .2s;
    }

    .testemunhos-seta:hover {
        background: #f0f2f5;
        transform: translateY(-2px);
    }

    .testemunhos-contador {
        font-size: 14px;
        color: #687589;
        min-width: 70px;
        text-align: center;
    }

    .testemunhos-vazio {
        text-align: center;
        color: #697386;
        padding: 50px 15px;
    }

    @media (max-width: 700px) {
        .testemunhos-seccao {
            padding: 48px 0 60px;
        }

        .testemunhos-palco {
            height: 525px;
            perspective: 900px;
        }

        .testemunho-cartao {
            top: 20px;
            width: min(310px, 78vw);
            height: 465px;
            margin-left: calc(min(310px, 78vw) / -2);
        }

        .testemunho-fotografia {
            height: 230px;
        }

        .testemunho-cartao[data-posicao="-1"] {
            transform: translateX(-125px) translateZ(-100px) rotateY(30deg) scale(.82);
            opacity: .35;
        }

        .testemunho-cartao[data-posicao="1"] {
            transform: translateX(125px) translateZ(-100px) rotateY(-30deg) scale(.82);
            opacity: .35;
        }

        .testemunho-cartao[data-posicao="-2"],
        .testemunho-cartao[data-posicao="2"] {
            opacity: 0;
            pointer-events: none;
        }

        .testemunho-corpo {
            padding: 20px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .testemunho-cartao {
            transition: none;
        }
    }
</style>

<section class="testemunhos-seccao">
    <div class="container">

        <h2 class="testemunhos-titulo">
            Vozes da Comunidade Eiffel
        </h2>

        <p class="testemunhos-subtitulo">
            Conheça alguns comentários e testemunhos dos estudantes
            da nossa comunidade educativa.
        </p>

        @if($comentarios->count() > 0)

            <div class="testemunhos-palco"
                 id="testemunhos-palco"
                 aria-label="Carrossel de comentários">

                @foreach($comentarios as $comentario)
                    <article class="testemunho-cartao"
                             data-indice="{{ $loop->index }}"
                             data-posicao="oculto"
                             aria-hidden="true">

                        <div class="testemunho-fotografia">

                            @if($comentario->fotografia)
                                <img
                                    src="{{ asset('media/comentario/' . $comentario->fotografia) }}"
                                    alt="Fotografia de {{ $comentario->nome }}"
                                    loading="{{ $loop->first ? 'eager' : 'lazy' }}">
                            @endif

                            <div class="testemunho-identidade">
                                <h3>{{ $comentario->nome }}</h3>
                                <p>
                                    {{ $comentario->turma }}
                                    @if($comentario->liceu)
                                        · {{ $comentario->liceu }}
                                    @endif
                                </p>
                            </div>

                        </div>

                        <div class="testemunho-corpo">
                            <div class="testemunho-aspas" aria-hidden="true">“</div>
                            <p class="testemunho-texto">{{ $comentario->comentario }}</p>
                        </div>

                    </article>
                @endforeach

            </div>

            <div class="testemunhos-navegacao">
                <button type="button"
                        class="testemunhos-seta"
                        id="testemunhos-anterior"
                        aria-label="Comentário anterior">
                    &#8249;
                </button>

                <span class="testemunhos-contador"
                      id="testemunhos-contador"
                      aria-live="polite">
                    1 / {{ $comentarios->count() }}
                </span>

                <button type="button"
                        class="testemunhos-seta"
                        id="testemunhos-seguinte"
                        aria-label="Comentário seguinte">
                    &#8250;
                </button>
            </div>

        @else
            <p class="testemunhos-vazio">
                Ainda não existem comentários publicados.
            </p>
        @endif

    </div>
</section>

<script>
(function () {
    'use strict';

    function iniciarTestemunhos() {
        const palco = document.getElementById('testemunhos-palco');
        if (!palco) return;

        const cartoes = Array.from(
            palco.querySelectorAll('.testemunho-cartao')
        );

        const anterior = document.getElementById('testemunhos-anterior');
        const seguinte = document.getElementById('testemunhos-seguinte');
        const contador = document.getElementById('testemunhos-contador');

        const total = cartoes.length;
        if (!total) return;

        let actual = 0;
        let intervalo = null;

        const movimentoReduzido = window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches;

        function distanciaCircular(indice) {
            let distancia = indice - actual;

            if (distancia > total / 2) distancia -= total;
            if (distancia < -total / 2) distancia += total;

            return distancia;
        }

        function actualizar() {
            cartoes.forEach(function (cartao, indice) {
                const distancia = distanciaCircular(indice);

                cartao.dataset.posicao =
                    Math.abs(distancia) <= 2
                        ? String(distancia)
                        : 'oculto';

                const activo = indice === actual;

                cartao.setAttribute('aria-hidden', activo ? 'false' : 'true');

                if ('inert' in cartao) {
                    cartao.inert = !activo;
                }
            });

            contador.textContent = (actual + 1) + ' / ' + total;
        }

        function mudar(direccao) {
            actual = (actual + direccao + total) % total;
            actualizar();
        }

        function pararAutomatico() {
            if (intervalo !== null) {
                clearInterval(intervalo);
                intervalo = null;
            }
        }

        function iniciarAutomatico() {
            pararAutomatico();

            if (total <= 1 || movimentoReduzido) return;

            intervalo = setInterval(function () {
                if (!document.hidden) {
                    mudar(1);
                }
            }, 6500);
        }

        anterior.addEventListener('click', function () {
            mudar(-1);
            iniciarAutomatico();
        });

        seguinte.addEventListener('click', function () {
            mudar(1);
            iniciarAutomatico();
        });

        cartoes.forEach(function (cartao, indice) {
            cartao.addEventListener('click', function () {
                if (indice !== actual) {
                    actual = indice;
                    actualizar();
                    iniciarAutomatico();
                }
            });
        });

        palco.addEventListener('mouseenter', pararAutomatico);
        palco.addEventListener('mouseleave', iniciarAutomatico);
        palco.addEventListener('focusin', pararAutomatico);
        palco.addEventListener('focusout', function (evento) {
            if (!palco.contains(evento.relatedTarget)) {
                iniciarAutomatico();
            }
        });

        actualizar();
        iniciarAutomatico();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', iniciarTestemunhos);
    } else {
        iniciarTestemunhos();
    }
})();
</script>

@endsection
