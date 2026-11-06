
@extends('layouts.main')

@section('content')

<style>
/* =========================================
   REDE EIFFEL — APRESENTAÇÃO DOS LICEUS
========================================= */

.liceus-page {
    background: #f5f8fc;
    padding: 40px 0 75px;
    min-height: 65vh;
}

/* CABEÇALHO COM IMAGEM VISÍVEL */

.liceus-banner {
    position: relative;

    background:
        linear-gradient(
            120deg,
            rgba(16, 47, 87, 0.35),
            rgba(23, 105, 179, 0.25)
        ),
        url('{{ asset('assets/imagens/OBJECTIVO.JPG') }}')
        center center / cover no-repeat;

    color: #ffffff;
    padding: 85px 20px;
    text-align: center;
}

.liceus-banner .container {
    position: relative;
    z-index: 1;
}

.liceus-banner h1 {
    color: #ffffff;
    font-size: clamp(28px, 4vw, 44px);
    font-weight: 800;
    margin: 0;
    line-height: 1.3;
    text-shadow: 0 3px 12px rgba(0, 0, 0, 0.65);
}

.liceus-banner p {
    max-width: 680px;
    margin: 15px auto 0;
    font-size: 16px;
    line-height: 1.7;
    color: #ffffff;
    text-align: center;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.65);
}

.liceus-container {
    width: min(1200px, 94%);
    margin: auto;
}

/* =========================================
   NAVEGAÇÃO
========================================= */

.liceus-tabs {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    margin-bottom: 25px;
    padding: 8px;
    background: #ffffff;
    border: 1px solid #e1e9f4;
    border-radius: 14px;
}

.liceus-tab-button {
    flex: 1;
    min-width: 160px;
    border: 0;
    border-radius: 9px;
    padding: 14px 16px;
    background: transparent;
    color: #173b65;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    transition: background .2s, color .2s;
}

.liceus-tab-button:hover {
    background: #eaf2fb;
}

.liceus-tab-button.active {
    background: #1769b3;
    color: #ffffff;
}

.liceus-tab-button:focus-visible {
    outline: 3px solid #8bbcf1;
    outline-offset: 2px;
}

/* =========================================
   PAINÉIS
========================================= */

.liceus-panel {
    display: none;
    background: #ffffff;
    border: 1px solid #e1e9f4;
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 8px 30px rgba(15, 49, 91, .05);
}

.liceus-panel.active {
    display: block;
}

.liceus-panel[hidden] {
    display: none !important;
}

.liceus-section-title {
    font-size: 25px;
    color: #123d70;
    font-weight: 800;
    margin: 0 0 12px;
}

.liceus-intro {
    color: #60738c;
    font-size: 15px;
    line-height: 1.8;
    margin-bottom: 25px;
}

/* =========================================
   CARTÕES DOS LICEUS
========================================= */

.liceus-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 18px;
    margin: 28px 0;
}

.liceu-card {
    border: 1px solid #dfe8f4;
    border-radius: 13px;
    padding: 24px 20px;
    background: #ffffff;
    transition: transform .2s, box-shadow .2s;
    min-width: 0;
}

.liceu-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 28px rgba(23, 105, 179, .10);
}

.liceu-card-icon {
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #eaf3fc;
    border-radius: 10px;
    color: #1769b3;
    font-size: 21px;
    margin-bottom: 17px;
}

.liceu-card h3 {
    font-size: 17px;
    line-height: 1.5;
    font-weight: 700;
    color: #123d70;
    margin: 0 0 12px;
    overflow-wrap: anywhere;
}

.liceu-card p {
    font-size: 13px;
    line-height: 1.5;
    color: #667991;
    margin: 0;
}

.liceu-card .liceu-codigo {
    display: inline-block;
    padding: 5px 10px;
    margin-bottom: 14px;
    border-radius: 6px;
    background: #edf4fc;
    color: #1769b3;
    font-size: 12px;
    font-weight: 700;
}

/* =========================================
   MAPA
========================================= */

.liceus-mapa {
    margin-top: 35px;
    padding: 25px;
    background: #f8fbff;
    border: 1px solid #e1eaf5;
    border-radius: 14px;
    text-align: center;
}

.liceus-mapa h3 {
    font-size: 20px;
    color: #123d70;
    margin: 0 0 18px;
}

.liceus-mapa img {
    display: block;
    max-width: 100%;
    width: auto;
    max-height: 650px;
    height: auto;
    margin: auto;
    object-fit: contain;
}

