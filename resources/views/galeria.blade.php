<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rede Eiffel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="galeria/assets/img/rede.png" rel="icon">
  <link href="galeria/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="galeria/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="galeria/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="galeria/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="galeria/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="galeria/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="galeria/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="galeria/assets/css/style.css" rel="stylesheet">
  <link href="galeria/assets/css/main.css" rel="stylesheet">

 
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

     
      <button class="btn btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Menu</button>
      <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
           <h4 class="rede">Rede</h4>
                <img src="/galeria/assets/img/rede.png" alt="" width="100px" height="50px">
                <h4 class="eiffel">Eiffel</h4>

          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul>
            <li><a href="https://redeeiffel.ao/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
              <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>Página Inicial</a></li>
          </ul>
        </div>
      </div>
      <a href="https://redeeiffel.ao/" class="logo d-flex align-items-center">
        <h3 class="rede">Rede</h3>
        <img src="galeria/assets/img/rede.png" class="logo" alt="">
        <h3 class="eiffel">Eiffel</h3>
      </a>
      </div>
      
  
  
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
           <h1 style="color:#048CCF; font-weight: bolder;">Galeria de Fotos</h1>
          
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Todas</li>
              <li data-filter=".filter-app">Aulas</li>
              <li data-filter=".filter-card">Actividades</li>
              <li data-filter=".filter-web">Laboratórios</li>
            </ul>
          </div>
        </div>

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">


        @foreach( $fotos as $foto) 

          <div class="col-lg-4 col-md-6 portfolio-item {{$foto->tipo}}">
            <div class="portfolio-wrap">
              <img src="media/galeria/{{$foto->fotografia}}" class="img-fluid" alt="">
              <div class="portfolio-info">
               
               
                <div class="portfolio-links">
                  <a href="media/galeria/{{$foto->fotografia}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{$foto->titulo}}"><i class="bi bi-eye"></i></a>
               
                </div>
              </div>
            </div>
          </div>

          
          @endforeach  

        

          


        </div>

      </div>

    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->
 <!-- ======= Footer ======= -->
   <footer id="footer" class="footer">

    
    
    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="../index.html" class="logo d-flex align-items-center">
              <img src="galeria/assets/img/rede.png" alt="">
              <span>REDE EIFFEL</span>
            </a>
            <p>Encontrem-nos atravéz das nossas redes sociais</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
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

   
  </footer><!-- End Footer -->
     <a href="#" class="back-to-top bg-danger d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="galeria/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="galeria/assets/vendor/aos/aos.js"></script>
  <script src="galeria/assets/vendor/php-email-form/validate.js"></script>
  <script src="galeria/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="galeria/assets/vendor/purecounter/purecounter.js"></script>
  <script src="galeria/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="galeria/assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="galeria/assets/js/main.js"></script>

</body>

</html>