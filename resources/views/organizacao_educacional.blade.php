@extends('layouts.main')
@section('content')


<style>

  p {
    text-align: justify;
  }
</style>

<section class="banner-other">
  <div class="container">
    <div class="row">
      <div class="col s12 white-text" data-aos="fade-up" data-aos-delay="100">
        <h5 class="title">Organização Educacional</h5>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row mt-5" data-aos="fade-up" data-aos-delay="400">

      <div class="col s12 m12 l12">

        <div class="tab">
          <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Material Escolar</button>
          <button class="tablinks" onclick="openCity(event, 'Paris')">Formas de Avaliação</button>
          <button class="tablinks" onclick="openCity(event, 'Tokyo')">Métodos de Ensino</button>
        </div>

        <div id="London" class="tabcontent">
          <div class="row">
            <div class="col s12 m12 l6">
              <h5 class="">Material Escolar</h5>
              <div class="borda-titulo-0"></div>
              <p class="texto-0" style="text-align: justify;">Portanto, várias acções de formação destinadas aos professores da Rede Eiffel são regularmente realizadas por especialistas nacionais(PCF da Rede Eiffel) ou internacionais e pelo agente expatriado da Missão Laica francesa afecto a Rede Eiffel, respondendo aos objectivos seguintes:</p>
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
              <img src="/assets/imagens/material_escolar.jpg" class="responsive-img" alt="">
              <p style="text-align: center; font-size: 14px;"> Estudantes do Liceu Nº 30 Eiffel de Cazengo fazendo práticas de informática</p>
            
            </div>
          </div>
        </div>

        <div id="Paris" class="tabcontent">

          <div class="row">
            <div class="col s12 m12 l6">
              <h5 class="">Formas de Avaliação</h5>
              <div class="borda-titulo-0"></div>
              <p class="texto-0" style="text-align: justify;">
                Conforme as orientações provenientes do <a href="https://redeeiffel.ao/www.inide.co.ao" target="_blank">INIDE</a>, os alunos da Rede Eiffel são regularmente avaliados. Os três tipos de avaliações(Avaliação diagnóstica, formativa e sumativa ) realizadas permitem conhecer os níveis de aprendizagem doa alunos, a eficácia dos métodos e meios utilizados no ensino, o cumprimento dos objectivos programáticos, pelo(a) professor(a) e outros elementos inerentes ao processo de ensino-aprendizagem.

                Por fim, cabe realçar que os finalistas são submetidos a provas trimestrais nacionais chamadas PCT (provas comuns trimestrais) organizadas pela Coordenação da rede Eiffel cujo rigor e exigências são reconhecidos a nível internacional.
              </p>
            </div>
            <div class="col s12 m12 l4">
              <img src="/assets/imagens/formas.png" class="responsive-img" alt="">
              <p style="text-align: center; font-size: 14px;"> Estudantes do Liceu de Ondjiva fazendo práticas de informática</p>
            
            </div>
          </div>


        </div>

        <div id="Tokyo" class="tabcontent">
          <div class="row">
            <div class="col s12 m12 l6">
              <h5 class="">Métodos de Ensino</h5>
              <div class="borda-titulo-0"></div>

              <p class="texto-0 text-primary negrito" style="text-align: justify;">Educação, um direito fundamental de todos, perpassa o desenvolvimento humano
              <p>

              <p class="texto-0" style="text-align: justify;">Os professores da Rede além de desempenharem no âmbito da sua profissão suas habilidades interpessoais, competências e seu 
              controle emocional proporcionam ao seus alunos não só o aprendizado, mas também e sobre tudo o gosto em adquirir o conhecimento.</p>

              <p class="texto-0" style="text-align: justify;">Para poder atingir os objectivos, diversas construções mentais e ações são exigidas dos alunos, tais como:</p>
              <ul class="texto-0" style="text-align: justify;">
                <li>&#x203A; Leitura e pesquisa</li>
                <li>&#x203A; Observação, comparação e imaginação</li>
                <li>&#x203A; Organização de dados</li>
                <li>&#x203A; Elaboração de hipóteses</li>
                <li>&#x203A; Interpretação</li>
                <li>&#x203A; Crítica</li>
                <li>&#x203A; Constante busca de suposições às hipóteses apresentadas</li>
                <li>&#x203A; Construção de sínteses e soluções</li>
                <li>&#x203A; Assimilação de novas situações</li>
                <li>&#x203A; Planejamento</li>
                <li>&#x203A; Tomada de decisões</li>
              </ul>

              <p class="texto-0" style="text-align: justify;">
                Em caso de interrupção das aulas, os liceus da Rede Eiffel podem propor uma continuidade pedagógica proporcionando aos alunos aulas a distância e suporte didácticos.
              </p>
            </div>

            <div class="col s12 m12 l4" style="margin-top: 100px;">
              <img src="/assets/imagens/metodo_de ensino.jpg" class="responsive-img" alt="">
              <p style="text-align: center; font-size: 14px;"> Professor de Francês e de Química do Liceu Eiffel de Ondjiva durante uma actividade</p>
            
            </div>
          </div>


        </div>


      </div>
    </div>
  </div>
</section>

@endsection
