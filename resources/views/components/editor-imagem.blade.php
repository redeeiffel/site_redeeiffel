
@props([
    'imagem' => null,
    'campo' => 'fotografia',
    'posicaoX' => 50,
    'posicaoY' => 15,
    'zoom' => 100,
    'prefixo' => 'imagem',
    'formato' => 'vertical',
])

@php
    $editorId = 'editor-imagem-' . \Illuminate\Support\Str::random(10);

    $horizontal = $formato === 'horizontal';
@endphp

<div
    class="editor-imagem-eiffel"
    id="{{ $editorId }}"
    data-campo="{{ $campo }}"
    data-formato="{{ $formato }}"
>

    <style>
        /* =========================================
           ESTRUTURA PRINCIPAL
        ========================================= */

        #{{ $editorId }} {
            border: 1px solid #dce5f0;
            border-radius: 14px;
            padding: 20px;
            background: #f8fafd;
            margin: 18px 0;
            box-sizing: border-box;
        }

        #{{ $editorId }} .editor-titulo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #123f8c;
        }

        #{{ $editorId }} .editor-descricao {
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 18px;
        }

        /* =========================================
           PRÉ-VISUALIZAÇÃO DA FOTOGRAFIA
        ========================================= */

        #{{ $editorId }} .editor-preview {
            width: 100%;

            max-width: {{ $horizontal ? '100%' : '260px' }};

            height: {{ $horizontal ? '360px' : '300px' }};

            overflow: hidden;
            border-radius: 12px;
            background: #e4eaf2;
            margin: 0 auto 20px;
            position: relative;
            box-sizing: border-box;
        }

        #{{ $editorId }} .editor-preview img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            max-width: none;
            transition:
                object-position 0.15s ease,
                transform 0.15s ease;
        }

        #{{ $editorId }} .editor-preview .sem-imagem {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            text-align: center;
            padding: 20px;
            font-size: 14px;
            box-sizing: border-box;
        }

        /* =========================================
           IDENTIFICAÇÃO DO FORMATO
        ========================================= */

        #{{ $editorId }} .editor-formato {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            background: #e8effa;
            color: #123f8c;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 14px;
        }

        /* =========================================
           CONTROLOS DE ENQUADRAMENTO
        ========================================= */

        #{{ $editorId }} .editor-controle {
            margin-bottom: 18px;
        }

        #{{ $editorId }} .editor-controle label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 9px;
        }

        #{{ $editorId }} .editor-controle label span {
            color: #123f8c;
            font-weight: 700;
        }

        #{{ $editorId }} input[type="range"] {
            width: 100%;
            display: block;
            cursor: pointer;
            accent-color: #123f8c;
        }

        /* =========================================
           BOTÃO REPOR
        ========================================= */

        #{{ $editorId }} .editor-repor {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: #ffffff;
            padding: 10px 16px;
            color: #123f8c;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        #{{ $editorId }} .editor-repor:hover {
            background: #e8effa;
            border-color: #123f8c;
        }

        /* =========================================
           NOTA INFORMATIVA
        ========================================= */

        #{{ $editorId }} .editor-nota {
            margin-top: 16px;
            padding: 12px 14px;
            background: #edf3fb;
            border-left: 3px solid #123f8c;
            border-radius: 5px;
            font-size: 12px;
            color: #475569;
            line-height: 1.6;
        }

        /* =========================================
           RESPONSIVIDADE
        ========================================= */

        @media (max-width: 600px) {

            #{{ $editorId }} {
                padding: 14px;
            }

            #{{ $editorId }} .editor-preview {
                height: {{ $horizontal ? '220px' : '300px' }};
            }

            #{{ $editorId }} .editor-titulo {
                font-size: 14px;
            }

        }

        @media (prefers-reduced-motion: reduce) {
            #{{ $editorId }} .editor-preview img {
                transition: none;
            }
        }

    </style>

    <!-- =========================================
         CABEÇALHO
    ========================================== -->

    <div class="editor-titulo">
        <i class="fa fa-crop"></i>
        Ajustar enquadramento da fotografia
    </div>

    <div class="editor-descricao">
        Ajusta a posição e a ampliação da fotografia
        antes de guardar.
    </div>

    <div class="editor-formato">
        @if($horizontal)
            <i class="fa fa-image"></i>
            Formato horizontal — Slider
        @else
            <i class="fa fa-portrait"></i>
            Formato vertical — Fotografia
        @endif
    </div>

    <!-- =========================================
         PRÉ-VISUALIZAÇÃO
    ========================================== -->

    <div class="editor-preview">

        <img
            class="editor-imagem-preview"
            src="{{ $imagem ?: '' }}"
            alt="Pré-visualização da fotografia"
            style="{{ $imagem ? '' : 'display:none;' }}"
        >

        <div
            class="sem-imagem"
            style="{{ $imagem ? 'display:none;' : '' }}"
        >
            <div>
                <i class="fa fa-image fa-2x"></i>

                <p>
                    Selecciona uma fotografia
                    para visualizar o enquadramento.
                </p>
            </div>
        </div>

    </div>

    <!-- =========================================
         POSIÇÃO HORIZONTAL
    ========================================== -->

    <div class="editor-controle">

        <label>
            Posição horizontal
            <span class="valor-x">
                {{ $posicaoX }}%
            </span>
        </label>

        <input
            type="range"
            class="controle-x"
            name="{{ $prefixo }}_posicao_x"
            min="0"
            max="100"
            value="{{ $posicaoX }}"
        >

    </div>

    <!-- =========================================
         POSIÇÃO VERTICAL
    ========================================== -->

    <div class="editor-controle">

        <label>
            Posição vertical
            <span class="valor-y">
                {{ $posicaoY }}%
            </span>
        </label>

        <input
            type="range"
            class="controle-y"
            name="{{ $prefixo }}_posicao_y"
            min="0"
            max="100"
            value="{{ $posicaoY }}"
        >

    </div>

    <!-- =========================================
         ZOOM
    ========================================== -->

    <div class="editor-controle">

        <label>
            Ampliação da fotografia
            <span class="valor-zoom">
                {{ $zoom }}%
            </span>
        </label>

        <input
            type="range"
            class="controle-zoom"
            name="{{ $prefixo }}_zoom"
            min="100"
            max="200"
            step="5"
            value="{{ $zoom }}"
        >

    </div>

    <!-- =========================================
         REPOR ENQUADRAMENTO
    ========================================== -->

    <button
        type="button"
        class="editor-repor"
    >
        <i class="fa fa-undo"></i>
        Repor enquadramento
    </button>

    <!-- =========================================
         INFORMAÇÃO
    ========================================== -->

    <div class="editor-nota">

        <i class="fa fa-info-circle"></i>

        Os ajustes alteram apenas a forma como
        a fotografia é apresentada.

        O ficheiro original não é recortado
        nem modificado.

    </div>

</div>
