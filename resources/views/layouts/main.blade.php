<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="utf-8" />
  <title>Rede Eiffel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Website da Rede Eiffel">
  <meta name="keywords"
    content="escola, colégio, educação, formação, rede eiffel, rede, eiffel, liceus, inscrições, matrícula">
  <meta name="robots" content="index, follow">
  <meta name="author" content="Anilésio Xavier">
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.jpeg') }}" />
  <link rel="stylesheet" href="/assets/css/mais.css">
  <link rel="stylesheet" href="/assets/css/materialize.css">
  <link rel="stylesheet" href="/assets/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/animate.css">
  <link rel="stylesheet" href="/assets/css/back-top-top.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/assets/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="/assets/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/rodape-eiffel.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/noticias-eiffel.css') }}?v=4">
    <link rel="stylesheet" href="{{ asset('assets/css/eiffel-modern.css') }}?v=1">
</head>
<style>
  .dropdown-content {
    min-width: 250px;
  }

  .dropdown-content li a {
    font-size: 10pt;
  }

  nav li a {
    font-size: 11pt;
  }

  nav a:focus {
    outline: none;
  }

  p{
    text-align: justify;
  }


  @media only screen and (min-width: 300px) and (max-width: 700px) {

   .slider .Roboto-Black{
    font-size: 20px;
    margin-left: -50px;
    margin-top: 100px;
   }

   .slider .font_logo{
    font-size: 20px;
    margin-left: -50px;
    margin-top: -20px;
    }

    .slider .btn{
    margin-left:-50px;
    height: 50px;
    margin-top: 10px;
}

.slider .indicators .indicator-item {
  display: inline-block;
  position: relative;
  cursor: pointer;
  height: 10px;
  width: 10px;
  top: 9rem;
  left: -32%;
  z-index: 9;
  margin: 0 12px;
  background-color: #e0e0e0;
  -webkit-transition: .3s;
  transition: .3s;
  border-radius: 10px;
}


}


@media only screen and (min-width: 701px) and (max-width: 1500px) {

   .slider .Roboto-Black{
    font-size: 20px;
    margin-left: -50px;
    margin-top: 100px;
   }

   .slider .font_logo{
    font-size: 20px;
    margin-left: -50px;
    margin-top: -20px;
    }

    .slider .btn{
    margin-left:-50px;
    height: 50px;
    margin-top: 10px;
}

.slider .indicators .indicator-item {
  display: inline-block;
  position: relative;
  cursor: pointer;
  height: 15px;
  width: 15px;
  top: 9rem;
  left: -32%;
  z-index: 9;
  margin: 0 12px;
  background-color: #e0e0e0;
  -webkit-transition: .3s;
  transition: .3s;
  border-radius: 10px;
}


}


@media only screen and (min-width: 1000px) and (max-width: 1500px) {


#logo_tipo_topo{
   display: none;
}

nav li a {
    font-size: 9px;

  }

}

</style>

<body class="eiffel-public">


@if (Session::get('success'))<!-- /.card-header -->
<div class="card-body">

  <div class="alert alert-success alert-dismissible">
    <h5> Sucesso!</h5>
    {{ Session::get('success') }}
  </div>
</div>
<!-- /.card-body -->

@endif
@if (Session::get('fail'))
<!-- /.card-header -->
<div class="card-body">
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5>Falha!</h5>
      {{ Session::get('fail') }}
    </div>

  </div>
  <!-- /.card-body -->

