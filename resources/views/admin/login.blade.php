<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Reservada</title>
    <link rel="stylesheet" href="/assets/css/materialize.css">
    <link rel="stylesheet" href="/assets/css/estilo.css">
    <link rel="stylesheet" href="/assets/css/all.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/total.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<body>


    <section>
        <div class="row m-0">
            <div class="col s12 m12 l8 p-0">
                <div class="bg-primary min-height-100">
                    <div class="row espaco-p-2 espaco-p-top-2">
                        <div class="col s12 m12 l6">
                            <div class="white-text Jost-Bold">
                                <span class="texto-7 negrito">Gestão do <br> Website</span>
                                <br> <span class="texto-2">Rede Eiffel</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l4">
                <div class="row espaco-p-2 espaco-p-top-4">
                    <div class="col s12 m12 l12">

                        <form action="{{ route('admin.check') }}" method="post">

                            @csrf    
                            <div class="row">
                                <div class="col s12">
                                    <h3 class="text-primary center Jost-Bold">Login</h3>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="email" class="form-input browser-default">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12">
                                    <label for="">Palavra-passe</label>
                                    <input type="password" name="password" id="password"
                                        class="form-input browser-default">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12">
                                    <!-- <label for="" class="transparent-text">Entrar</label> -->
                                    <button type="submit" name="btn-enviar" class="bg-primary white-text btn btn-block w-100 z-depth-0 borda-1">Entrar</button> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12 center">
                                    <p><a href="" class="negrito black-text">Voltar para a página
                                            inicial</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/assets/vendor/materialize/css/materialize.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.sidenav').sidenav();
        });
    </script>
</body>

</html>