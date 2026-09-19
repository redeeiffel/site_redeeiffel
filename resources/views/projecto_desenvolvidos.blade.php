@extends('layouts.main')
@section('content')



<style>
  .card-panel {
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
        <h5 class="title">Projectos Desenvolvidos</h5>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row my-5" data-aos="fade-up" data-aos-delay="400">

      <div class="col s12 m12 l12">

        <div class="tab">
          <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Actuação dos Alunos</button>
          <button class="tablinks" onclick="openCity(event, 'Paris')">Projectos Realizados</button>
          <button class="tablinks" onclick="openCity(event, 'Tokyo')">Participação na UNESCO</button>
          <button class="tablinks" onclick="openCity(event, 'Desafios')">Finalidade dos Projectos</button>
        </div>

        <div id="London" class="tabcontent">
          <div class="row">
            <div class="col s12 m12 l6">
              <h5>Actuação dos Alunos</h5>
              <div class="borda-titulo-0"></div>
              <p class="texto-0" style="text-align: justify;">Vários projectos educacionais existem nos liceus da Rede Eiffel. Esses projectos são desenvolvidos por alunos em uma (ou mais) disciplina(s) ou conteúdo(s) curricular(es), no contexto escolar, sob orientação de professor. Esses projectos têm possibilitado a descoberta de novas habilidades entre os alunos e estimulado a análise crítica de dados e o desenvolvimento de investigações científicas, possibilitando testes de hipóteses, desenvolvimento da capacidade de trabalho em equipe e o exercício da discussão de resultados.</p>
            </div>

            <div class="col s12 m12 l4">
              <img src="/assets/imagens/Actuacao_dosalunos.jpg" class="responsive-img" alt="">
              <p style="text-align: center; font-size: 14px;"> Estudantes do Liceu Eiffel de Ondjiva e Professor de química durante uma actividade da francofonia</p>
            
            </div>
          </div>
        </div>

        <div id="Paris" class="tabcontent">

          <div class="row">
            <div class="col s12 m12 l6">
              <h5 class="">Projectos Realizados</h5>
              <div class="borda-titulo-0"></div>
              <p class="texto-0" style="text-align: justify;">
                Muitas práticas se tornaram catalisadoras para o aprendizado obtido nas aulas teóricas, dentro dos conteúdos de aprendizagem, atuando na construção de um conhecimento que transforma e incentiva as práticas da cidadania, autonomia e da ética, através da realização de projetos que integram os conhecimentos escolares e a realidade económica, social e ambiental dos alunos:
              </p>
              <ul class="texto-0" style="text-align: justify;">
                <li>&#x203A; Criação de hortas pedagógicas;</li>
                <li>&#x203A; Geminação com o Liceu francês de Luanda;</li>
                <li>&#x203A; Combate ao aquecimento global ( arborização);</li>
                <li>&#x203A; Limpeza das praias;</li>
                <li>&#x203A; Fábrico de sabão azul;</li>
                <li>&#x203A; Confecção de alcool gel caseiro para uso interno a instituição;</li>
                <li>&#x203A; Reciclagem e separação dos resíduos;</li>
                <li>&#x203A; Criação de um forno solar;</li>
                <li>&#x203A; Incentivo à escolarização das crianças;</li>
                <li>&#x203A; Apoio humanitário às comunidades ( doações diversas : água, alimentação, roupa… );</li>
                <li>&#x203A; Prácticas desportivas a nível das províncias;</li>
                <li>&#x203A; Combate a bilharziose;</li>
                <li>&#x203A; Limpeza nas cidades;</li>
                <li>&#x203A; Parcerias e intercâmbio com escolas vizinhas;</li>
                <li>&#x203A; Sensibilizações à população (palestras diversas);</li>
                <li>&#x203A; Ecopastorismo (gestão ecológica dos meios por intermédio de herbívoros);</li>
                <li>&#x203A; Semana da francofonia;</li>

              </ul>
            </div>

            <div class="col s12 m12 l4">
              <img src="./assets/img/projectos_realizados.webp" class="responsive-img" alt="">
            </div>
          </div>
        </div>

        <div id="Tokyo" class="tabcontent">
          <div class="row">
            <div class="col s12 m12 l6">
              <h5>Participação na UNESCO</h5>
              <div class="borda-titulo-0"></div>
              <p class="texto-0" style="text-align: justify;">
                Os liceus Eiffel também fazem parte das escolas associadas à UNESCO https://fr.unesco.org/ desde 2018 preservando os valores da instituiçaõ reconhecida a nível mundial. Os pilares da educação da UNESCO definem os aprendizados considerados essenciais para que as alunos se desenvolvam cognitivamente e socialmente, destancando 4 pilares ( aprender a conhecer; aprender a fazer; aprender a conviver e aprender a ser) que possibilitam que os alunos recebam uma formação completa. O último dos pilares da educação da UNESCO está relacionado ao desenvolvimento do ser como um todo. No caso, todos precisam estar aptos a pensar de forma crítica e autónoma e ser capaz de formar seu próprio juízo de valor.
              </p>
            </div>

            <div class="col s12 m12 l4">
              <img src="./assets/img/unesco.png" class="responsive-img" alt="">
            </div>
          </div>

        </div>

        <div id="Desafios" class="tabcontent">
          <div class="row">
            <div class="col s12 m12 l6">
              <h5 class="">Finalidade dos Projectos</h5>
              <div class="borda-titulo-0"></div>

              <p class="texto-0" style="text-align: justify;">Com base nestes factores os Liceus se predispõe a promover os seguintes valores:</p>

              <ul class="texto-0" style="text-align: justify;">
                <li>&#x203A; Fazer a ligação entre ensino e a cidadania; </li>
                <li>&#x203A; Impulsionar uma educação inclusiva e de equidade; </li>
                <li>&#x203A; Promover a fraternidade, tolerância, rigor e o trabalho em equipa (desenvolver um espírito crítico e ético); </li>
                <li>&#x203A; Realizar iniciativas que contribuam ao desenvolvimento de um espírito de comunidade educativa na província (ao realizar inicitiavas, se desenvolve a criatividade e a inteligencia dos estudantes); </li>
                <li>&#x203A; Desenvolver um espírito de responsabilidade, competência, diversidade, tolerância e respeito mútuo; </li>
                <li>&#x203A; Reconhecer os estudantes de género feminino na área científica e permitir a equitabilidade dos níveis entre ambos sem discriminação, concentrando as acções na colaboração entre os estudantes. </li>
              </ul>
            </div>

            <div class="col s12 m12 l4">
              <img src="/assets/imagens/finalidade.JPG" class="responsive-img" alt="">
              <p style="text-align: center; font-size: 14px;"> Estudantes do Liceu Nº 44 Eiffel Malanje no laboratório de química</p>
            
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

@endsection
