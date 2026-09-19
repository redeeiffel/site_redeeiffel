<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Administração - Rede Eiffel</title>

  <link rel="stylesheet" href="/assets/css/materialize.css">
  <link rel="stylesheet" href="/assets/css/estilo.css">
  <link rel="stylesheet" href="/assets/css/bootstrap-cuts.css">
  <link rel="stylesheet" href="/assets/css/style-admin.css">
  <link rel="stylesheet" href="/assets/css/style.css">

  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  <link rel="icon" href="/assets/img/logo.png" type="image/gif" sizes="16x16">
</head>

<body>

  {{-- =========================================================
      MENU PRINCIPAL
  ========================================================== --}}
  <nav class="bg-primary z-depth-0 borda-rodape-1">

    <div class="nav-wrapper container">

      {{-- LOGO --}}
      <a href="{{ route('admin.home') }}" class="brand-logo pt-4">
        <img
          src="/assets/img/logo.png"
          style="max-width: 100px; margin-top: 10px;"
          alt="Rede Eiffel">
      </a>

      {{-- BOTÃO MENU MOBILE --}}
      <a href="#"
         data-target="mobile-demo"
         class="sidenav-trigger white-text">
        <i class="fa fa-bars"></i>
      </a>

      {{-- MENU DESKTOP --}}
      <ul class="right hide-on-med-and-down">

        <li>
          <a class="color-text-1" href="{{ route('admin.home') }}">
            <span class="fa fa-home"></span>
            Início
          </a>
        </li>

        <li>
          <a class="color-text-1" href="{{ route('admin.ver_slider') }}">
            <span class="fa fa-newspaper"></span>
            Gerir Slides
          </a>
        </li>

        <li>
          <a class="color-text-1" href="{{ route('admin.ver_galeria') }}">
            <span class="fa fa-newspaper"></span>
            Gerir Galeria
          </a>
        </li>

        <li>
          <a class="color-text-1" href="{{ route('admin.ver_publicacao') }}">
            <span class="fa fa-newspaper"></span>
            Gerir Blog
          </a>
        </li>

        <li>
          <a class="color-text-1" href="{{ route('admin.ver_comentario') }}">
            <span class="fa fa-newspaper"></span>
            Gerir comentários
          </a>
        </li>

        <li>
          <a class="color-text-1" href="{{ route('admin.ver_new') }}">
            <span class="fa fa-image"></span>
            Inscritos
          </a>
        </li>

        <li>
          <a class="color-text-1" href="{{ route('admin.ver_mensagem') }}">
            <span class="fa fa-comments"></span>
            Mensagens
          </a>
        </li>

        <li>
          <a class="btn borda-1 red darken-2 white-text"
             href="/actions/logout.html">
            <span class="fa fa-sign-out"></span>
            Terminar sessão
          </a>
        </li>

      </ul>

    </div>
  </nav>


  {{-- =========================================================
      MENU MOBILE
  ========================================================== --}}
  <ul class="sidenav" id="mobile-demo">

    <li>
      <a class="color-text-1" href="{{ route('admin.home') }}">
        <span class="fa fa-home"></span>
        Início
      </a>
    </li>

    <li>
      <a class="color-text-1" href="{{ route('admin.ver_slider') }}">
        <span class="fa fa-newspaper"></span>
        Gerir Slides
      </a>
    </li>

    <li>
      <a class="color-text-1" href="{{ route('admin.ver_galeria') }}">
        <span class="fa fa-newspaper"></span>
        Gerir Galeria
      </a>
    </li>

    <li>
      <a class="color-text-1" href="{{ route('admin.ver_publicacao') }}">
        <span class="fa fa-newspaper"></span>
        Gerir Blog
      </a>
    </li>

    <li>
      <a class="color-text-1" href="{{ route('admin.ver_comentario') }}">
        <span class="fa fa-newspaper"></span>
        Gerir comentários
      </a>
    </li>

    <li>
      <a class="color-text-1" href="{{ route('admin.ver_new') }}">
        <span class="fa fa-image"></span>
        Inscritos
      </a>
    </li>

    <li>
      <a class="color-text-1" href="{{ route('admin.ver_mensagem') }}">
        <span class="fa fa-comments"></span>
        Mensagens
      </a>
    </li>

    <li>
      <a class="btn borda-1 red darken-2 white-text"
         href="/actions/logout.html">
        <span class="fa fa-sign-out"></span>
        Terminar sessão
      </a>
    </li>

  </ul>


  {{-- =========================================================
      CONTEÚDO DAS PÁGINAS ADMINISTRATIVAS
  ========================================================== --}}
  <section class="container vh100">

    @yield('content')

  </section>


  {{-- =========================================================
      RODAPÉ
  ========================================================== --}}
  <footer class="page-footer bg-primary">

    <div class="footer-copyright espaco-p-0">

      <div class="container center">

        Rede Eiffel &copy;

        <script>
          document.write(new Date().getFullYear());
        </script>

      </div>

    </div>

  </footer>


  {{-- =========================================================
      JAVASCRIPT
  ========================================================== --}}
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

  <script src="/assets/materialize.js"></script>

  <script>
    $(document).ready(function () {
      $('.sidenav').sidenav();
    });
  </script>

</body>

</html>