@extends('layouts.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<section class="banner-other">
  <div class="container">
    <div class="row">
      <div class="col s12 white-text" data-aos="fade-up" data-aos-delay="100">
        <h5 class="title">INFORME AOS ENCARREGADOS DE EDUCAÇÃO </h5>
      </div>
    </div>
  </div>
</section>

<section class="white">
  <div class="container">
    <div class="row">
      <div class="col s12 m4 l8 offset-l2" data-aos="fade-up" data-aos-delay="100">
        <div class="center py-5">
          <img src="/media/publicacao/cp.png" style="height: 500px; object-fit: cover; filter: brightness(90%);" class="img-fluid" loading="lazy" alt="" />
        
          <p class="" style="text-align: center;"><span class="bg-primary borda-3 p-2 white-text"><span class="fa fa-calendar"></span> 4 e 5 de Agosto de 2025</span></p>
        </div>

        
       <div class="row mt-5" >

  <!-- Coluna Moxico -->
  <div class="col-md-6">
    <div class="moxico px-3">
      <div class="center">
        <p class="" style="text-align: center;"><span class="bg-primary borda-3 p-2 white-text"><span class=""></span> Liceu Eiffel Moxico</span></p>
        <p class="" style="text-align: justify; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 18px;">Informamos que os testes de seleção para ingresso no Liceu Eiffel de Moxico serão realizados na cidade do Luena nos dias 4 e 5 de Agosto de 2025, nas instalações do Complexo Escolar nº 338 Camarada Tchifuchi. O cronograma previsto é o seguinte:</p>
      </div>
      <div>
          <li style="text-align: justify; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 18px;">Sábado, 2 de agosto – 14h: Reunião com os alunos e encarregados de educação, e confirmação das inscrições.</li>
          <li style="text-align: justify; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 18px;">Segunda-feira, 4 e terça-feira, 5 de agosto – 7h30: Realização e correção das provas.</li>
          <li style="text-align: justify; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 18px;">Quarta-feira, 6 de agosto: Regresso da equipa às províncias de origem.</li>
      </div>
      
    </div>
  </div>

  <!-- Separador vertical -->
  <div class="d-none d-md-block col-md-1 text-center">
    <div class="vr h-100 mx-auto" style="width:2px; background-color: #ccc;"></div>
  </div>

  <!-- Coluna Huambo -->
  <div class="col-md-5">
    <div class="huambo px-3">
      <div class="center">
        <p class="" style="text-align: center;"><span class="bg-primary borda-3 p-2 white-text"><span class=""></span> Liceu Eiffel Huambo</span></p>
        <p class="" style="text-align: justify; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 18px;">Informamos que os testes de seleção para ingresso no Liceu Eiffel de Huambo serão realizados na cidade do Huambo nos dias 4 e 5 de Agosto de 2025, nas instalações do colégio Comandante Bula. O cronograma previsto é o seguinte:</p>
      </div>
      <div>
          <li style="text-align: justify; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 18px;">Sábado, 2 de agosto – 14h: Reunião com os alunos e encarregados de educação, e confirmação das inscrições.</li>
          <li style="text-align: justify; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 18px;">Segunda-feira, 4 e terça-feira, 5 de agosto – 7h30: Realização e correção das provas.</li>
          <li style="text-align: justify; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 18px;">Quarta-feira, 6 de agosto: Regresso da equipa às províncias de origem.</li>
      </div>
      
    </div>
  </div>

</div>

<div>
        <p style="text-align: justify; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 18px;">Pedimos a todos os encarregados que acompanhem os seus educandos nas datas indicadas e que garantam a sua comparência pontual. Nenhum atraso será permitido após o início da prova.</p>
      </div>
        <div class="center ">
          <p class="" style="text-align: center; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 18px;">A Coordenação Nacional da Rede Eiffel</p>
        </div>

       

      
        <br>
        <br>
        <br>
        <div class="center ">
          <!-- Botões de compartilhamento para Twitter, Facebook, LinkedIn, WhatsApp e Email -->
          <button onclick="shareOnTwitter('INFORME AOS ENCARREGADOS DE EDUCAÇÃO', '{{url()->current()}}')">Compartilhar no Twitter</button>
          <button onclick="shareOnFacebook('{{url()->current()}}')">Compartilhar no Facebook</button>
          <button onclick="shareOnLinkedIn('{{url()->current()}}')">Compartilhar no LinkedIn</button>
          <button onclick="shareOnWhatsApp('{{url()->current()}}')">Compartilhar no WhatsApp</button>
          <a href="mailto:?subject=INFORME AOS ENCARREGADOS DE EDUCAÇÃO&body=Confira esta notícia: {{url()->current()}}"><button>Compartilhar por Email</button></a>
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
