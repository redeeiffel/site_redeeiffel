@extends('layouts.main')
@section('content')


<style>
  .card-panel {
    padding: 10px !important;
    background-color: #048bcfd0;
    margin: 0;
  }

  p {
    text-align: justify;
  }
</style>

<section class="banner-other">
  <div class="container">
    <div class="row">
      <div class="col s12 white-text" data-aos="fade-up" data-aos-delay="100">
        <h5 class="title">Sobre nós</h5>
      </div>
    </div>
  </div>
</section>

<section class="my-5">
  <div class="container">
    <div class="row" data-aos="fade-up" data-aos-delay="400">
      <div class="col s12 m12 l12">


        <div class="tab">
          <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Início da Rede Eiffel</button>
          <button class="tablinks" onclick="openCity(event, 'Paris')">Escolha do nome</button>
          <button class="tablinks" onclick="openCity(event, 'GestaoRede')">Gestão da Rede Eiffel</button>
          <button class="tablinks" onclick="openCity(event, 'Tokyo')">Perspectivas da Rede Eiffel</button>
          <button class="tablinks" onclick="openCity(event, 'Historico')">Histórico da Rede Eiffel</button>
          <button class="tablinks" onclick="openCity(event, 'Angola')">Pontos Fortes da Rede Eiffel</button>
        </div>

        <div id="London" class="tabcontent">
          <section>
            <div class="">
              <div class="row">
                <div class="col s12 l12" data-aos="fade-up" data-aos-delay="100">
                  <h5 class="negrito">INÍCIO DA REDE EIFFEL</h5>
                  <div class="borda-titulo-0"></div>
                </div>
              </div>

              <div class="row">
                <div class="col s12 m6 l6" data-aos="fade-up" data-aos-delay="100">
                  <p class="texto-0">
                    A rede Eiffel é uma rede de quatro liceus científicos públicos gratuitos que nasceu de uma parceria assinada a 23 de Maio de 2008 entre o Governo angolano, a empresa petrolífera TotalEnergies e a Missão Laica Francesa com o objectivo de formar quadros qualificados e melhorar a qualidade de ensino secundário em Angola
                  </p>
                </div>

                <div class="col s12 m6 l4" data-aos="fade-up" data-aos-delay="200">
                  <img src="assets/img/estudantes.JPG" class="responsive-img" alt="">
                  <p style="text-align: center; font-size: 14px;"> Estudantes do Liceu Nº30 Eiffel de Cazengo</p>
            
                </div>

              </div>

            </div>
          </section>
        </div>

        <div id="Paris" class="tabcontent">
          <section class="white">
            <div class="">
              <div class="row m-0">
                <div class="col s12 l12" data-aos="fade-up" data-aos-delay="200">
                  <h5 class="negrito">A ESCOLHA DO NOME</h5>
                  <div class="borda-titulo-0"></div>
                </div>
              </div>

              <div class="row">

              <div class="col s12 m6 l6" data-aos="fade-up" data-aos-delay="100">
                  <p class="texto-0">
                    A escolha do nome mereceu um cuidado especial tendo como base o mundo científico. Com efeito, o nome escolhido –Eiffel- é o apelido do célebre engenheiro e arquitecto francês Gustave Eiffel (1832-1923). Especialista em estruturas metálicas, cujas extraordinárias obras são conhecidas um pouco por todo mundo e em particular em Angola, onde se encontra o famoso palácio de ferro "Eiffeliano", da auditoria de um dos seus alunos. O exemplo mais famoso do seus trabalhos espelhados pelo mundo é a famosa torre Eiffel de Paris.
                  </p>
                </div>

                <div class="col s12 m6 l4" data-aos="fade-up" data-aos-delay="100">
                  <img src="assets/img/sobre/torre-eiffel.jpeg" class="responsive-img" alt="">
                </div>

              </div>

            </div>
          </section>
        </div>

        <div id="GestaoRede" class="tabcontent">
          <section>
            <div class="">
              <div class="row">
                <div class="col s12 m12 l12" data-aos="fade-up" data-aos-delay="200">
                  <p class="texto-0">
                    A gestão e a supervisão dos liceus Eiffel é feita por um agente francês titular da Missão Laica francesa que exerce o cargo de Coordenador Nacional da Rede Eiffel. As acções primordiais da Missão Laica francesa são:
                  </p>
                </div>
              </div>

              <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col s12 m12 l6">
                  <div class="row">
                    <div class="col s6">
                    </div>
                  </div>

                  <div class="row texto-0">
                    <div class="col s12">
                      <h6 class="top-title text-color-1 negrito"><span class="fa fa-chevron-right"></span> Gestão rigorosa e global liceus</h6>
                    </div>
              
                  </div>

                  <div class="row">
                    <div class="col s12">
                      <h6 class="top-title text-color-1 negrito"><span class="fa fa-chevron-right"></span> Conceção, adaptação e controle dos programas de formação</h6>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col s12">
                      <h6 class="top-title text-color-1 negrito"><span class="fa fa-chevron-right"></span> Engenharia pedagógica</h6>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col s12">
                      <h6 class="top-title text-color-1 negrito"><span class="fa fa-chevron-right"></span> Inspeções dos professores, entrevistas individualizadas</h6>
                    </div>
                   
                  </div>

                  <div class="row">
                    <div class="col s12">
                      <h6 class="top-title text-color-1 negrito"><span class="fa fa-chevron-right"></span> Formação contínua dos corpos docentes</h6>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col s12">
                      <h6 class="top-title text-color-1 negrito"><span class="fa fa-chevron-right"></span> Seminários de capacitação para o corpo docente e Directivo a nível nacional</h6>
                    </div>
                  </div>

                </div>

                <div class="col m12 l4">
                  <img src="./assets/img/vida1.JPG" class="responsive-img" alt="">
                  <p style="text-align: center; font-size: 14px;"> Coordenador Nacional da Rede Eiffel, Equipe do Liceu Nº397 Eiffel do Dande, Embaixada de França em Angola <br> Projecto Minha água, Minha vida</p>
            
                </div>
              </div>

            </div>
          </section>
        </div>

        <div id="Tokyo" class="tabcontent">
          <section class="">

            <div class="">
              <div class="row">
                <div class="col s12 m12 l12" data-aos="fade-up" data-aos-delay="100">
                  <h5 class="negrito">PERSPECTIVAS DA REDE EIFFEL</h5>
                  <p class="Roboto-Regular texto-0">Três perspectivas para a Rede Eiffel foram destacadas para os três próximos anos:</p>
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col s12 m6 l4" data-aos="fade-up" data-aos-delay="100">
                <div class="">
                  <div class="row">
                    <div class="col s12">
                      <h6 class="negrito texto-2" style="text-align: center;">1º</h6>
                      <p class="Roboto-Regular texto-0">
                        Transformar os liceus Eiffel em estabelecimentos modelos para as aulas práticas de formação de docentes, com vista a expandir os métodos e rigor implementados nestes liceus para outros estabelecimentos de ensino, reforçando o nível de educação científica.
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col s12 m6 l4" data-aos="fade-up" data-aos-delay="200">
                <div class="">
                  <div class="row">
                    <div class="col s12">
                      <h6 class="negrito texto-2" style="text-align: center;">2º</h6>
                      <p class="Roboto-Regular texto-0">
                        Concentrar esforços na formação contínua de docentes, equipa administrativa e direcção para uma melhor orientação dos alunos no fim do curso.
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col s12 m12 l4" data-aos="fade-up" data-aos-delay="300">
                <div class="">
                  <div class="row">
                    <div class="col s12 m10">
                      <h6 class="negrito texto-2" style="text-align: center;">3º</h6>
                      <p class="Roboto-Regular texto-0">
                        Perpetuar a experiência da Rede Eiffel nos estabelecimentos angolanos, geminando o currículo das Liceus Eiffel com outros estabelecimentos de ensino.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>

        <div id="Historico" class="tabcontent">
          <section class="">

            <div class="row">
              <div class="col s12 m12 l12" data-aos="fade-up" data-aos-delay="100">
                <h5 class="negrito">HISTÓRICO DA REDE EIFFEL</h5>
                <div class="borda-titulo-0"></div>
              </div>
            </div>

            <div class="row">
              <div class="col s12 m6 l6" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                  <div class="col s12">
                    <h6 class="negrito">2008</h6>
                    <p class="texto-0">Acordos de cooperação educativa assinados entre 3 signatários: Ministério da Educação, empresa TOTAL Angola, Missão Laica francesa. Construção dos quatro liceus.
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <h6 class="negrito">2009</h6>
                    <p class="texto-0">Crescimento progressivo, recrutamento do corpo docente e directivo.
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <h6 class="negrito">2012</h6>
                    <p class="texto-0">
                      Novo sistema de avaliação dos alunos e dos professores (Provas comuns trimestrais)
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <h6 class="negrito">2013</h6>
                    <p class="texto-0">
                      Formação contínua dos professores. Trabalho sobre os programas de formação.
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <h6 class="negrito">2014</h6>
                    <p class="texto-0">
                      Prorrogação dos acordos de Cooperação (Adenda 2). Formação dos Directores adjuntos. Transferência das experiênciais adquiridas para outras instituições do MED. Desenvolvimento das actividades de laboratórios e das avaliações dos alunos sobre competências predefinidas.
                    </p>
                  </div>
                </div>

              </div>

              <div class="col s12 m12 l6" data-aos="fade-up" data-aos-delay="300">
                <div class="row">
                  <div class="col s12">
                    <h6 class="negrito">2015</h6>
                    <p class="texto-0">
                      Instauração do exame francês do DELF para todos os finalistas. Início do ensino bilingue Português/francês.
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <h6 class="negrito">2017</h6>
                    <p class="texto-0">
                      Prorrogação dos acordos de Cooperação (Adenda 3 com a integração de um novo parceiro : a Embaixada de França em Angola). Obtenção do selo internacional LabelFrancEducation. Nacionalização dos cargos de Directores Gerais dos liceus.
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <h6 class="negrito">2018</h6>
                    <p class="texto-0">
                      A rede Eiffel integra a Rede dos liceus associados a UNESCO. Nomeação de Coordenadores de disciplinas angolanos. Nacionalização dos cargos de Direção.
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <h6 class="negrito">2020</h6>
                    <p class="texto-0">
                      A rede Eiffel integra a Rede dos liceus associados a UNESCO. Nomeação de Coordenadores de disciplinas angolanos. Nacionalização dos cargos de Direção.
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <h6 class="negrito">2023</h6>
                    <p class="texto-0">
                      Nomeação de professores coordenadores formadores de disciplinas. </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <h6 class="negrito">2024</h6>
                    <p class="texto-0">
                     Renovação dos acordos de cooperação entre 4 signatários: Ministério da Educação, empresa TOTALENERGIES, Embaixada de França e a Missão Laica francesa. Construção de dois novos liceus nas provincias de Huambo e Moxico.</p>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <h6 class="negrito">2025</h6>
                    <p class="texto-0">
                     Inauguração de dois novos liceus nas provincias de Huambo e Moxico.</p>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>


        
        <div id="Angola" class="tabcontent">
          <section class="white">
            <div class="">
              <div class="row m-0">
                <div class="col s12 l12" data-aos="fade-up" data-aos-delay="200">
                  <h5 class="negrito">OS PONTOS FORTES DA REDE EIFFEL</h5>
                  <div class="borda-titulo-0"></div>
                </div>
              </div>

              <div class="row">

              <div class="col s12 m6 l6" data-aos="fade-up" data-aos-delay="100">
                  <p class="texto-0">
                    <ul class="texto-0">
                      <li>&rightarrow; A corresponsabilização dos alunos, designadamente da associação de estudantes, nas decisões que lhes dizem respeito, com impacto no desenvolvimento de uma cidadania responsável e democrática;</li>
                      <li>&rightarrow; A reputação e a imagem dos liceus Eiffel;</li>
                      <li>&rightarrow; Os excelentes resultados obtidos inclusivo no sistema universitário;</li>
                      <li>&rightarrow; O envolvimento e o apoio dos diferentes parceiros;</li>
                      <li>&rightarrow; A força de pertencer a uma rede com uma uniformização geral do funcionamento;</li>
                      <li>&rightarrow; 
                    A qualidade e a fiabilidade do processo avaliativo;
                      </li>
                      <li>&rightarrow;
                    As taxas de entradas nas universidades Nacionais e internacionais;
                      </li>
                      <li>&rightarrow;
                    A criação de uma plataforma digital, verdadeira ferramenta de partilha entre professores no meio da Rede;
                      </li>
                      <li>&rightarrow;
                    A valorização da dimensão científica transversal nos diferentes níveis de ensino;
                      </li>
                      <li>&rightarrow;
                    As taxas de transição/conclusão no Ensino Secundário;
                      </li>
                      <li>&rightarrow;
                    O bom clima escolar traduzido no bom relacionamento interpessoal;
                      </li>
                      <li>&rightarrow;
                    Os dispositivos de monitorização dos resultados do sucesso e insucesso escolares, implementados de forma mais criteriosa;
                      </li>
                      <li>&rightarrow;
                    A qualidade da oferta formativa, visando a formação integral dos alunos;
                      </li>
                      <li>&rightarrow;
                    As dinâmicas existentes para apoio e integração dos alunos;
                      </li>
                      <li>&rightarrow;
                    O empenho, cooperação e sentido de pertença dos docentes, funcionários, pais e alunos;
                      </li>
                      <li>&rightarrow;
                    A geminação (parceria) com o liceu francês de Luanda;
                      </li>                
                    </ul>       </p>
                </div>

                <div class="col s12 m6 l4" data-aos="fade-up" data-aos-delay="100" style="margin-left: -100px;">
                  <img src="/assets/imagens/rede_eiffel.png" style="height: 500px; width: 1000px;" class="responsive-img" alt="">
                </div>
                
              </div>

            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
