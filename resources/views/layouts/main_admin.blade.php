
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

  <style>
    /* MENU ADMINISTRATIVO RESPONSIVO */

    .admin-navbar {
      min-height: 75px;
      height: auto;
    }

    .admin-navbar .nav-wrapper {
      min-height: 75px;
      height: auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 15px;
    }

    .admin-navbar .brand-logo {
      position: static;
      transform: none;
      flex-shrink: 0;
      padding: 0 !important;
      display: flex;
      align-items: center;
    }

    .admin-navbar .brand-logo img {
      max-width: 85px !important;
      max-height: 60px;
      width: auto;
      height: auto;
      margin: 0 !important;
      object-fit: contain;
    }

    .admin-navbar .admin-desktop-menu {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      flex-wrap: wrap;
      gap: 2px;
      margin: 0;
    }

    .admin-navbar .admin-desktop-menu > li {
      float: none;
    }

    .admin-navbar .admin-desktop-menu > li > a {
      font-size: 12px;
      padding: 0 9px;
      white-space: nowrap;
    }

    .admin-navbar .admin-desktop-menu > li > a i,
    .admin-navbar .admin-desktop-menu > li > a span {
      margin-right: 4px;
    }

    .admin-navbar .admin-menu-trigger {
      display: none;
      position: static;
      margin: 0;
      width: 45px;
      height: 45px;
      line-height: 45px;
      text-align: center;
      color: white;
      cursor: pointer;
      border-radius: 8px;
      flex-shrink: 0;
    }

    .admin-navbar .admin-menu-trigger:hover {
      background: rgba(255,255,255,.15);
    }

    .admin-navbar .admin-menu-trigger i {
      font-size: 23px;
      line-height: 45px;
    }

    /* MENU LATERAL MOBILE */

    #mobile-demo.admin-sidenav {
      width: min(320px, 88vw);
      background: #fff;
      overflow-y: auto;
    }

    #mobile-demo .admin-mobile-header {
      background: linear-gradient(135deg, #103c73, #1769b3);
      padding: 25px 20px;
      min-height: 145px;
      display: flex;
      align-items: center;
      gap: 15px;
    }

    #mobile-demo .admin-mobile-header img {
      width: 65px;
      height: auto;
      object-fit: contain;
    }

    #mobile-demo .admin-mobile-header strong {
      display: block;
      color: white;
      font-size: 17px;
      line-height: 1.5;
    }

    #mobile-demo .admin-mobile-header small {
      color: #dceaff;
      font-size: 12px;
    }

    #mobile-demo .admin-menu-label {
      padding: 18px 25px 8px;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 1px;
      color: #8393a7;
      text-transform: uppercase;
    }

    #mobile-demo li > a {
      display: flex;
      align-items: center;
      gap: 12px;
      height: auto;
      min-height: 48px;
      padding: 12px 24px;
      line-height: 1.5;
      font-size: 14px;
      color: #24415f;
      font-weight: 500;
    }

    #mobile-demo li > a i {
      width: 20px;
      font-size: 17px;
      text-align: center;
      color: #1769b3;
      flex-shrink: 0;
    }

    #mobile-demo li > a:hover {
      background: #edf5ff;
    }

    #mobile-demo li > a.admin-active {
      background: #e7f1ff;
      color: #104d88;
      font-weight: 700;
      border-left: 4px solid #1769b3;
      padding-left: 20px;
    }

    #mobile-demo .admin-logout {
      margin: 12px 20px 25px;
    }

    #mobile-demo .admin-logout button {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      width: 100%;
      padding: 13px;
      border: 0;
      border-radius: 8px;
      background: #c62828;
      color: white;
      cursor: pointer;
      font-size: 14px;
      font-weight: 700;
    }

    #mobile-demo .admin-logout button i {
      color: white;
    }

    .admin-main-content {
      min-height: 65vh;
      padding-top: 25px;
      padding-bottom: 40px;
    }

    /* O menu hambúrguer aparece quando o menu completo
       já não cabe confortavelmente no ecrã. */

    @media (max-width: 1100px) {
      .admin-navbar .admin-desktop-menu {
        display: none !important;
      }

      .admin-navbar .admin-menu-trigger {
        display: block !important;
      }

      .admin-navbar .nav-wrapper {
        flex-direction: row;
      }
    }

    @media (max-width: 600px) {
      .admin-navbar,
      .admin-navbar .nav-wrapper {
        min-height: 68px;
      }

      .admin-navbar .brand-logo img {
        max-width: 70px !important;
        max-height: 52px;
      }

      .admin-main-content {
        padding-top: 15px;
      }
    }
      /* MENU ADMINISTRATIVO INDEPENDENTE */
    #mobile-demo.admin-sidenav {
        position: fixed;
        top: 0;
        left: 0;
        width: min(320px, 88vw);
        height: 100vh;
        z-index: 10002;
        display: block;
        visibility: hidden;
        transform: translateX(-105%);
        transition: transform .25s ease, visibility .25s;
        overflow-y: auto;
    }

    #mobile-demo.admin-sidenav.admin-open {
        visibility: visible;
        transform: translateX(0);
    }

    .admin-menu-overlay {
        position: fixed;
        inset: 0;
        z-index: 10001;
        background: rgba(0,0,0,.55);
        display: none;
    }

    .admin-menu-overlay.admin-open {
        display: block;
    }

    body.admin-menu-open {
        overflow: hidden;
    }
  </style>
