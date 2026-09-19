<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $liceu ?? 'Rede Eiffel' }} - Em manutenção</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fa;
            color: #333;
        }

        .manutencao {
            width: 100%;
            max-width: 650px;
            text-align: center;
            background: #fff;
            padding: 50px 35px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }

        .logo {
            max-width: 130px;
            max-height: 100px;
            margin-bottom: 25px;
        }

        .icone {
            font-size: 55px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 30px;
            margin-bottom: 15px;
            color: #333;
        }

        h2 {
            font-size: 21px;
            margin-bottom: 20px;
            color: #555;
        }

        p {
            font-size: 17px;
            line-height: 1.7;
            color: #666;
            margin-bottom: 10px;
        }

        .rodape {
            margin-top: 30px;
            font-size: 14px;
            color: #999;
        }

        @media (max-width: 576px) {
            .manutencao {
                padding: 35px 20px;
            }

            h1 {
                font-size: 25px;
            }

            h2 {
                font-size: 19px;
            }

            p {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

    <div class="manutencao">

        {{-- Logo --}}
        <img
            src="{{ asset('img/logo.jpg') }}"
            alt="Rede Eiffel"
            class="logo"
            onerror="this.style.display='none';"
        >

        <div class="icone">
            🛠️
        </div>

        <h1>Site em manutenção</h1>

        <h2>{{ $liceu ?? 'Liceu Eiffel' }}</h2>

        <p>
            Estamos a trabalhar para melhorar este espaço.
        </p>

        <p>
            O site estará disponível brevemente.
            Agradecemos a sua compreensão.
        </p>

        <div class="rodape">
            Rede Eiffel Angola
        </div>

    </div>

</body>
</html>