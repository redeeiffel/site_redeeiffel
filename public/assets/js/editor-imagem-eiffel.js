
(function () {
    'use strict';

    function iniciarEditor(editor) {
        if (editor.dataset.inicializado === '1') {
            return;
        }

        editor.dataset.inicializado = '1';

        const imagem = editor.querySelector('.editor-imagem-preview');
        const mensagem = editor.querySelector('.sem-imagem');

        const controleX = editor.querySelector('.controle-x');
        const controleY = editor.querySelector('.controle-y');
        const controleZoom = editor.querySelector('.controle-zoom');

        const valorX = editor.querySelector('.valor-x');
        const valorY = editor.querySelector('.valor-y');
        const valorZoom = editor.querySelector('.valor-zoom');

        const botaoRepor = editor.querySelector('.editor-repor');

        const formulario = editor.closest('form');

        let urlTemporaria = null;

        /*
        |--------------------------------------------------------------------------
        | Atualizar o enquadramento da fotografia
        |--------------------------------------------------------------------------
        */
        function atualizarPreview() {
            const x = Number(controleX.value);
            const y = Number(controleY.value);
            const zoom = Number(controleZoom.value);

            valorX.textContent = x + '%';
            valorY.textContent = y + '%';
            valorZoom.textContent = zoom + '%';

            imagem.style.objectPosition = x + '% ' + y + '%';
            imagem.style.transform = 'scale(' + (zoom / 100) + ')';
            imagem.style.transformOrigin = x + '% ' + y + '%';
        }

        /*
        |--------------------------------------------------------------------------
        | Mostrar a fotografia seleccionada
        |--------------------------------------------------------------------------
        */
        function mostrarImagem(arquivo) {
            if (!arquivo || !arquivo.type.startsWith('image/')) {
                return;
            }

            if (urlTemporaria) {
                URL.revokeObjectURL(urlTemporaria);
            }

            urlTemporaria = URL.createObjectURL(arquivo);

            imagem.src = urlTemporaria;
            imagem.style.display = 'block';
            mensagem.style.display = 'none';

            controleX.value = 50;
            controleY.value = 15;
            controleZoom.value = 100;

            atualizarPreview();
        }

        /*
        |--------------------------------------------------------------------------
        | Identificar o campo de fotografia correspondente
        |--------------------------------------------------------------------------
        |
        | Gestão de Equipa:
        | fotografia
        |
        | Publicações:
        | imagem_externa
        | imagem_interna
        | imagem_interna_tercearia
        |
        */
        if (formulario) {
            const nomeCampo = editor.dataset.campo;

            const inputArquivo = Array.from(
                formulario.querySelectorAll('input[type="file"]')
            ).find(function (input) {
                return input.name === nomeCampo;
            });

            if (inputArquivo) {
                inputArquivo.addEventListener('change', function () {
                    if (this.files && this.files[0]) {
                        mostrarImagem(this.files[0]);
                    }
                });
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Controlos de posição e zoom
        |--------------------------------------------------------------------------
        */
        [controleX, controleY, controleZoom].forEach(function (controle) {
            controle.addEventListener('input', atualizarPreview);
        });

        /*
        |--------------------------------------------------------------------------
        | Repor enquadramento original
        |--------------------------------------------------------------------------
        */
        botaoRepor.addEventListener('click', function () {
            controleX.value = 50;
            controleY.value = 15;
            controleZoom.value = 100;

            atualizarPreview();
        });

        /*
        |--------------------------------------------------------------------------
        | Libertar memória utilizada pela pré-visualização
        |--------------------------------------------------------------------------
        */
        window.addEventListener('beforeunload', function () {
            if (urlTemporaria) {
                URL.revokeObjectURL(urlTemporaria);
            }
        });

        /*
        |--------------------------------------------------------------------------
        | Aplicar enquadramento inicial
        |--------------------------------------------------------------------------
        */
        atualizarPreview();
    }

    /*
    |--------------------------------------------------------------------------
    | Inicializar todos os editores existentes na página
    |--------------------------------------------------------------------------
    */
    function iniciarTodos() {
        document.querySelectorAll('.editor-imagem-eiffel')
            .forEach(iniciarEditor);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', iniciarTodos);
    } else {
        iniciarTodos();
    }
})();
