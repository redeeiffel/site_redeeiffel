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
      <div class="col s12 white-text"data-aos="fade-up" data-aos-delay="100">
        <h5 class="title">Organização dos Alunos</h5>
      </div>
    </div>
  </div>
</section>

  <section>
    <div class="container">
      <div class="row">
        <div class="mt-5 col s12 m12 l12"data-aos="fade-up" data-aos-delay="100">
          
        <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Perfil de final de Curso</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Ingresso à Universidade</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Bolsas de Estudo</button>
  <button class="tablinks" onclick="openCity(event, 'Disciplinas')">Outros Doadores de Bolsas</button>
  <button class="tablinks" onclick="openCity(event, 'Francofonia')">Destaques</button>
  <button class="tablinks" onclick="openCity(event, 'MissoesEducativas')">Critérios de Selecção</button>
</div>

<div id="London" class="tabcontent">
  <div class="row">
    <div class="col s12 m12 l6">
        <h5 class="">Perfil de final de Curso</h5>
      <div class="borda-titulo-0"></div>
  
      <p class="texto-0" style="text-align: justify;">Ao finalizar o seu percurso em um dos liceus da rede Eiffel, o estudante é autónomo e dinâmico: ele justifica de sólidas competências de responsabilidade na sua aprendizagem e na sua vida quotidiana e faz prova de uma motivação pelo seu desenvolvimento pessoal e profissional. Com um espírito científico, o estudante faz prova de curiosidade e demonstra capacidades de criatividade e de inovação na área científica. O estudante é também sensível ao bilinguismo e a interculturalidade e preparado para viajar e para prosseguir os seus estudos em Angola ou no exterio</p>
    </div>

    <div class="col s12 m12 l4">
      <img src="/assets/imagens/final_de curso.jpg" class="responsive-img" alt="">
      <p style="text-align: center; font-size: 14px;"> Finalistas da 12ªA do Liceu Nº 44 Eiffel Malanje</p>
            
    </div>
    </div>
    
</div>

<div id="Paris" class="tabcontent">

    <div class="row">
    <div class="col s12 m12 l6">
      <h5 class="">Ingresso à Universidade</h5>
      <div class="borda-titulo-0"></div>
    <p class="texto-0" style="text-align: justify;">Ao longo dos últimos anos, foram colocados em prática inúmeros programas de incentivo ao acesso às universidades Nacionais e internacionais para estudantes de diferentes perfis que frequentaram a Rede Eiffel.</p>

    <p class="texto-0">
    A TOTALENERGIES optou, no âmbito da sua política de reforço das competências, por acompanhar as iniciativas da Embaixada francesa em Angola que visam reforçar a atratividade do ensino superior francês junto dos estudantes estrangeiros. Os objetivos são os seguintes:
    </p>
    
    <ul class="texto-0" style="text-align: justify;">
      <li>&#x203A; Contribuir para o êxito da política dos poderes públicos a favor de um melhor reconhecimento internacional da França em matéria de ensino superior</li>
      <li>&#x203A; Reforçar o lugar das empresas, das escolas de engenheiros francesas e dos institutos universitários franceses nas formações e carreiras cada vez mais internacionais dos engenheiros e dos técnicos superiores</li>
      <li>&#x203A; Oferecer uma oportunidade de carreira aos estudantes estrangeiros</li>
      </ul>
    
    </div>

    <div class="col s12 m12 l4">
    <img src="/assets/imagens/ingressos.jpg" class="responsive-img" alt="">
    <p style="text-align: center; font-size: 14px;"> Finalistas da 12ªB do Liceu do Liceu Eiffel de Ondjiva</p>
            
    </div>
    </div>


</div>

<div id="Tokyo" class="tabcontent">
  <div class="row">
    <div class="col s12 m12 l6">
      <h5 class="">Bolsas de Estudo</h5>
      <div class="borda-titulo-0"></div>
      <p class="texto-0" style="text-align: justify;">O programa de financiamento da TOTALENERGIES prevê a atribuição de 8 bolsas de estudo anuais, ou seja, 4 em Angola e 4 em França para os melhores alunos de cada liceu, a fim de prosseguirem os seus estudos superiores</p>

      <ul class="texto-0" style="text-align: justify;">
      <li>&#x203A; 190 alunos conseguiram uma bolsa de estuda para França desde 2011</li>
      <li>&#x203A; 170 alunos conseguiram uma bolsa de estudo para outros país desde 2011 ( África do Sul, Marrocos, Argélia, Rússia, Inglaterra, Portugal, Estados Unidos, Chile, Arábia Saudita, Escócia, Polônia, Turquia, Romênia, Brasil, Canadá, Burkina Faso, Cuba, República Tcheca, Hungria, Bélgica, Índia, Namíbia e Alemanha...).</li>
      <li>&#x203A; 256 alunos conseguiram uma bolsa de internaem Angola desde 2011</li>
      </ul>
    </div>

    <div class="col s12 m12 l4">
    <img src="/assets/imagens/bolsas_de_estudo.png" class="responsive-img" alt="">
    <p style="text-align: center; font-size: 14px;"> Direcção da TotalEnergies, Coordenador Nacional da Rede Eiffel, Director do Liceu Eiffel de Ondjiva durante a visita ao Liceu Eiffel de Ondjiva</p>
            
    </div>
    </div>