</head>

<body>

  {{-- MENU PRINCIPAL --}}

  <nav class="bg-primary z-depth-0 borda-rodape-1 admin-navbar">

    <div class="nav-wrapper container">

      {{-- LOGÓTIPO --}}

      <a href="{{ route('admin.home') }}" class="brand-logo">
        <img
          src="/assets/img/logo.png"
          alt="Rede Eiffel">
      </a>

      {{-- BOTÃO HAMBÚRGUER --}}

      <a href="#"
         data-target="mobile-demo"
         class="sidenav-trigger admin-menu-trigger"
         aria-label="Abrir menu administrativo"
         aria-controls="mobile-demo"
         aria-expanded="false">

        <i class="fa fa-bars"></i>

      </a>

      {{-- MENU DESKTOP --}}

      <ul class="admin-desktop-menu">

        <li>
          <a class="color-text-1" href="{{ route('admin.home') }}">
            <span class="fa fa-home"></span>
            Início
          </a>
        </li>

        <li>
          <a class="color-text-1" href="{{ route('admin.ver_slider') }}">
            <span class="fa fa-images"></span>
            Gerir Slides
          </a>
        </li>

        <li>
          <a class="color-text-1"
             href="{{ route('admin.gestao_equipe.index') }}">
            <span class="fa fa-users"></span>
            Gerir Liceus e Equipa
          </a>
        </li>

        <li>
          <a class="color-text-1" href="{{ route('admin.ver_galeria') }}">
            <span class="fa fa-image"></span>
            Gerir Galeria
          </a>
        </li>

        <li>
          <a class="color-text-1" href="{{ route('admin.ver_publicacao') }}">
            <span class="fa fa-newspaper"></span>
            Gerir Blog
          </a>
        </li>

        {{-- NOVO MÓDULO --}}

        <li>
          <a class="color-text-1"
             href="{{ route('admin.documentos.index') }}">
            <span class="fa fa-file-pdf"></span>
            Documentos
          </a>
        </li>

        <li>
          <a class="color-text-1" href="{{ route('admin.ver_comentario') }}">
            <span class="fa fa-comments"></span>
            Comentários
          </a>
        </li>

        <li>
          <a class="color-text-1" href="{{ route('admin.ver_new') }}">
            <span class="fa fa-envelope-open-text"></span>
            Inscritos
          </a>
        </li>

        <li>
          <a class="color-text-1" href="{{ route('admin.ver_mensagem') }}">
            <span class="fa fa-envelope"></span>
            Mensagens
          </a>
        </li>

        <li>
          <form action="{{ route('admin.logout') }}"
                method="POST"
                style="margin:0;">
            @csrf

            <button type="submit"
                    class="btn borda-1 red darken-2 white-text">
              <span class="fa fa-sign-out-alt"></span>
              Sair
            </button>
          </form>
        </li>

      </ul>

    </div>

  </nav>


  {{-- MENU LATERAL RESPONSIVO --}}

  <div class="admin-menu-overlay" id="admin-menu-overlay"></div>