@endif


  {{-- Calendários dinâmicos: usar PDFs activos do painel; manter os originais como alternativa. --}}
  @php
    $calendariosPublicos = \App\Models\Documento::query()
        ->where('ativo', true)
        ->whereIn('tipo_calendario', ['coordenacao', 'nacional'])
        ->get(['tipo_calendario', 'ficheiro'])
        ->keyBy('tipo_calendario');

    $calendarioCoordenacao = $calendariosPublicos->get('coordenacao');
    $calendarioNacional = $calendariosPublicos->get('nacional');

    $urlCalendarioCoordenacao = $calendarioCoordenacao
        && \Illuminate\Support\Facades\Storage::disk('public')->exists($calendarioCoordenacao->ficheiro)
        ? route('documentos.calendario', ['tipo' => 'coordenacao'])
        : asset('assets/c.pdf');

    $urlCalendarioNacional = $calendarioNacional
        && \Illuminate\Support\Facades\Storage::disk('public')->exists($calendarioNacional->ficheiro)
        ? route('documentos.calendario', ['tipo' => 'nacional'])
        : asset('assets/calendario_2026.pdf');
  @endphp

  <ul id="dropdownRedeEiffel" class="dropdown-content">
    <li><a href="{{ route('sobre') }}">Sobre nós</a></li>
    <li><a href="{{ route('apresentacao_liceu') }}">Apresentação dos Liceus</a></li>
    <li><a href="{{ route('acerca') }}">Acerca da Rede Eiffel</a></li>
    <li><a href="{{ route('organograma') }}">Organograma Geral</a></li>
    <li><a href="{{ $urlCalendarioCoordenacao }}" target="_blank">Calendário Escolar Nacional da Coordenação</a></li>
    <li><a href="{{ $urlCalendarioNacional }}" target="_blank">Calendário Escolar Nacional</a></li>
    <li><a href="{{ route('documentos.index') }}">Documentos e Publicações em PDF</a></li>
    <li class="divider"></li>
    <li><a href="{{ route('nossos_parceiros') }}">Parceiros</a></li>
  </ul>

  <ul id="dropdownMideas" class="dropdown-content">
    <li><a href="{{ route('eventos') }}">Eventos</a></li>
    <li><a href="{{ route('comentarios') }}">Comentários</a></li>
    <li><a href="{{ route('equipe') }}">Equipe de Coordenação</a></li>
    <li><a href="{{ route('galerias') }}">Galeria</a></li>
  </ul>


  <ul id="dropdownProjectos" class="dropdown-content">
    <li><a href="{{ route('projecto_educacional') }}">Projectos Educativos</a></li>
    <li><a href="{{ route('projecto_desenvolvidos') }}">Projectos Desenvolvidos</a></li>
    <li><a href="{{ route('projecto_formacao_docente') }}">Formação dos Docentes</a></li>
  </ul>

  <ul id="dropdownInformacaoGeral" class="dropdown-content">
    <li><a href="{{ route('organizacao_educaional') }}">Orientação Educacional</a></li>
    <li><a href="{{ route('organizacao_classes') }}">Orientação das Classes</a></li>
    <li><a href="{{ route('organizacao_alunos') }}">Orientação dos alunos</a></li>
    <li><a href="{{ route('praticas_laboratorias') }}">Práticas Laboratoriais</a></li>
    <li><a href="{{ route('sucessos_estudantis') }}">Sucesso Estudantil</a></li>
  </ul>


<ul id="dropdownLiceus" class="dropdown-content">

    <li>
        <a href="{{ asset('assets/novo_mapa.jpg') }}" target="_blank">
            <span class="fa fa-map-marker-alt"></span>
            Localizar Liceus
        </a>
    </li>

    <li class="divider"></li>

    <li>
        <a href="{{ route('manutencao', ['liceu' => 'Dande']) }}">
            Liceu N.º 4002 BGO Eiffel do Dande
        </a>
    </li>

    <li>
        <a href="{{ route('manutencao', ['liceu' => 'Malanje']) }}">
            Liceu N.º 309 MJE Eiffel Malanje
        </a>
    </li>

    <li>
        <a href="{{ route('manutencao', ['liceu' => 'Cazengo']) }}">
            Liceu N.º 1029 CNO Eiffel do Cazengo
        </a>
    </li>

    <li>
        <a href="{{ route('manutencao', ['liceu' => 'Ondjiva']) }}">
            Liceu N.º 080 CNE Eiffel Ondjiva
        </a>
    </li>

    <li>
        <a href="{{ route('manutencao', ['liceu' => 'Huambo']) }}">
            Liceu N.º 2192 HBO Eiffel do Huambo
        </a>
    </li>

    <li>
        <a href="{{ route('manutencao', ['liceu' => 'Luena']) }}">
            Liceu N.º 887 MCO Eiffel Luena
        </a>
    </li>

