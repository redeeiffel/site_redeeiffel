@extends('layouts.main')
@section('content')

<style>
    .card-panel{
  padding: 15px !important;
  background-color: #048bcfd0;
}
 p{
  text-align: justify;
 }

</style>

<section class="banner-other">
  <div class="container">
    <div class="row">
      <div class="col s12 white-text"data-aos="fade-up" data-aos-delay="100">
        <h5 class="title">Projectos Educativos</h5>
      </div>
    </div>
  </div>
</section>


  <section>
    <div class="container">
      <div class="row my-5"data-aos="fade-up" data-aos-delay="400">
     
        <div class="col s12 m12 l12">
          
        <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Origem</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Objectivo</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Orientação</button>
  <button class="tablinks" onclick="openCity(event, 'Desafios')">Desafios</button>
</div>

<div id="London" class="tabcontent">
  <div class="row">
    <div class="col s12 m12 l6">
      <h5>Origem</h5>
      <div class="borda-titulo-0"></div>
    <p class="texto-0" style="text-align: justify;">O projecto educativo da Rede Eiffel foi construído sobre as orientações dos principais actores e dentro um objeto de prosseguir e reforçar a excelência que a Rede Eiffel demonstrou há mais de 10 anos. Com este, procuramos que todos assumam o carácter prioritário que devemos atribuir à mudança de paradigma na educação, através do desenvolvimento de estratégias que conduzam a uma maior autonomia da escola, ao desenvolvimento de projectos educacionais e a um modelo de educação assente na criatividade e inovação</p>
    </div>

    <div class="col s12 m12 l4">
    <img src="/assets/imagens/origem.JPG" class="responsive-img" alt="">
    <p style="text-align: center; font-size: 14px;"> Estudantes do Liceu Nº30 Eiffel de Cazengo ilustrando uma prática</p>
            
    </div>
    </div>
    
   
</div>

<div id="Paris" class="tabcontent">

    <div class="row">
    <div class="col s12 m12 l6">
      <h5>Objectivo</h5>
      <div class="borda-titulo-0"></div>
    <p class="texto-0" style="text-align: justify;">
    O projecto educativo pretende, antes de mais, constituir um manual, curto e prático, para os actores na missão deles e um suporte nas práticas educativas iniciadas. As ações propostas para cada objectivo prioritário determinado são renováveis todos os anos a fim de adaptar o projecto educativo em conformidade com as evoluções da Rede Eiffel e da sociedade. Assim, o Projecto Educativo deverá ser entendido como “um instrumento aglutinador e orientador da acção educativa que esclarece as finalidades e funções da escola, inventaria problemas e os modos possíveis da sua solução, pensa os recursos disponíveis e aqueles que podem ser mobilizados.”, pressupondo-se que seja ainda “ um instrumento projectado para o futuro, pensado e elaborado colectivamente pela comunidade educativa a partir da sua própria realidade, que actua de modo coerente sobre a prática docente com intenção de melhorá-la, dotando as escolas de eficácia para alcançar os objectivos pretendidos.” (Mansilha,1992).
    </p>
    </div>
    <div class="col s12 m4">
    <img src="/assets/imagens/OBJECTIVO.JPG" class="responsive-img"  alt="">
    <p style="text-align: center; font-size: 14px;"> Director pedagógico do Liceu Eiffel de Ondjiva</p>
            
    </div>
    </div>

</div>

<div id="Tokyo" class="tabcontent">
  <div class="row">
    <div class="col s12 m12 l6">
      <h5>Orientação</h5>
      <div class="borda-titulo-0"></div>
    <p class="texto-0" style="text-align: justify;">Deste modo, o Projecto Educativo surge como o documento orientador do planeamento da acção educativa da Rede Eiffel em Angola, devendo servir como quadro de referência no qual se revejam todos os elementos da Comunidade Educativa em que os liceus Eiffel se inserem.</p>
    </div>
    
     <div class="col s12 m12 l4">
    <img src="/assets/imagens/ORIENTACAO.JPG" class="responsive-img" alt="">
    <p style="text-align: center; font-size: 14px;"> Finalistas do Liceu Nº 44 Eiffel Malanje na sala de aula</p>
            
    </div>
    </div>
    
</div>

<div id="Desafios" class="tabcontent">
  <div class="row">
    <div class="col s12 m12 l6">
      <h5 class="">Desafios</h5>
      <div class="borda-titulo-0"></div>
  
      <p class="texto-0" style="text-align: justify;">
      Como um plano de trabalho trienal, o projecto educativo da Rede Eiffel tem por vocação de traduzir as ações da Coordenação e de dirigir as Direções dos quatro liceus da Rede Eiffel a elaborar os seus próprios projectos educativos na mesma ótica dos seis desafios estratégicos destacados :
      </p>

      <ul class="texto-0" style="text-align: justify;">
        <li>&#x203A; A promoção de um melhor ambiente de trabalho nas vertentes físicas, infra-estruturais e de saúde integral</li>
        <li>&#x203A; A promoção das dimensões científico-pedagógicas, produtivas e académico-profissionais dos professores</li>
        <li>&#x203A; A consolidação do nível de Ensino-aprendizagem científico e bilingue pelo sucesso escolar dos alunos</li>
        <li>&#x203A; A Promoção dos aspectos fundamentais de educação para a cidadania e ao resgate dos valores éticos e morais</li>
        <li>&#x203A; A co-responsabilização dos pais e encarregados de educação no processo educativo dos alunos</li>
        <li>&#x203A; A melhoria organizacional e a inovação</li>
      </ul>
    </div>

    <div class="col s12 m12 l4">
    <img src="./assets/img/16.jpg" class="responsive-img" alt="">
    <p style="text-align: center; font-size: 14px;"> Estudantes do Liceu Nº 30 Eiffel de Cazengo na vitrine da escola</p>
            
    </div>
    </div>
</div>

        </div>
      </div>
    </div>
  </section>

@endsection
