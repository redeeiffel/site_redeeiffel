@extends('layouts.main')
@section('content')


<style>
    .card-panel{
  padding: 15px !important;
  background-color: #048bcfd0;
}


  p {
    text-align: justify;
  }

</style>

<section class="banner-other">
  <div class="container">
    <div class="row">
      <div class="col s12 white-text" data-aos="fade-up" data-aos-delay="100">
        <h5 class="title">Formação dos docentes</h5>
      </div>
    </div>
  </div>
</section>

  <section>
    <div class="container">
      <div class="row my-5"data-aos="fade-up" data-aos-delay="400">
     
        <div class="col s12 m12 l12">
          
        <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Finalidade da Formação</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Por que?</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Principais Objectivos</button>
</div>

<div id="London" class="tabcontent">
  <div class="row">
    <div class="col s12 m12 l6">
      <h5>Finalidade da Formação</h5>
      <div class="borda-titulo-0"></div>
    <p class="texto-0" style="text-align: justify;">O desenvolvimento profissional dos professores e demais técnicos constitui uma prioridade para a Rede Eiffel devidamente articulada com os objectivos, a matriz identitária e os domínios estratégicos de intervenção do Projecto Educativo. Neste sentido, a Rede Eiffel continua a desenvolver um percurso de aprendizagem permanente, experimentando novas formas ou modalidades de formação em parceria com as tutelas. Pois ,uma formação de professores adequada serve como alicerce para construir escolas, cidadãos e profissionais mais competentes, éticos e humanos. È neste sentido que a Rede Eiffel apoia e considera a formação do corpo docente como a principal estratégia para alcançar uma educação de qualidade e se envolve seriamente numa mudança das práticas instituídas, quer académicas, quer sociais.</p>
    </div>

    <div class="col s12 m12 l4">
      <img src="./assets/img/formacao-docentes.jpg" class="responsive-img" alt="">
    </div>
    </div>
    
</div>

<div id="Paris" class="tabcontent">

    <div class="row">
    <div class="col s12 m12 l6">
      <h5 class="">Por que?</h5>
      <div class="borda-titulo-0"></div>
    <p class="texto-0" style="text-align: justify;">
    Acreditamos que um plano de formação regular e bem estructurado, comprometido com o Projecto Educativo e interiorizado pelos vários actores educativos faz a diferença nos processos e nos resultados dos liceus Eiffel em Angola. De facto a formação dos docentes representa um papel estratégico na qualidade da educação porque "uma boa escola é formada por bons alunos, que são formados por bons professores".</p>

    </div>

     <div class="col s12 m12 l4">
      <img src="./assets/img/formacao-docentes-porque.jpg" class="responsive-img" alt="">
    </div>
    </div>


</div>

<div id="Tokyo" class="tabcontent">
<div class="row">
    <div class="col s12 m12 l6">
      <h5 class="">Principais Objectivos</h5>
      <div class="borda-titulo-0"></div>
  
      <p class="texto-0" style="text-align: justify;">Portanto, várias acções de formação destinadas aos professores da Rede Eiffel são regularmente realizadas por especialistas nacionais ou internacionais e pelo agente da Missão Laica francesa afectos ao projecto Eiffel, respondendo aos objectivos seguintes:</p>

      <ul class="texto-0" style="text-align: justify;">
      <li>&#x203A; Visitas de classes seguidas de um encontro com os professores;</li>
      <li>&#x203A; Apoio em relação ao contéudo disciplinar ou didáctico;</li>
      <li>&#x203A; Conselhos em metodologia de ensino;</li>
      <li>&#x203A; Programação e preparação das actividades de ensino;</li>
      <li>&#x203A; Metodologia à elaboração de provas e à avaliaçaõ dos alunos;</li>
      <li>&#x203A; Reforço linguístico (português, inglês e francês) e disciplinar ;</li>
      <li>&#x203A; Formação informática e uso das TICE;</li>
      <li>&#x203A; Elaboração de guias metodológicos e de protocolos experimentais para as actividades laboratoriais;</li>
      <li>&#x203A; Realização de seminários de capacitação sob temáticas transversais;</li>
      </ul>
    </div>

    <div class="col s12 m12 l4">
      <img src="./assets/img/formacao-docentes-objectivos.jpg" class="responsive-img" alt="">
    </div>
    </div>
    
 
</div>


        </div>
      </div>
    </div>
  </section>
@endsection