.liceus-mapa a {
    display: inline-block;
    margin-top: 15px;
    color: #1769b3;
    font-size: 14px;
    font-weight: 700;
}

/* =========================================
   SECÇÕES INFORMATIVAS
========================================= */

.liceus-info-grid {
    display: grid;
    grid-template-columns:
        minmax(0, 1.2fr)
        minmax(0, 1fr);
    align-items: start;
    gap: 35px;
}

.liceus-info-text p {
    color: #45566b;
    font-size: 16px;
    line-height: 1.9;
    text-align: justify;
    margin: 0;
}

.liceus-info-image {
    margin: 0;
}

.liceus-info-image img {
    display: block;
    width: 100%;
    height: auto;
    max-height: 450px;
    object-fit: contain;
    border-radius: 12px;
}

.liceus-info-image figcaption {
    text-align: center;
    color: #697b90;
    font-size: 13px;
    line-height: 1.5;
    padding: 12px 5px;
}

/* =========================================
   RESPONSIVIDADE
========================================= */

@media (max-width: 992px) {
    .liceus-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }

    .liceus-info-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 600px) {
    .liceus-banner {
        padding: 55px 18px;
        background-position: center;
    }

    .liceus-banner p {
        font-size: 14px;
    }

    .liceus-page {
        padding: 25px 0 50px;
    }

    .liceus-tabs {
        display: grid;
        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }

    .liceus-tab-button {
        min-width: 0;
        font-size: 12px;
        padding: 12px 8px;
    }

    .liceus-panel {
        padding: 20px 15px;
    }

    .liceus-grid {
        grid-template-columns: 1fr;
        gap: 12px;
    }

    .liceu-card {
        padding: 20px;
    }

    .liceus-section-title {
        font-size: 22px;
    }

    .liceus-info-text p {
        font-size: 14px;
        line-height: 1.8;
        text-align: left;
    }

    .liceus-mapa {
        padding: 12px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .liceu-card,
    .liceus-tab-button {
        transition: none;
    }
}
</style>

{{-- =========================================
     CABEÇALHO
========================================= --}}

<section class="liceus-banner">
    <div class="container">

        <h1 class="Roboto-Black">
            Apresentação dos Liceus
        </h1>

        <p>
            Conheça os seis liceus que integram a Rede Eiffel
            em diferentes províncias de Angola.
        </p>

    </div>
</section>

{{-- =========================================
     CONTEÚDO
========================================= --}}

<section class="liceus-page">
    <div class="liceus-container">

        {{-- NAVEGAÇÃO --}}

        <div class="liceus-tabs"
             role="tablist"
             aria-label="Informações sobre os liceus">

            <button type="button"
                    class="liceus-tab-button active"
                    id="tab-seis"
                    role="tab"
                    aria-controls="painel-seis"
                    aria-selected="true"
                    data-liceus-tab="painel-seis">
                Seis Liceus
            </button>

            <button type="button"
                    class="liceus-tab-button"
                    id="tab-objectivo"
                    role="tab"
                    aria-controls="painel-objectivo"
                    aria-selected="false"
                    data-liceus-tab="painel-objectivo">
                Objectivo
            </button>

            <button type="button"
                    class="liceus-tab-button"
                    id="tab-origem"
                    role="tab"
                    aria-controls="painel-origem"
                    aria-selected="false"
                    data-liceus-tab="painel-origem">
                Origem e Significado
            </button>

            <button type="button"
                    class="liceus-tab-button"
                    id="tab-metas"
                    role="tab"
                    aria-controls="painel-metas"
                    aria-selected="false"
                    data-liceus-tab="painel-metas">
                Metas a Cumprir
            </button>

        </div>

        {{-- =====================================
             SEIS LICEUS
        ===================================== --}}

        <div id="painel-seis"
             class="liceus-panel active"
             role="tabpanel"
             aria-labelledby="tab-seis">

            <h2 class="liceus-section-title">
                Os Seis Liceus da Rede Eiffel
            </h2>

            <p class="liceus-intro">
                A Rede Eiffel integra seis liceus distribuídos
                por diferentes localidades de Angola,
                contribuindo para a formação dos estudantes
                e o desenvolvimento das comunidades.
            </p>

            @php
                $liceusEiffel = [
                    [
                        'codigo' => '4002-BGO',
                        'nome' => 'Liceu N.º 4002 BGO Eiffel do Dande',
                        'local' => 'Dande, Bengo'
                    ],
                    [
                        'codigo' => '309-MJE',
                        'nome' => 'Liceu N.º 309 MJE Eiffel Malanje',
                        'local' => 'Malanje'
                    ],
                    [
                        'codigo' => '1029-CNO',
                        'nome' => 'Liceu N.º 1029 CNO Eiffel do Cazengo',
                        'local' => 'Cazengo, Cuanza Norte'
                    ],
                    [
                        'codigo' => '080-CNE',
                        'nome' => 'Liceu N.º 080 CNE Eiffel Ondjiva',
                        'local' => 'Ondjiva, Cunene'
                    ],
                    [
                        'codigo' => '2192-HBO',
                        'nome' => 'Liceu N.º 2192 HBO Eiffel do Huambo',
                        'local' => 'Huambo'
                    ],
                    [
                        'codigo' => '887-MCO',
                        'nome' => 'Liceu N.º 887 MCO Eiffel Luena',
                        'local' => 'Luena, Moxico'
                    ]
                ];
            @endphp

            <div class="liceus-grid">

                @foreach($liceusEiffel as $liceu)

                    <article class="liceu-card">

                        <div class="liceu-card-icon">
                            <span class="fa fa-school"
                                  aria-hidden="true"></span>
                        </div>

                        <span class="liceu-codigo">
                            {{ $liceu['codigo'] }}
                        </span>

                        <h3>
                            {{ $liceu['nome'] }}
                        </h3>

                        <p>
                            <span class="fa fa-map-marker-alt"
                                  aria-hidden="true"></span>
                            {{ $liceu['local'] }}
                        </p>

                    </article>

                @endforeach

            </div>

            {{-- MAPA ORIGINAL --}}

            <div class="liceus-mapa">

                <h3>
                    Localização dos Liceus
                </h3>

                <img
                    src="{{ asset('assets/novo_mapa.jpg') }}"
                    alt="Mapa de localização dos liceus da Rede Eiffel em Angola"
                    loading="lazy"
                >

                <a href="{{ asset('assets/novo_mapa.jpg') }}"
                   target="_blank"
                   rel="noopener noreferrer">
                    <span class="fa fa-expand"></span>
                    Ver mapa em tamanho completo
                </a>

            </div>

        </div>

        {{-- =====================================
             OBJECTIVO
        ===================================== --}}

        <div id="painel-objectivo"
             class="liceus-panel"
             role="tabpanel"
             aria-labelledby="tab-objectivo"
             hidden>

            <h2 class="liceus-section-title">
                O Nosso Objectivo
            </h2>

            <div class="liceus-info-grid">

                <div class="liceus-info-text">

                    <p>
                        Inspirados em Comenius, pedagogo do século XVII
                        que propôs um sistema articulado de ensino,
                        reconhecendo o igual direito de todos os homens
                        ao saber, os liceus Eiffel pretendem ser escolas
                        de referência pela qualidade da sua intervenção
                        no desenvolvimento da comunidade onde se inserem,
                        valorizando o saber e a exigência, traçando
                        percursos diversificados, fontes de valores
                        humanistas, interessado em preparar os alunos
                        para se tornarem cidadãos e cidadãs do futuro,
                        assente na máxima "Ensinar tudo a todos".
                    </p>

                </div>

                <figure class="liceus-info-image">

                    <img
                        src="{{ asset('assets/imagens/OBJECTIVO.JPG') }}"
                        alt="Estudantes do Liceu Eiffel de Malanje"
                        loading="lazy"
                    >

                    <figcaption>
                        Estudantes do Liceu Nº 44 Eiffel de Malanje
                    </figcaption>

                </figure>

            </div>

        </div>

        {{-- =====================================
             ORIGEM E SIGNIFICADO
        ===================================== --}}

        <div id="painel-origem"
             class="liceus-panel"
             role="tabpanel"
             aria-labelledby="tab-origem"
             hidden>

            <h2 class="liceus-section-title">
                Origem e Significado
            </h2>

            <div class="liceus-info-grid">

                <div class="liceus-info-text">

                    <p>
                        O símbolo da Rede Eiffel traduz, de forma
                        icónica, a nossa missão: a torre Eiffel encima
                        de um livro, símbolo do saber, obstinação e rigor.
                        A torre Eiffel expressa a elevação/ascensão
                        e vigor do conhecimento, da ciência e sabedoria,
                        consubstanciado no crescimento integral de cada
                        indivíduo, de forma gradual e sustentada.

                        Esta torre do conhecimento encontra-se encimada
                        pelo globo terrestre, símbolo dum mundo em
                        permanente evolução, destacando a vermelho
                        Angola como país.

                        A Rede Eiffel assenta a sua linha de ação neste
                        mesmo exemplo: o ciclo evolutivo e renovador
                        do processo ensino-aprendizagem só se constrói
                        com base na periódica mutação de atitudes e
                        comportamentos que conduzirá a novos caminhos,
                        novas etapas.

                        Cada ser aprendente renova-se a cada instante,
                        semeando talentos, cumprindo etapas, para que
                        a colheita seja profícua e de forma integral.
                    </p>

                </div>

                <figure class="liceus-info-image">

                    <img
                        src="{{ asset('assets/imagens/origem_.JPG') }}"
                        alt="Estudantes do Liceu Eiffel de Ondjiva"
                        loading="lazy"
                    >

                    <figcaption>
                        Estudantes do Liceu Eiffel de Ondjiva
                    </figcaption>

                </figure>

            </div>

        </div>

        {{-- =====================================
             METAS A CUMPRIR
        ===================================== --}}

        <div id="painel-metas"
             class="liceus-panel"
             role="tabpanel"
             aria-labelledby="tab-metas"
             hidden>

            <h2 class="liceus-section-title">
                Metas a Cumprir
            </h2>

            <div class="liceus-info-grid">

                <div class="liceus-info-text">

                    <p>
                        Desta forma, a Rede Eiffel presta um serviço
                        público de educação, apoiado em quatro pilares:
                        aprender a conhecer, aprender a fazer,
                        aprender a viver em comunidade e aprender a ser,
                        com vista à formação de cidadãos autónomos
                        e interventivos, capazes de se adaptar a novos
                        desafios sociais, numa perspetiva de aprendizagem
                        ao longo da vida.

                        A adaptação à mudança, à construção de
                        aprendizagens pessoais, ao desenvolvimento
                        afetivo e comportamental, à articulação das
                        atividades escolares com o meio e o mundo do
                        trabalho são também áreas a privilegiar,
                        assim como a associação entre as liberdades
                        individuais, a dimensão curricular, a integração
                        no mundo do trabalho e/ou o prosseguimento
                        de estudos.
                    </p>

                </div>

                <figure class="liceus-info-image">

                    <img
                        src="{{ asset('assets/imagens/metas_a_cumprir.jpg') }}"
                        alt="Prática no laboratório de biologia"
                        loading="lazy"
                    >

                    <figcaption>
                        Estudantes do Liceu Nº 30 Eiffel de Cazengo
                        durante uma prática no laboratório de biologia
                    </figcaption>

                </figure>

            </div>

        </div>

    </div>
</section>

{{-- =========================================
     JAVASCRIPT DAS ABAS
========================================= --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    const buttons = Array.from(
        document.querySelectorAll('[data-liceus-tab]')
    );

    const panels = Array.from(
        document.querySelectorAll('.liceus-panel')
    );

    function activateTab(button) {

        const targetId = button.dataset.liceusTab;

        buttons.forEach(function (item) {

            const active = item === button;

            item.classList.toggle('active', active);
            item.setAttribute('aria-selected', String(active));
            item.tabIndex = active ? 0 : -1;

        });

        panels.forEach(function (panel) {

            const active = panel.id === targetId;

            panel.classList.toggle('active', active);
            panel.hidden = !active;

        });

    }

    buttons.forEach(function (button, index) {

        button.addEventListener('click', function () {
            activateTab(button);
        });

        button.addEventListener('keydown', function (event) {

            if (!['ArrowLeft', 'ArrowRight', 'Home', 'End']
                .includes(event.key)) {
                return;
            }

            event.preventDefault();

            let next = index;

            if (event.key === 'ArrowRight') {
                next = (index + 1) % buttons.length;
            }

            if (event.key === 'ArrowLeft') {
                next = (index - 1 + buttons.length) % buttons.length;
            }

            if (event.key === 'Home') next = 0;
            if (event.key === 'End') next = buttons.length - 1;

            activateTab(buttons[next]);
            buttons[next].focus();

        });

    });

    if (buttons.length) {
        activateTab(buttons[0]);
    }

});
</script>

@endsection
