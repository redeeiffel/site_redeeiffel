@extends('layouts.main')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


<section class="banner-other">
  <div class="container">
    <div class="row">
      <div class="col s12 white-text" data-aos="fade-up" data-aos-delay="100">
        <h5 class="title">Mulher Eiffeliana </h5>
      </div>
    </div>
  </div>
</section>

  <section class="white">
    <div class="container">
    <div class="row">
        <div class="col s12 m4 l8 offset-l2" data-aos="fade-up" data-aos-delay="100">
            <div class="center py-5">
            <img src="/media/publicacao/7882cb094fc8fe41fb5365301f0e9d35.jpg" style="height: 500px; object-fit: cover; filter: brightness(90%);" class="img-fluid" loading="lazy" alt="" />
          
              <p class="" style="text-align: center;"><span class="bg-primary borda-3 p-2 white-text"><span class="fa fa-calendar"></span> 8 de Março 2024</span></p>
            </div>

            <div class="center ">
              <p class="" style="text-align: justify;">Confira a entrevista feita a uma das mulheres gestora da nossa Rede Eiffel, a nossa Excelentíssima Directora do Liceu 397 Eiffel do Dande , Sra:  Celina de Paulo, que de boa vontade responde as seguintes questões: </p>
            </div>
          

            <div class="center ">
                <h5 style="text-align: left;">Como é trabalhar na Rede Eiffel?*</h5>
              <p class="" style="text-align: justify;">Dra Celina de Paulo : " Para mim, desde o primeiro momento que entrei na rede Eiffel em 2016 , trabalhar nele foi e ainda é desafiador no sentido de que é um projecto promissor, que exige experts para acompanhar o ritmo do Coordenador que o lidera e a demanda de inovações que os eixos do projecto exige para que alcancemos os objectivos traçados com eficiência. Em suma, é agradavelmente peculiar e desafiante. 
              Exactamente o que eu precisava para desabrochar"</p>
            </div>


            <div class="center ">
                <h5 style="text-align: left;">Quais os métodos que a directora usa para alcançar os objectivos profissionais ?</h5>
              <p class="" style="text-align: justify;">Dra Celina de Paulo : Metodologia activa e proactiva : Tenho o Senso de envolvimento e aprendizagem contínua, Previsão e Organização, Foco e Persistência, Paixão e Comprometimento no meu fazer, Resiliência e Determinação de ver o crescimento institucional, 
              que flanqueiam o desenvolvimento da minha carreira e o meu crescimento pessoal .</p>
            </div>

            <div class="center ">
                <h5 style="text-align: left;">Qual o nível de entrega da directora em relação ao projecto?</h5>
              <p class="" style="text-align: justify;">Dra Celina de Paulo : "Considero imensurável !! Pois, o projecto por si só exige uma entrega total de toda equipa, inclusive o objecto social deste projecto que são " Os Alunos "</p>
            </div>

            <div class="center ">
                <h5 style="text-align: left;">Quais os obstáculos encontrados e como os contornou?</h5>
              <p class="" style="text-align: justify;">Dra Celina de Paulo : "As principais foram: Resistência ao rigor, Conflito de personalidade profissional, Cultura de desorganização, descaso e bajulação, rejeição à liderança feminina, Falsidade e deslealdade dos adjuntos, Acusações Graves e Maculados. Mas, como um Rio em seu curso não paralisa diante dos obstáculos que surgem, apesar das dificuldades, com o apoio incondicional de Deus, dos meus superiores hierárquicos e alguns membros da equipa, ultrapassei-as por me manter firme aos princípios de gestão e liderança, posicionando-me ao eixo e visando a meta. 
              Os obstáculos foram imprescindíveis para melhorias "</p>
            </div>

            <div class="center ">
                <h5 style="text-align: left;">Conselhos a dar para as raparigas que tencionam crescer profissionalmente?</h5>
              <p class="" style="text-align: justify;">Dra Celina de Paulo : " O limite é os céus !! 
              Usem o equilíbrio entre feminilidade e profissionalismo para o seu e desenvolvimento 
              social de todos, aproveitem que o mundo empresarial hoje confia em nós mulheres como 
              suporte além dos lares domésticos, Não limitem o vosso potencial nativo, voem !!! 
              Muito Obrigada !!!"</p>
            </div>

            <div class="center ">
              <a href="liceucaxito.redeeiffel.ao" target="_blank" rel="noopener noreferrer">
              <p class="" style="text-align: justify;">Ver mais</p>
              
              </a>
              
            </div>

            <br>
            <br>
            <br>
            <div class="center ">
              <!-- Botões de compartilhamento para Twitter, Facebook, LinkedIn, WhatsApp e Email -->
              <button onclick="shareOnTwitter('Mulher Eiffeliana', '{{url()->current()}}')">Compartilhar no Twitter</button>
              <button onclick="shareOnFacebook('{{url()->current()}}')">Compartilhar no Facebook</button>
              <button onclick="shareOnLinkedIn('{{url()->current()}}')">Compartilhar no LinkedIn</button>
              <button onclick="shareOnWhatsApp('{{url()->current()}}')">Compartilhar no WhatsApp</button>
              <a href="mailto:?subject=mulher_eiffeliana&body=Confira esta notícia: {{url()->current()}}"><button>Compartilhar por Email</button></a>
            </div>
        </div>
      </div>
    </div>
  </section>


@endsection

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
  