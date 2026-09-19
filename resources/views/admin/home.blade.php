@extends('layouts.main_admin')

@section('content')


<div class="row">
    <div class="col s12">
        <ul>
            <li>/Início</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <h5 class="Jost-Bold grey-text text-darken-2">
            <span class="fa fa-home"></span> Página inicial
        </h5>

        <div class="borda-titulo-3"></div>
    </div>
</div>

<div class="row espaco-m-top-1">

    {{-- MENSAGENS --}}
    <div class="col s12 m12 l4 my-2">
        <div class="new-card-admin">

            <div class="new-card-header-light">
                <h6>Mensagens</h6>
            </div>

            <div class="new-card-content">
                <div class="espaco-p-1">
                    <h4 class="negrito">
                        {{ $mensagens }}
                    </h4>
                </div>
            </div>

        </div>
    </div>


    {{-- NOTÍCIAS --}}
    <div class="col s12 m12 l4 my-2">
        <div class="new-card-admin">

            <div class="new-card-header-light">
                <h6>Notícias</h6>
            </div>

            <div class="new-card-content">
                <div class="espaco-p-1">
                    <h4 class="negrito">
                        {{ $noticias }}
                    </h4>
                </div>
            </div>

        </div>
    </div>


    {{-- UTILIZADORES --}}
    <div class="col s12 m12 l4 my-2">
        <div class="new-card-admin">

            <div class="new-card-header-light">
                <h6>Utilizadores</h6>
            </div>

            <div class="new-card-content">
                <div class="espaco-p-1">
                    <h4 class="negrito">
                        {{ $utilizadores }}
                    </h4>
                </div>
            </div>

        </div>
    </div>

</div>


@endsection
