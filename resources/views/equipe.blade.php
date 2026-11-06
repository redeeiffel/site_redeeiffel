
@extends('layouts.main')

@section('content')

<style>
    .equipa-publica {
        padding: 55px 0 75px;
    }

    .equipa-publica .titulo-seccao {
        text-align: center;
        font-weight: 700;
        margin-bottom: 12px;
        color: #263238;
    }

    .equipa-publica .descricao-seccao {
        text-align: center;
        color: #607d8b;
        margin-bottom: 35px;
    }

    .equipa-publica .cartao-membro {
        border-radius: 12px;
        overflow: hidden;
        height: calc(100% - 20px);
        margin-bottom: 20px;
    }

    .equipa-publica .foto-membro {
        width: 100%;
        height: 350px;
        object-fit: cover;
        object-position: center 15%;
        display: block;
    }

    .equipa-publica .foto-placeholder {
        height: 350px;
        background: #eceff1;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #78909c;
        font-size: 70px;
    }

    .equipa-publica .nome-membro {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 8px;
        color: #263238;
    }

    .equipa-publica .cargo-membro {
        color: #1565c0;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .equipa-publica .biografia-membro {
        color: #546e7a;
        line-height: 1.7;
        white-space: pre-line;
        overflow-wrap: anywhere;
    }

    .equipa-publica .seletor-liceu {
        max-width: 650px;
        margin: 0 auto 35px;
    }

    .equipa-publica .seletor-liceu select {
        display: block;
        width: 100%;
        height: 50px;
        border: 1px solid #cfd8dc;
        border-radius: 8px;
        padding: 10px;
        background: #fff;
    }

    .equipa-publica .mensagem-vazia {
        padding: 30px;
        text-align: center;
        background: #f5f7f9;
        border-radius: 10px;
        color: #607d8b;
    }

    .equipa-publica .grupo-liceu {
        display: none;
    }

    .equipa-publica .grupo-liceu.visivel {
        display: block;
    }

    .equipa-publica .separador {
        margin: 55px 0;
        border: 0;
        border-top: 1px solid #e0e0e0;
    }
</style>

<section class="banner-other">
    <div class="container">
        <div class="row">
            <div class="col s12 white-text"
                 data-aos="fade-up"
                 data-aos-delay="100">
                <h5 class="title">A Nossa Equipa</h5>
            </div>
        </div>
    </div>
</section>

<section class="equipa-publica">
    <div class="container">

        {{-- COORDENAÇÃO NACIONAL --}}

        <h4 class="titulo-seccao">
            Coordenação Nacional
        </h4>

        <p class="descricao-seccao">
            Conheça os responsáveis pela Coordenação Nacional da Rede Eiffel.
        </p>

        @if($coordenacao && $coordenacao->membros->isNotEmpty())

            <div class="row">

                @foreach($coordenacao->membros as $membro)

                    <div class="col s12 m6 l4">

                        <div class="card cartao-membro">

                            @if($membro->fotografia)

                                <img
                                    class="foto-membro"
                                    src="{{ asset('storage/' . $membro->fotografia) }}"
                                    alt="{{ $membro->nome }}"
                                    loading="lazy">

                            @else

                                <div class="foto-placeholder">
                                    <i class="fa fa-user"></i>
                                </div>

                            @endif

                            <div class="card-content">

                                <div class="nome-membro">
                                    {{ $membro->nome }}
                                </div>

                                <div class="cargo-membro">
                                    {{ $membro->cargo }}
                                </div>

                                @if($membro->biografia)

                                    <p class="biografia-membro">
                                        {{ $membro->biografia }}
                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="mensagem-vazia">
                Os membros da Coordenação Nacional
                serão apresentados brevemente.
            </div>

        @endif

        <hr class="separador">

        {{-- DIREÇÃO DOS LICEUS --}}

        <h4 class="titulo-seccao">
            Direção dos Nossos Liceus
        </h4>

        <p class="descricao-seccao">
            Selecione um liceu para conhecer os membros da sua direção.
        </p>

        @if($liceus->isNotEmpty())

            <div class="seletor-liceu">

                <label for="selecionar-liceu">
                    Selecione o liceu
                </label>

                <select id="selecionar-liceu">

                    @foreach($liceus as $liceu)

                        <option value="liceu-{{ $liceu->id }}">
                            {{ $liceu->nome }}
                        </option>

                    @endforeach

                </select>

            </div>

            @foreach($liceus as $liceu)

                <div
                    id="liceu-{{ $liceu->id }}"
                    class="grupo-liceu {{ $loop->first ? 'visivel' : '' }}">

                    <h5 class="titulo-seccao">
                        {{ $liceu->nome }}
                    </h5>

                    @if($liceu->membros->isNotEmpty())

                        <div class="row">

                            @foreach($liceu->membros as $membro)

                                <div class="col s12 m6 l4">

                                    <div class="card cartao-membro">

                                        @if($membro->fotografia)

                                            <img
                                                class="foto-membro"
                                                src="{{ asset('storage/' . $membro->fotografia) }}"
                                                alt="{{ $membro->nome }}"
                                                loading="lazy">

                                        @else

                                            <div class="foto-placeholder">
                                                <i class="fa fa-user"></i>
                                            </div>

                                        @endif

                                        <div class="card-content">

                                            <div class="nome-membro">
                                                {{ $membro->nome }}
                                            </div>

                                            <div class="cargo-membro">
                                                {{ $membro->cargo }}
                                            </div>

                                            @if($membro->biografia)

                                                <p class="biografia-membro">
                                                    {{ $membro->biografia }}
                                                </p>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="mensagem-vazia">
                            Ainda não existem membros publicados
                            para esta instituição.
                        </div>

                    @endif

                    @if($liceu->website)

                        <div class="center-align" style="margin-top:25px;">

                            <a
                                href="{{ $liceu->website }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="btn blue darken-3">

                                Visitar website do liceu

                            </a>

                        </div>

                    @endif

                </div>

            @endforeach

        @else

            <div class="mensagem-vazia">
                Ainda não existem liceus ativos para apresentação.
            </div>

        @endif

    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const seletor = document.getElementById('selecionar-liceu');

    if (!seletor) {
        return;
    }

    seletor.addEventListener('change', function () {

        document.querySelectorAll('.grupo-liceu').forEach(function (grupo) {
            grupo.classList.remove('visivel');
        });

        const selecionado = document.getElementById(this.value);

        if (selecionado) {
            selecionado.classList.add('visivel');
        }

    });

});
</script>

@endsection