</ul>



  <ul id="dropdownRedeEiffelWeb" class="dropdown-content">
  <li><a href="{{ route('sobre') }}">Sobre nós</a></li>
    <li><a href="{{ route('apresentacao_liceu') }}">Apresentação dos Liceus</a></li>
    <li><a href="{{ route('acerca') }}">Acerca da Rede Eiffel</a></li>

    <li><a href="{{ route('organograma') }}">Organograma Geral</a></li>
    <li><a href="{{ $urlCalendarioCoordenacao }}" target="_blank">Calendário Escolar Nacional da Coordenação</a></li>
      <li><a href="{{ $urlCalendarioNacional }}" target="_blank">Calendário Escolar Nacional</a></li>
    <li><a href="{{ route('documentos.index') }}">Documentos e Publicações em PDF</a></li>
    <li class="divider"></li>
    <li><a href="{{ route('nossos_parceiros') }}">Parceiros</a></li>
</ul>

  <ul id="dropdownMideasWeb" class="dropdown-content">
  <li><a href="{{ route('eventos') }}">Eventos</a></li>
    <li><a href="{{ route('comentarios') }}">Comentários</a></li>
    <li><a href="{{ route('equipe') }}">Equipe de Coordenação</a></li>
    <li><a href="{{ route('galerias') }}">Galeria</a></li>
  </ul>

  <ul id="dropdownProjectosWeb" class="dropdown-content">
  <li><a href="{{route('projecto_educacional') }}">Projectos Educativos</a></li>
    <li><a href="{{ route('projecto_desenvolvidos') }}">Projectos Desenvolvidos</a></li>
    <li><a href="{{ route('projecto_formacao_docente') }}">Formação dos Docentes</a></li>
   </ul>

  <ul id="dropdownInformacaoGeralWeb" class="dropdown-content">
  <li><a href="{{ route('organizacao_educaional') }}">Orientação Educacional</a></li>
    <li><a href="{{ route('organizacao_classes') }}">Orientação das Classes</a></li>
    <li><a href="{{ route('organizacao_alunos') }}">Orientação dos alunos</a></li>
    <li><a href="{{ route('praticas_laboratorias') }}">Práticas Laboratoriais</a></li>
    <li><a href="{{ route('sucessos_estudantis') }}">Sucesso Estudantil</a></li>
 </ul>


<ul id="dropdownLiceusWeb" class="dropdown-content">

    <li>
        <a href="{{ asset('assets/novo_mapa.jpg') }}" target="_blank">
            <span class="fa fa-map-marker-alt"></span>
            Localizar Liceus
        </a>
    </li>

    <li class="divider"></li>

    <li>
        <a href="{{ route('manutencao', ['liceu' => 'Dande']) }}">
            Liceu N.º 4002 BGO Eiffel do Dande
        </a>
    </li>

    <li>
        <a href="{{ route('manutencao', ['liceu' => 'Malanje']) }}">
            Liceu N.º 309 MJE Eiffel Malanje
        </a>
    </li>

    <li>
        <a href="{{ route('manutencao', ['liceu' => 'Cazengo']) }}">
            Liceu N.º 1029 CNO Eiffel do Cazengo
        </a>
    </li>

    <li>
        <a href="{{ route('manutencao', ['liceu' => 'Ondjiva']) }}">
            Liceu N.º 080 CNE Eiffel Ondjiva
        </a>
    </li>

    <li>
        <a href="{{ route('manutencao', ['liceu' => 'Huambo']) }}">
            Liceu N.º 2192 HBO Eiffel do Huambo
        </a>
    </li>

    <li>
        <a href="{{ route('manutencao', ['liceu' => 'Luena']) }}">
            Liceu N.º 887 MCO Eiffel Luena
        </a>
    </li>