<ul class="sidenav admin-sidenav" id="mobile-demo">

    <li>
      <div class="admin-mobile-header">

        <img src="/assets/img/logo.png" alt="Rede Eiffel">

        <div>
          <strong>Rede Eiffel</strong>
          <small>Painel de Administração</small>
        </div>

      </div>
    </li>

    <li class="admin-menu-label">
      Menu Principal
    </li>

    <li>
      <a href="{{ route('admin.home') }}"
         class="{{ request()->routeIs('admin.home') ? 'admin-active' : '' }}">
        <i class="fa fa-home"></i>
        Início
      </a>
    </li>

    <li>
      <a href="{{ route('admin.ver_slider') }}"
         class="{{ request()->routeIs('admin.ver_slider') ? 'admin-active' : '' }}">
        <i class="fa fa-images"></i>
        Gerir Slides
      </a>
    </li>

    <li>
      <a href="{{ route('admin.gestao_equipe.index') }}"
         class="{{ request()->routeIs('admin.gestao_equipe.*') ? 'admin-active' : '' }}">
        <i class="fa fa-users"></i>
        Gerir Liceus e Equipa
      </a>
    </li>

    <li>
      <a href="{{ route('admin.ver_galeria') }}"
         class="{{ request()->routeIs('admin.ver_galeria') ? 'admin-active' : '' }}">
        <i class="fa fa-image"></i>
        Gerir Galeria
      </a>
    </li>

    <li>
      <a href="{{ route('admin.ver_publicacao') }}"
         class="{{ request()->routeIs('admin.ver_publicacao') ? 'admin-active' : '' }}">
        <i class="fa fa-newspaper"></i>
        Gerir Blog
      </a>
    </li>

    {{-- NOVO MÓDULO DE DOCUMENTOS --}}

    <li>
      <a href="{{ route('admin.documentos.index') }}"
         class="{{ request()->routeIs('admin.documentos.*') ? 'admin-active' : '' }}">
        <i class="fa fa-file-pdf"></i>
        Gestão de Documentos
      </a>
    </li>

    <li>
      <a href="{{ route('admin.ver_comentario') }}"
         class="{{ request()->routeIs('admin.ver_comentario') ? 'admin-active' : '' }}">
        <i class="fa fa-comments"></i>
        Gerir Comentários
      </a>
    </li>

    <li>
      <a href="{{ route('admin.ver_new') }}"
         class="{{ request()->routeIs('admin.ver_new') ? 'admin-active' : '' }}">
        <i class="fa fa-envelope-open-text"></i>
        Inscritos
      </a>
    </li>

    <li>
      <a href="{{ route('admin.ver_mensagem') }}"
         class="{{ request()->routeIs('admin.ver_mensagem') ? 'admin-active' : '' }}">
        <i class="fa fa-envelope"></i>
        Mensagens
      </a>
    </li>

    <li>
      <div class="divider"></div>
    </li>

    <li>
      <form class="admin-logout"
            action="{{ route('admin.logout') }}"
            method="POST">
        @csrf

        <button type="submit">
          <i class="fa fa-sign-out-alt"></i>
          Terminar sessão
        </button>
      </form>
    </li>

  </ul>


  {{-- CONTEÚDO ADMINISTRATIVO --}}

  <section class="container admin-main-content">

    @yield('content')

  </section>


  {{-- RODAPÉ --}}

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


  {{-- JAVASCRIPT --}}

  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="/assets/materialize.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
      const menu = document.getElementById('mobile-demo');
      const overlay = document.getElementById('admin-menu-overlay');
      const trigger = document.querySelector('.admin-menu-trigger');

      if (!menu || !overlay || !trigger) return;

      function closeMenu() {
        menu.classList.remove('admin-open');
        overlay.classList.remove('admin-open');
        document.body.classList.remove('admin-menu-open');
        trigger.setAttribute('aria-expanded', 'false');
      }

      trigger.addEventListener('click', function (event) {
        event.preventDefault();
        menu.classList.add('admin-open');
        overlay.classList.add('admin-open');
        document.body.classList.add('admin-menu-open');
        trigger.setAttribute('aria-expanded', 'true');
      });

      overlay.addEventListener('click', closeMenu);

      document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') closeMenu();
      });

      menu.querySelectorAll('a[href]').forEach(function (link) {
        link.addEventListener('click', closeMenu);
      });
    });
  </script>

</body>
</html>