</div>

<div id="Disciplinas" class="tabcontent">
  <div class="row">
    <div class="col s12 m12 l6">
      <h5 class="">Outros Doadores de Bolsas</h5>
      <div class="borda-titulo-0"></div>
      <p class="texto-0" style="text-align: justify;">Outros doadores, parceiros, empresas ou organismos oferecem também cada ano bolsas de estudo em França</p>
      
      <ul class="texto-0" style="text-align: justify;">
      <li>&#x203A; INAGBE</li>
      <li>&#x203A; Sonangol</li>
      <li>&#x203A; Prezioso</li>
      <li>&#x203A; Schlumberger</li>
      <li>&#x203A; Grupo Castel</li>
        <li>&#x203A; As embaixadas</li>
      </ul>

      <p class="texto-0">Principais cursos escolhidos e orientação:</p>

      <ul class="texto-0">
      <li>&#x203A; Biologia e engenharia agroalimentar</li>
      <li>&#x203A; Engenharia de eletricidade industrial</li>
      <li>&#x203A; Engenharia de manutenção não industrial</li>
      <li>&#x203A; Engenharia de telecomunicações</li>
      <li>&#x203A; Engenharia mecânica e industrial</li>
      <li>&#x203A; Engenharia de produção de energia</li>
      <li>&#x203A; Engenharia química e de processos</li>
      <li>&#x203A; Engenharia térmica e Elétrica</li>
      <li>&#x203A; Logística e Transporte</li>
      </ul>

    
    </div>
    </div>
</div>

<div id="Francofonia" class="tabcontent">
  <div class="row">
    <div class="col s12 m12 l6">
      <h5 class="">Destaques</h5>
      <div class="borda-titulo-0"></div>
      
      <ul class="texto-0" style="text-align: justify;">
      
      <li>&#x203A; 2023 : 21 bolsas para França </li>
      <li>&#x203A; 2022 : 25 bolsas para França</li>
      <li>&#x203A; 2021 : 22 bolsas para França</li>
      <li>&#x203A; 2020 : 8 bolsas para França e 4 bolsas internas (Angola);</li>
      <li>&#x203A; 2019 : 54 bolsas TOTAL + 5 MIREMPETG + 4 bolsas internas (Angola)</li>
      <li>&#x203A; 2019 : 24 bolsas de estudos concedidas pelas Embaixadas (Rússia, China, Cuba, Japão, Portugal Romênia e Polónia)</li>
      <li>&#x203A; 2019 : 34 bolsas de estudo internas (INAGBE)</li>
      <li>&#x203A; Percentagem de entrada nas universidades Nacionais : 94 % principalmente na área das Engenharias;</li>
      <li>&#x203A; Mais de 1300 antigos alunos escolarizados no ensino superio</li>
      </ul>

    </div>

    <div class="col s12 m12 l4">
    <img src="./assets/img/19.png" class="responsive-img" alt="">
    <p style="text-align: center; font-size: 14px;"> Estudantes da Rede Eiffel e outras nacionalidades durante uma formação em França</p>
            

    </div>
    </div>
</div>

<div id="MissoesEducativas" class="tabcontent">
  <div class="row">
    <div class="col s12 m12 l6">
      <h5 class="">Critérios de Selecção</h5>
      <div class="borda-titulo-0"></div>
     
      <ul class="texto-0" style="text-align: justify;">
      
      <li>&#x203A; Fazer parte dos melhores alunos da Rede Eiffel</li>
        <li>&#x203A; Ter uma média geral igual ou superior a 14 valores;</li>
      <li>&#x203A; Ser titular do diploma de língua francesa DELF B1</li>
      <li>&#x203A; Aprovar no concurso de seleção ( provas escritas de matemática, física, química e inglês / provas orais com um júri francês)</li>
      <li>&#x203A; Ter um passaporte válido a partir da 11º Classe;</li>
     
      </ul>

    </div>

    <div class="col s12 m12 l4">
    <img src="/assets/imagens/criterio.webp" class="responsive-img" alt="">
    </div>
    </div>
</div>
        </div>
      </div>
    </div>
  </section>
@endsection