</ul>


  <ul id="dropdownGaleriaWeb" class="dropdown-content">
  <li><a href="{{ route('galerias') }}">Galeria de fotos</a></li>
    <li><a href="{{ route('sucessos_estudantis') }}">Sucessos Estudantis</a></li>
  </ul>

  <div class="div_top">
    <div class="container">
      <div class="row m-0">
        <div class="col s12 m7 l7">
          <div class="row texto-000">
            <div class="col s6 m6 l3 mt-3">
              <span class="p-2 bg-primary accent-3 w-100 borda-1 left">
                <span class="white-text fa fa-phone-square"></span>
                <a href="tel:+244227210460" class="white-text" style="display:inline-block;max-width:100%;white-space:normal;overflow-wrap:break-word;line-height:1.4;">Coordenação: (+244) 227 210 460</a>
              </span>
            </div>

            <div class="col s6 m6 l3 mt-3">
              <span class="p-2 bg-primary borda-1 w-100 left">
                <span class="white-text fa fa-clock"></span>
                <span class="white-text"> Seg - Sex 07h:00 16h:00</span>
              </span>
            </div>

            <div class="col s6 m6 l3 mt-3">
              <span class="p-2 bg-primary borda-1 w-100 left">
                <span class="white-text fa fa-envelope"></span>
                <span class="white-text"> suporteeiffel@redeeiffel.ao</span>
              </span>
            </div>
          </div>
        </div>

        <div class="col s12 l2 offset-l3 mt-2 hide-on-med-and-down">
          <div class="right">
            <a href="https://www.facebook.com/profile.html?id=100082984706560&_rdc=2&_rdr" target="_blank"
              class="btn btn-small borda-1 mx-1 z-depth-0 bg-primary"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/?fbclid=IwAR1w6vE_uweEbBlaybvkl6bwMMuw5jg-i-oUtFt_D5W-T8bmFL-XZXE7hHI"
              target="_blank" class="btn btn-small borda-1 mx-1 z-depth-0 red accent-3"><i
                class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="">
    <nav class="fundo-nav" id="navbar">
      <div class="nav-wrapper container">
        <a href="{{ route('welcome') }}" class="brand-logo mt-1"><img src="{{ asset('assets/img/logo.jpeg') }}" alt=""
            style="object-fit: cover; max-width: 100px;" class="" id="logo_tipo_topo"> </a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger white-text"><i class=" fa fa-bars"></i></a>
        <ul class="Roboto-Bold right hide-on-med-and-down texto-uppercase">
          <li><a href="{{ route('welcome') }}" class="white-text">Início</a></li>
          <li><a href="{{ route('noticias') }}" class="white-text">Notícias</a></li>
          <li><a href="#" data-target="dropdownRedeEiffelWeb" class="white-text dropdown-trigger"><span
                class="fa fa-chevron-down"></span> Rede Eiffel</a></li>
          <li><a href="#" data-target="dropdownMideasWeb" class="dropdown-trigger white-text"><span
                class="fa fa-chevron-down"></span> Mídeas</a></li>
          <li><a href="#" data-target="dropdownInformacaoGeralWeb" class="dropdown-trigger white-text"><span
                class="fa fa-chevron-down"></span> Vida Escolar</a></li>
          <li><a href="#" data-target="dropdownProjectosWeb" class="dropdown-trigger white-text"><span
                class="fa fa-chevron-down"></span> Projectos</a></li>
          <li><a href="{{ route('inscricoes') }}" class="white-text">Inscrições</a></li>

          <!-- <li><a href="galeria.html" class="white-text">Galeria </a></li> -->
          <li><a href="#" data-target="dropdownLiceusWeb" class="dropdown-trigger white-text"><span
                class="fa fa-chevron-down"></span> Liceus</a></li>
          <li><a href="{{ route('fale_conosco') }}" class="white-text">Contacte-nos</a></li>
          <li><a href="https://plataforma.redeeiffel.ao/" class="btn borda-1 text-primary white z-depth-0"><span
                class="fa fa-lock"></span> Área reservada </a> </li>
        </ul>
      </div>
    </nav>
  </div>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="{{ route('welcome') }}" class="text-primary">Início</a></li>
    <li><a href="{{ route('noticias') }}" class="text-primary">Notícias</a></li>
    <li><a href="sobre.html" data-target="dropdownRedeEiffel" class="text-primary dropdown-trigger"><span
          class="fa fa-chevron-down"></span> Rede Eiffel </a></li>
    <li><a href="#" data-target="dropdownMideas" class="dropdown-trigger"><span class="fa fa-chevron-down"></span>
        Mídeas</a></li>
    <li><a href="#" data-target="dropdownInformacaoGeral" class="dropdown-trigger"><span
          class="fa fa-chevron-down"></span> Vida Escolar</a></li>
    <li><a href="#" data-target="dropdownProjectos" class="dropdown-trigger text-primary"><span
          class="fa fa-chevron-down"></span> Projectos</a></li>
    <li><a href="{{ route('inscricoes') }}" class="text-primary">Inscrições</a></li>
    <!-- <li><a href="galeria.html" class="text-primary">Galeria </a></li> -->
    <li><a href="#" data-target="dropdownLiceus" class="dropdown-trigger text-primary"><span
          class="fa fa-chevron-down"></span> Liceus</a></li>
    <li><a href="{{ route('fale_conosco') }}" class="text-primary">Contacte-nos</a></li>
    <li><a href="https://plataforma.redeeiffel.ao/" class="btn borda-1 white-text bg-primary z-depth-0"><span class="fa fa-lock"></span> Área
        reservada </a> </li>
  </ul>

  <style>
    .boxCategoria {
      background-color: #fff;
      margin-bottom: 25px;
      width: 100%;
      height: 200px;
      /* Center vertically and horizontally */
      display: flex;
      justify-content: center;
      align-items: center;
    }

    a.boxCategoria:hover {
      transform: scale(0.9);
      transition: 0.2s ease-in-out;
    }

    .child {
      width: 150px;
      object-fit: cover;
      height: auto;
      /* background-color: red; */
      vertical-align: middle;
    }
  </style>

  <link rel="stylesheet" href="/assets/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="/assets/owlcarousel/assets/owl.theme.default.min.css">

  <section class="main">

  @yield('content')

  </section>


  <script src="/assets/owlcarousel/owl.carousel.min.js"></script>
  <x-rodape-eiffel />


  <a href="#" class="back-to-top"><span class="fa fa-chevron-up"></span></a>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/assets/js/materialize.js"></script>
<script src="/assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="/assets/OwlCarousel2/assets/vendors/highlight.js"></script>
<script src="/assets/OwlCarousel2/assets/js/app.js"></script>
<script src="/assets/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
<script src="/assets/js/back-top-top.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);

    var dropdowns = document.querySelectorAll('.dropdown-trigger');
    M.Dropdown.init(dropdowns);
  });
</script>

<script>
  AOS.init();
</script>

<script>
  var defaultOpen = document.getElementById("defaultOpen");
  if (defaultOpen) defaultOpen.click();
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.collapsible');
    if (elems.length) M.Collapsible.init(elems);
  });

  $(document).ready(function () {
    $('.collapsible').collapsible();
  });

  $(document).ready(function () {
    $(".owl-carousel").owlCarousel();
  });

  $(document).ready(function () {
    $('.carousel').carousel({
      numVisible: 6,
      indicators: true,
      duration: 500,
    });
  });

  window.onscroll = function () {
    myFunction()
  };

  var navbar = document.getElementById("navbar");
  var sticky = navbar.offsetTop;

  function myFunction() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky")
    } else {
      navbar.classList.remove("sticky");
    }
  }
</script>

  @include('components.assistente-eiffel')
</body>

</html>