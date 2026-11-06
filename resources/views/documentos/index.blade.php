
@extends('layouts.main')

@section('content')

<style>
    .documentos-pagina {
        padding: 50px 15px 75px;
        min-height: 420px;
    }

    .documentos-pagina h3 {
        font-weight: 700;
        margin-bottom: 12px;
    }

    .documentos-pagina .documentos-intro {
        margin-bottom: 30px;
    }

    .documentos-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
        align-items: stretch;
    }

    .documentos-grid .card {
        margin: 0;
        border-radius: 10px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.88);
        border: 1px solid rgba(20, 75, 130, 0.12);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
        display: flex;
        flex-direction: column;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .documentos-grid .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 7px 20px rgba(0, 0, 0, 0.12);
    }

    .documentos-grid .card-content {
        padding: 18px;
        flex: 1;
    }

    .documentos-grid .card-title {
        font-size: 17px;
        line-height: 1.4;
        font-weight: 600;
        color: #173d68;
        margin-bottom: 12px;
    }

    .documentos-grid .card-content p {
        font-size: 13px;
        line-height: 1.6;
    }

    .documentos-grid .card-action {
        padding: 14px 18px;
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        border-top: 1px solid rgba(0, 0, 0, 0.08);
    }

    .documentos-grid .card-action a {
        font-size: 12px;
        font-weight: 600;
        color: #1769b3 !important;
        text-transform: none !important;
        margin: 0 !important;
    }

    .documentos-grid .card-action a:hover {
        text-decoration: underline;
    }

    @media (max-width: 992px) {
        .documentos-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .documentos-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .documentos-pagina {
            padding-top: 30px;
        }

        .documentos-pagina h3 {
            font-size: 25px;
        }
    }
</style>

<section class="container documentos-pagina">

    <h3>Documentos da Rede Eiffel</h3>

    <p class="documentos-intro">
        Consulte e descarregue os documentos oficiais disponibilizados pela Rede Eiffel.
    </p>

    <div class="documentos-grid">

        @forelse ($documentos as $documento)

            <div class="card">

                <div class="card-content">

                    <span class="card-title">
                        {{ $documento->titulo }}
                    </span>

                    @if ($documento->ano_letivo)
                        <p>
                            <strong>Ano lectivo:</strong>
                            {{ $documento->ano_letivo }}
                        </p>
                    @endif

                    @if ($documento->descricao)
                        <p style="margin-top: 8px;">
                            {{ $documento->descricao }}
                        </p>
                    @endif

                    <p style="margin-top: 8px; color: #666;">
                        Categoria:
                        {{ ucfirst(str_replace('_', ' ', $documento->categoria)) }}
                    </p>

                </div>

                <div class="card-action">

                    <a
                        href="{{ route('documentos.visualizar', $documento) }}"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        Visualizar PDF
                    </a>

                    <a href="{{ route('documentos.baixar', $documento) }}">
                        Descarregar PDF
                    </a>

                </div>

            </div>

        @empty

            <p>
                De momento, não existem documentos disponíveis para consulta.
            </p>

        @endforelse

    </div>

</section>

@endsection
