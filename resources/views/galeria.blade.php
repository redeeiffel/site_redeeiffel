
<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rede Eiffel</title>
  <meta name="description" content="Galeria de fotografias e vídeos da Rede Eiffel">
  <meta name="keywords" content="Rede Eiffel, galeria, aulas, laboratórios, vídeos">

  <!-- Favicons -->
  <link href="{{ asset('galeria/assets/img/rede.png') }}" rel="icon">
  <link href="{{ asset('galeria/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('galeria/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('galeria/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('galeria/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('galeria/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('galeria/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('galeria/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('galeria/assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('galeria/assets/css/main.css') }}" rel="stylesheet">

  <!-- Apenas pequenos ajustes para os vídeos -->
  <style>
    .portfolio .video-wrapper {
      position: relative;
      width: 100%;
      aspect-ratio: 16 / 9;
      background: #071f37;
      overflow: hidden;
    }

    .portfolio .video-wrapper iframe {
      width: 100%;
      height: 100%;
      border: 0;
      display: block;
    }

    .portfolio .video-info {
      background: #fff;
      padding: 14px 16px;
      border: 1px solid #edf0f5;
      border-top: none;
    }

    .portfolio .video-info h4 {
      color: #048CCF;
      font-size: 17px;
      font-weight: 700;
      margin-bottom: 6px;
    }

    .portfolio .video-info p {
      color: #666;
      font-size: 13px;
      margin-bottom: 0;
    }

    .portfolio .video-info .video-category {
      display: inline-block;
      color: #048CCF;
      font-size: 12px;
      font-weight: 600;
      margin-bottom: 8px;
    }

    .portfolio .video-card {
      overflow: hidden;
      border-radius: 5px;
      box-shadow: 0 3px 14px rgba(0, 40, 80, .08);
    }

    .portfolio .video-card:hover {
      box-shadow: 0 6px 20px rgba(0, 40, 80, .14);
    }

    .portfolio .portfolio-item {
      margin-bottom: 10px;
    }

    #portfolio-flters li {
      cursor: pointer;
    }

    /* Visualização de fotografias e vídeos no padrão visual da galeria */
    .eiffel-viewer .modal-content { background:#f8fbfe; color:#174365; border:1px solid #dbeaf5; border-radius:16px; overflow:hidden; box-shadow:0 20px 65px rgba(0,30,70,.22); }
    .eiffel-viewer .modal-header { background:#eef7fc; border-bottom:1px solid #dbeaf5; padding:18px 24px; }
    .eiffel-viewer .modal-title { color:#048CCF; font-size:21px; font-weight:700; overflow-wrap:anywhere; }
    .eiffel-viewer .modal-body { padding:22px; }
    .eiffel-viewer .viewer-image { display:block; max-width:100%; max-height:65vh; width:auto; height:auto; object-fit:contain; margin:auto; border-radius:8px; }
    .eiffel-viewer .viewer-video { display:block; width:100%; aspect-ratio:16/9; border:0; border-radius:8px; }
    .eiffel-viewer .viewer-description { margin:18px 0 0; color:#344e63; line-height:1.7; white-space:pre-line; overflow-wrap:anywhere; }
    .eiffel-viewer .modal-footer { background:#eef7fc; border-top:1px solid #dbeaf5; }
    .eiffel-viewer .viewer-close { background:#048CCF; color:white; border:0; border-radius:7px; padding:10px 20px; }
    .eiffel-viewer .viewer-close:hover { background:#036a9e; }
    .portfolio .gallery-eye-button { border:0; border-radius:50%; background:#f1f3f5; color:#048CCF; cursor:pointer; padding:8px 12px; font:inherit; transition:background-color .25s ease,color .25s ease,transform .25s ease; }
    .portfolio .gallery-eye-button:hover { background:#048CCF; color:#fff; transform:scale(1.08); }
    .portfolio .gallery-eye-button i { font-size:22px; }
    .portfolio .video-preview { position:relative; display:flex; width:100%; height:100%; aspect-ratio:16/9; align-items:center; justify-content:center; border:0; padding:0; background:#0b3657; color:#fff; cursor:pointer; }
    .portfolio .video-preview img { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; }
    .portfolio .video-preview .play-icon { position:relative; z-index:1; font-size:58px; text-shadow:0 2px 15px rgba(0,0,0,.65); }
    .portfolio .video-preview:focus-visible, .portfolio .gallery-eye-button:focus-visible { outline:3px solid #f5bb26; outline-offset:2px; }
    @media(max-width:576px) { .eiffel-viewer .modal-body { padding:12px; } }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <button class="btn btn-danger"
              type="button"
              data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasScrolling"
              aria-controls="offcanvasScrolling">
        Menu
      </button>

      <div class="offcanvas offcanvas-start"
           data-bs-scroll="true"
           data-bs-backdrop="false"
           tabindex="-1"
           id="offcanvasScrolling"
           aria-labelledby="offcanvasScrollingLabel">

        <div class="offcanvas-header">
          <h4 class="rede">Rede</h4>

          <img src="{{ asset('galeria/assets/img/rede.png') }}"
               alt="Rede Eiffel"
               width="100px"
               height="50px">

          <h4 class="eiffel">Eiffel</h4>

          <button type="button"
                  class="btn-close text-reset"
                  data-bs-dismiss="offcanvas"
                  aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
          <ul>
            <li>
              <a href="{{ url('/') }}">
                <i class="bi bi-house-door-fill"></i>
                Página Inicial
              </a>
            </li>
          </ul>
        </div>

      </div>

      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <h3 class="rede">Rede</h3>

        <img src="{{ asset('galeria/assets/img/rede.png') }}"
             class="logo"
             alt="Rede Eiffel">

        <h3 class="eiffel">Eiffel</h3>
      </a>

    </div>
  </header>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h1 style="color:#048CCF; font-weight:bolder;">
            Galeria de Fotos e Vídeos
          </h1>
        </header>

        <!-- Filtros: mantém os originais e acrescenta Vídeos -->
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">

            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">
                Todas
              </li>

              <li data-filter=".filter-app">
                Aulas
              </li>

              <li data-filter=".filter-card">
                Actividades
              </li>

              <li data-filter=".filter-web">
                Laboratórios
              </li>

              <li data-filter=".filter-video">
                Vídeos
              </li>
            </ul>

          </div>
        </div>

        <div class="row gy-4 portfolio-container"
             data-aos="fade-up"
             data-aos-delay="200">

          <!-- ======= Fotografias existentes ======= -->
          @foreach($fotos as $foto)

            <div class="col-lg-4 col-md-6 portfolio-item {{ $foto->tipo }}">

              <div class="portfolio-wrap">

                <img
                  src="{{ asset('media/galeria/' . $foto->fotografia) }}"
                  class="img-fluid"
                  alt="{{ $foto->titulo }}"
                  loading="lazy"
                >

                <div class="portfolio-info">

                  <div class="portfolio-links">

                    <button type="button"
                            class="gallery-eye-button js-open-gallery"
                            data-bs-toggle="modal"
                            data-bs-target="#eiffelViewer"
                            data-kind="image"
                            data-src="{{ asset('media/galeria/' . $foto->fotografia) }}"
                            data-title="{{ $foto->titulo ?: 'Fotografia da Rede Eiffel' }}"
                            data-description="{{ $foto->titulo ?: 'Fotografia da Rede Eiffel' }}"
                            aria-label="Visualizar fotografia">
                      <i class="bi bi-eye"></i>
                    </button>

                  </div>

                </div>

              </div>

            </div>

          @endforeach

          <!-- ======= Vídeos publicados ======= -->
          @foreach(($videos ?? collect()) as $video)

            <div class="col-lg-4 col-md-6 portfolio-item filter-video">

              <div class="video-card">

                <div class="video-wrapper">

                  <button type="button"
                          class="video-preview js-open-gallery"
                          data-bs-toggle="modal"
                          data-bs-target="#eiffelViewer"
                          data-kind="{{ ($video->origem ?? 'youtube') === 'ficheiro' ? 'local-video' : 'video' }}"
                          data-src="{{ ($video->origem ?? 'youtube') === 'ficheiro' ? ($video->ficheiro_video ? asset('storage/' . $video->ficheiro_video) : '') : $video->url_video }}"
                          data-title="{{ $video->titulo }}"
                          data-description="{{ $video->descricao }}"
                          aria-label="Assistir ao vídeo {{ $video->titulo }}">
                    @if($video->imagem_capa)
                      <img src="{{ asset('media/videos/' . $video->imagem_capa) }}"
                           alt="Capa de {{ $video->titulo }}" loading="lazy">
                    @endif
                    <i class="bi bi-play-circle-fill play-icon"></i>
                  </button>

                </div>

                <div class="video-info">

                  <span class="video-category">
                    <i class="bi bi-play-circle"></i>
                    Vídeo · {{ ucfirst($video->categoria) }}
                  </span>

                  <h4>{{ $video->titulo }}</h4>

                  @if($video->descricao)
                    <p>
                      {{ \Illuminate\Support\Str::limit($video->descricao, 120) }}
                    </p>
                  @endif

                </div>

              </div>

            </div>

          @endforeach

        </div>

        @if($fotos->isEmpty() && ($videos ?? collect())->isEmpty())
          <div class="text-center mt-5">
            <i class="bi bi-images"
               style="font-size:45px;color:#048CCF;"></i>

            <h4 class="mt-3">
              Ainda não existem fotografias ou vídeos publicados.
            </h4>
          </div>
        @endif

      </div>

    </section>
    <!-- End Portfolio Section -->

  </main>
  <!-- End #main -->


  <!-- Janela branca de visualização: fotografias e vídeos -->
  <div class="modal fade eiffel-viewer" id="eiffelViewer" tabindex="-1"
       aria-labelledby="eiffelViewerTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="eiffelViewerTitle">Galeria Rede Eiffel</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <div id="eiffelViewerMedia" class="text-center"></div>
          <p id="eiffelViewerDescription" class="viewer-description"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="viewer-close" data-bs-dismiss="modal">
            <i class="bi bi-x-circle"></i> Fechar
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-5 col-md-12 footer-info">

            <a href="{{ url('/') }}" class="logo d-flex align-items-center">
              <img src="{{ asset('galeria/assets/img/rede.png') }}" alt="">
              <span>REDE EIFFEL</span>
            </a>

            <p>Encontrem-nos através das nossas redes sociais</p>

            <div class="social-links mt-3">
              <a href="#" class="twitter">
                <i class="bi bi-twitter"></i>
              </a>

              <a href="#" class="facebook">
                <i class="bi bi-facebook"></i>
              </a>

              <a href="#" class="instagram">
                <i class="bi bi-instagram"></i>
              </a>

              <a href="#" class="linkedin">
                <i class="bi bi-linkedin"></i>
              </a>
            </div>

          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">

            <h4>Contactos</h4>

            <p>
              Benguela - Baía Farta<br><br>
              <strong>Phone:</strong> +244 926 04 89 39<br>
              <strong>Email:</strong> rede.eiffel@gmail.com<br>
            </p>

          </div>

        </div>

      </div>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#"
     class="back-to-top bg-danger d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('galeria/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
  <script src="{{ asset('galeria/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('galeria/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('galeria/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('galeria/assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('galeria/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('galeria/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('galeria/assets/js/main.js') }}"></script>


  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const modal = document.getElementById('eiffelViewer');
      const title = document.getElementById('eiffelViewerTitle');
      const media = document.getElementById('eiffelViewerMedia');
      const description = document.getElementById('eiffelViewerDescription');
      if (!modal) return;

      modal.addEventListener('show.bs.modal', function (event) {
        const trigger = event.relatedTarget;
        if (!trigger) return;
        const kind = trigger.dataset.kind;
        const source = trigger.dataset.src || '';
        const heading = trigger.dataset.title || 'Rede Eiffel';
        const details = trigger.dataset.description || '';
        title.textContent = heading;
        description.textContent = details;
        description.hidden = !details.trim();
        media.replaceChildren();

        if (kind === 'image') {
          const image = document.createElement('img');
          image.src = source;
          image.alt = heading;
          image.className = 'viewer-image';
          media.appendChild(image);
        } else if (kind === 'local-video') {
          if (!source) {
            media.textContent = 'O ficheiro deste vídeo não está disponível.';
            return;
          }
          const player = document.createElement('video');
          player.className = 'viewer-video';
          player.controls = true;
          player.playsInline = true;
          player.preload = 'metadata';
          // Reproducao iniciada pelo utilizador, com audio activado.
          player.autoplay = false;
          player.defaultMuted = false;
          player.muted = false;
          player.volume = 1;
          player.setAttribute('controlsList', 'nodownload');
          player.src = source;
          player.addEventListener('error', function () {
            media.textContent = 'Não foi possível reproduzir este ficheiro. Verifique o acesso ao vídeo e o formato de codificação.';
          });
          media.appendChild(player);
        } else if (kind === 'video') {
          let url;
          try { url = new URL(source); } catch (e) {
            media.textContent = 'Ligação do vídeo inválida.';
            return;
          }
          const allowedHosts = ['youtube.com', 'www.youtube.com', 'youtube-nocookie.com', 'www.youtube-nocookie.com'];
          if (url.protocol !== 'https:' || !allowedHosts.includes(url.hostname) || !/^\/embed\/[a-zA-Z0-9_-]{11}$/.test(url.pathname)) {
            media.textContent = 'Este vídeo não possui uma ligação incorporada válida.';
            return;
          }
          url.searchParams.set('autoplay', '1');
          const frame = document.createElement('iframe');
          frame.src = url.toString();
          frame.className = 'viewer-video';
          frame.title = heading;
          frame.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share';
          frame.referrerPolicy = 'strict-origin-when-cross-origin';
          frame.allowFullscreen = true;
          media.appendChild(frame);
        }
      });

      // Remove o leitor ou iframe ao fechar para interromper a reprodução.
      modal.addEventListener('hidden.bs.modal', function () {
        media.replaceChildren();
      });
    });
  </script>

</body>
</html>
