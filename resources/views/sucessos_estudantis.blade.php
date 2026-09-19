@extends('layouts.main')
@section('content')

<style>
    .boxCategoria {
      background-color: #fff;
      margin-bottom: 25px;
      width: 100%;
      height: 200px;
      /* Center vertically and horizontally */
      display: flex;
      justify-content: center;
      align-items: center;
    }

    a.boxCategoria:hover {
      transform: scale(0.9);
      transition: 0.2s ease-in-out;
    }

    .child {
      width: 150px;
      object-fit: cover;
      height: auto;
      /* background-color: red; */
      vertical-align: middle;
    }
  </style>


<style>
    .card-panel{
  padding: 15px !important;
  background-color: #048bcfd0;
}

</style>

<section class="banner-other">
  <div class="container">
    <div class="row">
      <div class="col s12 white-text"data-aos="fade-up" data-aos-delay="100">
        <h5 class="title">Sucessos Estudantis</h5>
      </div>
    </div>
  </div>
</section>


<section>
  <div class="container">
    <div class="row my-5">
      <div class="col s12 m12 l6"data-aos="fade-up" data-aos-delay="200">
        <ul class="collapsible popout">
          <li>
            <div class="collapsible-header Roboto-Bold"><i class="material-icons">chevron_right</i>Resultados</div>
            <div class="collapsible-body Roboto-Regular">
            <p class="texto-0" style="text-align: justify;">Tanto o nível de exigência quanto à ocupação dos estudantes com estudos e matérias estruturantes do seu plano formativo fazem com que o sucesso e a realização escolar dos alunos do liceu permitam colocar hoje os liceus Eiffel no topo dos estabelecimentos Nacionais de referência e no quadro das escolas consideradas como zonas de influência pedagógica e alfobres de quadros provinciais, nacionais e internacionais de sucesso.</p>
            <p class="texto-0" style="text-align: justify;">No domínio dos resultados, a melhoria qualitativa e quantitativa dos resultados escolares dos alunos é uma preocupação constante. Para o efeito, tem vindo a adequar-se a oferta formativa às necessidades do meio ao mesmo tempo que se promove a qualidade do ensino e das aprendizagens, a educação para a cidadania e a criação de oportunidades para todos, a par de uma formação integral dos alunos.</p>
            <ul class="text-primary negrito" style="text-align: justify;"> 
              <li>&rightarrow; 177 alunos foram premiados sobre 192 representando 98% de sucesso terminando o ensino médio em 2024  ;</li>
              <li>&rightarrow; Com as percentagens de Delf A2: 96%  Delf B1: 100%, os estudantes, destacaram-se no ano de 2024 ;</li>
               <li>&rightarrow; Com as percentagens de Delf A2: 97%  Delf B1: 94%, os estudantes, destacaram-se no ano de 2023 ;</li>
              <li>&rightarrow; 177 alunos foram premiados sobre 180 representando 98% de sucesso terminando o ensino médio em 2023  ;</li>
              <li>&rightarrow; 166 alunos foram premiados sobre 172 representando 96% de sucesso terminando assim o seu ensino médio em 2021 ;</li>
              <li>&rightarrow; Com as percentagens de 97% para o DELF e 97% para os exames, os estudantes, destacaram-se no ano de 2022 ;</li>
            </ul>
            </div>
          </li>

         

          <li>
            <div class="collapsible-header Roboto-Bold"><i class="material-icons">chevron_right</i>Actividades Extra-Curriculares</div>
            <div class="collapsible-body Roboto-Regular">
              <p class="texto-0" style="text-align: justify;">
              As actividades Curriculares são definidas anualmente dentro das áreas recreativas, culturais, artísticas e desportivas. As mesmas são propostas e aprovadas anualmente pelas direcções dos liceus. A orientação de cada clube escolar ou actividade está sob os cuidados de um professor indicado pela Direcção de acordo com a sua disponibilidade e competências.
              </p>

              <p class="texto-0" style="text-align: justify;">
              As atividades extracurriculares são essenciais para a formação do aluno. Elas oferecem experiência, enriquecem a vida acadêmica, melhoram a capacidade de atuar em diversos cenários da prática e no desenvolvimento das habilidades interpessoais. Também contribuem para despertar a criatividade e o talento nos estudantes e melhorar o desempenho em sala de aula.
              </p>

              <p class="negrito texto-0" style="text-align: justify;">
              Fazem parte das actividades extracurriculares na Rede Eiffel:
              </p>

              <ul class="text-primary" style="text-align: justify;">
              <li>&rightarrow; As aulas de reforço de conteúdo pragmático</li>
              <li>&rightarrow; As oficinas de arte (teatro, música, artes plásticas, dança)</li>
              <li>&rightarrow; Os esportes (futebol, andebol, basquetbol)</li>
              <li>&rightarrow; O artesanato e a culinária</li>
              <li>&rightarrow; Os debates filosóficos</li>
              <li>&rightarrow; Os clubes diversos (xadrez, projectos científicos, entre outros)</li>
              </ul>
            </div>
          </li>
         

        </ul>
      </div>

      <div class="col s12 m12 l6"data-aos="fade-up" data-aos-delay="400">
        <ul class="collapsible popout">
          <li>
            <div class="collapsible-header Roboto-Bold"><i class="material-icons">chevron_right</i>Destaques nos concursos</div>
            <div class="collapsible-body Roboto-Regular">
            
              <ul class="text-primary" style="text-align: justify;">
                <li>&rightarrow; Alunos premiados nos Concursos Nacionais (Olimpíadas de Matemática, SADC, entre outros)</li>
              </ul>

              <p class="texto-0 negrito">Concurso Kandengue escritor:</p>

<ul class="text-primary">
 
  <li>&rightarrow; 2022/2023 : 1º lugar.</li>
</ul>

              <p class="texto-0 negrito">Olímpíadas de matemática:</p>

              <ul class="text-primary">
                <li>&rightarrow; 2017 : 10ª classe : 1º lugar. ; 11ª classe : 1º e 2º lugares</li>
                <li>&rightarrow; 2018 : 10ª : 1º lugar; 11ª : 3º lugar</li>
                <li>&rightarrow; 2019 : 11ª : 1º lugar e 2º lugar</li>
                <li>&rightarrow; 2021 : 1º e 2º lugar na 11ª</li>
                <li>&rightarrow; 2022 : 1º lugar na 10ª</li>
                <li>&rightarrow; 2023 : 1º e 2º lugar na 11ª</li>

              </ul>

             
              <p class="texto-0 negrito">Concurso de redacção da SADC</p>

              <ul class="text-primary">
                <li>&rightarrow; 2017 : 1º lugar</li>
                <li>&rightarrow; 2018 : 1º lugar</li>
                <li>&rightarrow; 2019 : 1º lugar</li>
              </ul>

              <p class="texto-0 negrito">Concurso de literacia financeira</p>

              <ul class="text-primary">
                <li>&rightarrow; 2017 : 1º lugar</li>
                <li>&rightarrow; 2018 : 1º lugar</li>
              </ul>

              <p class="texto-0 negrito">Torneio nacional de física</p>

              <ul class="text-primary">
                <li>&rightarrow; 2018 : 1º e 3º lugar</li>
              </ul>
            </div>
          </li>

          

        

          
        </ul>
      </div>
    </div>
  </div>
</section>


@endsection
