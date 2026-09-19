@extends('layouts.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<section class="banner-other">
  <div class="container">
    <div class="row">
      <div class="col s12 white-text" data-aos="fade-up" data-aos-delay="100">
        <h5 class="title">RESULTADOS DOS EXAMES DE ADMISSÃO 2024/2025 </h5>
      </div>
    </div>
  </div>
</section>

<section class="white">
  <div class="container">
    <div class="row">
      <div class="col s12 m4 l8 offset-l2" data-aos="fade-up" data-aos-delay="100">
        <div class="center py-5">
          <img src="media/publicacao/logo.jpeg" style="height: 500px; ;" class="img-fluid" loading="lazy" alt="" />
          <p style="text-align: center; font-size: 14px;"> </p>
          <p class="" style="text-align: center;"><span class="bg-primary borda-3 p-2 white-text"><span class="fa fa-calendar"></span> 3 DE NOVEMBRO</span></p>
        </div>

        <div class="center ">
          <p class="" style="text-align: justify;"> A Rede Eiffel Angola, tem o prazer de anunciar a toda comunidade estudantil que participou nos exames de acesso nas suas instutuições, os resultados dos testes de admissão para o ano lectivo 2024/2025:</p>
        </div>

        <div class=" ">
          <p class="" style="text-align: justify;">
               <li><a href="media/publicacao/RESULTADO-TA20242025-CAXITO (1).pdf" target="_blank">LICEU Nº397 EIFFEL DO DANDE</a></li>
                  <li><a href="media/publicacao/RESULTADO-TA20242025-MALANJE (1).pdf" target="_blank">LICEU Nº44 EIFFEL MALANJE</a></li>
                     <li><a href="media/publicacao/RESULTADO_TA20242025_NDALATANDO (1).pdf" target="_blank">LICEU Nº30 EIFFEL DE CAZENGO</a></li>
                        <li><a href="media/publicacao/RESULTADO_TA20242025_ONDJIVA.pdf" target="_blank">LICEU EIFFEL DE ONDJIVA</a></li>
               </p>
        </div>

     
 

        <div class="center ">
          <p class="" style="text-align: justify;">MUITOS PARABÉNS AOS NOVOS ESTUDANTES!!!</p>
        </div>

       

       
        <br>
        <br>
        <br>
        <div class="center ">
          <!-- Botões de compartilhamento para Twitter, Facebook, LinkedIn, WhatsApp e Email -->
         
          <button onclick="shareOnFacebook('{{url()->current()}}')">Compartilhar no Facebook</button>
          <button onclick="shareOnLinkedIn('{{url()->current()}}')">Compartilhar no LinkedIn</button>
          <button onclick="shareOnWhatsApp('{{url()->current()}}')">Compartilhar no WhatsApp</button>

        </div>


      </div>
    </div>
  </div>
</section>


<!-- JavaScript para abrir as janelas pop-up com os links de compartilhamento -->
<script>
  function shareOnTwitter(title, url) {
    window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(title) + '&url=' + encodeURIComponent(url), 'share-twitter', 'width=600,height=300');
  }

  function shareOnFacebook(url) {
    window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url), 'share-facebook', 'width=600,height=300');
  }

  function shareOnLinkedIn(url) {
    window.open('https://www.linkedin.com/shareArticle?url=' + encodeURIComponent(url), 'share-linkedin', 'width=600,height=300');
  }

  function shareOnWhatsApp(url) {
    // Para dispositivos móveis, abrir o aplicativo do WhatsApp
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
      window.open('whatsapp://send?text=' + encodeURIComponent(url), '_blank');
    } else {
      // Para desktop, abrir o WhatsApp Web
      window.open('https://web.whatsapp.com/send?text=' + encodeURIComponent(url), '_blank');
    }
  }
</script>

@endsection
