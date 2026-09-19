@extends('layouts.main')
@section('content')

@foreach( $detalhes as $detalhes) 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<section class="banner-other">
  <div class="container">
    <div class="row">
      <div class="col s12 white-text" data-aos="fade-up" data-aos-delay="100">
        <h5 class="title">{{$detalhes->titulo}} </h5>
      </div>
    </div>
  </div>
</section>

<section class="white">
  <div class="container">
    <div class="row">
      <div class="col s12 m4 l8 offset-l2" data-aos="fade-up" data-aos-delay="100">
        <div class="center py-5">
          <img src="/media/publicacao/{{$detalhes->imagem_interna}}" style="height: 500px; object-fit: cover; filter: brightness(90%);" class="img-fluid" loading="lazy" alt="" />
          <p style="text-align: center; font-size: 14px;"> {{$detalhes->nomes}}</p>
          <p class="" style="text-align: center;"><span class="bg-primary borda-3 p-2 white-text"><span class="fa fa-calendar"></span> {{$detalhes->data}}</span></p>
        </div>

        <div class="center ">
          <p class="" style="text-align: justify;"> {{$detalhes->texto_inicial}}</p>
        </div>

        <div class="center ">
          <p class="" style="text-align: justify;">{{$detalhes->texto_secundario}}</p>
        </div>

        <div class="center py-5">
          <img src="/media/publicacao/{{$detalhes->imagem_interna_tercearia}}" style="height: 500px; object-fit: cover; filter: brightness(90%);" class="img-fluid" loading="lazy" alt="" />
          <p style="text-align: center; font-size: 14px; "> {{$detalhes->nomes_um}}</p>
        </div>

        <div class="center ">
          <p class="" style="text-align: justify;">{{$detalhes->texto_terceario}}</p>
        </div>

        <div class="center ">
          <p class="" style="text-align: justify;">{{$detalhes->texto_quarto}}</p>
        </div>

       

        <div class="center ">
          <a href="{{$detalhes->link}}" target="_blank" rel="noopener noreferrer">
            <p class="" style="text-align: justify;">Ver mais</p>
          </a>
        </div>
        <br>
        <br>
        <br>
        <div class="center ">
          <!-- Botões de compartilhamento para Twitter, Facebook, LinkedIn, WhatsApp e Email -->
          <button onclick="shareOnTwitter('{{$detalhes->titulo}}', '{{url()->current()}}')">Compartilhar no Twitter</button>
          <button onclick="shareOnFacebook('{{url()->current()}}')">Compartilhar no Facebook</button>
          <button onclick="shareOnLinkedIn('{{url()->current()}}')">Compartilhar no LinkedIn</button>
          <button onclick="shareOnWhatsApp('{{url()->current()}}')">Compartilhar no WhatsApp</button>
          <a href="mailto:?subject={{$detalhes->titulo}}&body=Confira esta notícia: {{url()->current()}}"><button>Compartilhar por Email</button></a>
        </div>


      </div>
    </div>
  </div>
</section>
@endforeach  

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
