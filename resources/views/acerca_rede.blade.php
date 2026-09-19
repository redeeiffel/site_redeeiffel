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
        <h5 class="title">Acerca da Rede Eiffel</h5>
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
            <div class="collapsible-header Roboto-Bold"><i class="material-icons">chevron_right</i>Cursos Propostos</div>
            <div class="collapsible-body Roboto-Regular">
            <p class="texto-0" style="text-align: justify;">  O curso proposto nos liceus Eiffel é ciências físicas e biológicas 
                    mas os liceus Eiffel oferecem também modelos diversificados de apoio 
                    educativo e outras actividades de ocupação dos tempos livres.
                      <img src="/assets/imagens/curso_proposto.JPG" class="responsive-img" alt="">
                      <p style="text-align: center; font-size: 14px;"> Estudantes do Liceu Nº 30 Eiffel de Cazengo durante uma prática no laboratório de biologia</p>
                
            </p>
                   
            </div>
            
          </li>

          <li>
            <div class="collapsible-header Roboto-Bold"><i class="material-icons">chevron_right</i> Finalidades e actividades de ocupação</div>
            <div class="collapsible-body Roboto-Regular">
              <p class="texto-0" style="text-align: justify;">
              As finalidades tem em vista a promoção da educação a três dimensões : 
             
            
                  </p>
                  <ul class="text-primary texto-0" style="text-align: justify;">
              <li>&rightarrow; Dimensão pessoal – desenvolvimento global e harmonioso da personalidade;</li>
              <li>&rightarrow; Dimensão das aquisições intelectuais - aquisição de um saber estruturado em domínios diversificados;</li>
              <li>&rightarrow; Dimensão para a cidadania – formação de cidadãos livres, conscientes e participativos; </li>
        
              </ul>
                  <p class="texto-0" style="text-align: justify;">
                  As actividades de ocupação propostas são: : 
              <ul class = "texto-0">
              <li style="color: black;"> &rightarrow;Actividades de enriquecimento curricular;</li>
                  <li style="color: black;">&rightarrow;Tempos de estudo orientado e dirigido;</li>
                  <li style="color: black;">&rightarrow;Actividades práticas laboratoriais em biologia, física, geologia, química e informática;</li>
                  <li style="color: black;">&rightarrow;Atividades de estudo/pesquisa, orientadas pelo professor titular da turma ou da disciplina nas Bibliotecas;</li>
                  <li style="color: black;">&rightarrow;Actividades desportivas inseridas no Desporto Escolar;</li>
                  <li style="color: black;">&rightarrow;Actividades de enriquecimento relacionadas com os Projectos e clubes existentes</li>
              </ul>
            
                  </p>
                
            </div>
          </li>



          <li>
            <div class="collapsible-header Roboto-Bold"><i class="material-icons">chevron_right</i> Dimensões educacionais visadas</div>
            <div class="collapsible-body Roboto-Regular">
              <p class="texto-0">
              <ul style="text-align: justify;" class="texto-0">
              <li style="color: black;">&rightarrow; A finalidade Socializadora;</li>
                  <li style="color: black;">&rightarrow;	A finalidade Personalizadora;</li>
                  <li style="color: black;">&rightarrow;	A finalidade Inclusiva;</li>
                  <li style="color: black;">&rightarrow;A finalidade Instrutiva</li>

                  <br>
                  <br>
                  <li>  <img src="/assets/imagens/metas_a_cumprir.jpg" class="responsive-img" alt="">
                    <p style="text-align: center; font-size: 14px;"> Estudantes do Liceu Nº 30 Eiffel de Cazengo durante uma prática no laboratório de biologia</p>
               </li>
              </ul>
            
            </p>

           
             

          
            </div>
          </li>
         

          <li>
            <div class="collapsible-header Roboto-Bold"><i class="material-icons">chevron_right</i>Serviços médicos</div>
            <div class="collapsible-body Roboto-Regular">
              <p class="texto-0" style="text-align: justify;">
              Todos os liceus possuiem uma enfermaria que tem como objetivo atender, no ambiente escolar, alunos e colaboradores, não só nos cuidados de primeiros socorros, mas também na prevenção de doenças. Cada enfermaria é um aposento que geralmente contém até dois leitos.
              </p>
            </div>
          </li>

          <li>
            <div class="collapsible-header Roboto-Bold"><i class="material-icons">chevron_right</i>  Os meios materiais</div>
            <div class="collapsible-body Roboto-Regular">
              <p class="texto-0" style="text-align: justify;">
              A construção dos liceus segue o mesmo modelo:  dois edifícios de primeiro andar que abrigam:
              <ul style="text-align: justify;" class="texto-0">
              <li style="color: black;">&rightarrow; 6 salas de aula;</li>
                  <li style="color: black;">&rightarrow;	3 (três) gabinetes (Direção Geral, Direção administrativa e Direção pedagógica);</li>
                  <li style="color: black;">&rightarrow;	1 (uma) enfermaria;</li>
                  <li style="color: black;">&rightarrow;1 (uma) biblioteca equipada;</li>
                  <li style="color: black;">&rightarrow;1 (uma) sala para os professores;</li>
                  <li style="color: black;">&rightarrow;1 (uma) sala de informática equipada;</li>
                  <li style="color: black;">&rightarrow;3 laboratórios apetrechados (Física, biologia e química);</li>
                  <li style="color: black;">&rightarrow;1 (uma) cantina escolar;</li>
                  <li  style="color: black;">&rightarrow;WC e balneares para os alunos;</li>
                    <li  style="color: black;">&rightarrow;WC e balneares para os professores;</li>
              </ul>
            </p>
            <p class="texto-0" style="text-align: justify;">
            Uma quadra desportiva multiuso e  um campo de futebol vem completar a estrutura física de cada liceu.
                     Por fim, cada liceu dispõe de uma acesso de qualidade a internet e de um gerador operacional que permite
                      assegurar a continuidade pedagógica em caso de interrupção da energia. 
            </p>

            
             

          
            </div>
          </li>

        </ul>
      </div>

      <div class="col s12 m12 l6"data-aos="fade-up" data-aos-delay="400">
        <ul class="collapsible popout">
          <li>
            <div class="collapsible-header Roboto-Bold"><i class="material-icons">chevron_right</i> Os meios humanos</div>
            <div class="collapsible-body Roboto-Regular">
            
              

              <p class="texto-0 negrito" style="text-align: justify;">Todos os liceus Eiffel funcionam da mesma forma graças as equipas
             capacitadas, motivadoras e muito comprometidas na formação dos alunos e nas funções que exercem  : </p>

<ul class="text-primary texto-0" style="text-align: justify;">
 
  <li>&rightarrow; 1 Director(a) geral</li>
  <li>&rightarrow; Subdirector(a) pedagógico(a)</li>
  <li>&rightarrow; 1 Subdirector(a) administrativo (a)</li>
  <li>&rightarrow; Uma equipa de mais ou menos 15 professores</li>
  <li>&rightarrow; Pessoal técnico e administrativo</li>
 
</ul>

<p class="texto-0 negrito" style="text-align: justify;">Os Professores dos Liceus Eiffel para além de competências científicas e profissionais são proativos; 
        eles transformam as actitudes dos alunos não por apenas ensinar conteúdos programáticos, mas reafirmam valores que facilitam 
        o desenvolvimento da sua formação integral. Para além da qualidade científica
        a e intelectual que são regularmente actualizadas sob o plano de formação continua, possuiem qualidades humanas e éticas. 
          </p>
   
            </div>
          </li>

          

          <li>
            <div class="collapsible-header Roboto-Bold"><i class="material-icons">chevron_right</i>  Os meios técnicos</div>
            <div class="collapsible-body Roboto-Regular">
              <p class="texto-0" style="text-align: justify;">
              Cada liceu possui os meios técnicos seguintes:
              </p>
              <ul class="text-primary texto-0" style="text-align: justify;">
 
 <li>&rightarrow;Acesso a internet por fibra óptica</li>
 <li>&rightarrow; Computadores nos laboratórios</li>
 <li>&rightarrow; 25 computadores na sala de informática</li>
 <li>&rightarrow; Tanque de 20.000 Litros, abastecido pela rede pública</li>
 <li>&rightarrow; Pessoal técnico e administrativo</li>
 <li>&rightarrow; Gerador</li>
 <li>&rightarrow; Material esportivo completo</li>
 <li>&rightarrow; Videoprojectores</li>
 <li>&rightarrow; Sala de visioconferência</li>

</ul>

            </div>
          </li>

          <li>
            <div class="collapsible-header Roboto-Bold"><i class="material-icons">chevron_right</i>Características Pedagógicas Relevantes</div>
            <div class="collapsible-body Roboto-Regular">
              <ul class="text-primary texto-0"  style="text-align: justify;">
                <li>&rightarrow;Ensino público totalmente gratuito incluindo os materiais de estudo e pesquisa;</li>
                <li>&rightarrow;24 alunos por turma; 2 turmas por classe (10ª, 11ª e 12ª classe) e por liceu;</li>
                <li>&rightarrow; Foco nas disciplinas as ciências exatas (matemática, física, química, biologia e geologia);</li>
                <li>&rightarrow;Ensino de duas línguas estrangeiras (francês e inglês);</li>
                <li>&rightarrow;Ensino bilingue(Português/Francês) nas disciplinas científicas;</li>
                <li>&rightarrow; 
                Formação contínua do corpo docente;      </li>
                <li>&rightarrow;
                Exames trimestrais nacionais;       </li>
                <li>&rightarrow;
                Programas de formação (planos curriculares) adaptados;    </li>
                <li>&rightarrow;
                Partilha de conhecimento e práticas de laboratório com escolas vizinhas;     </li>
                <li>&rightarrow;
                tribuição de bolsas de estudo em Angola e no estrangeiro aos melhores alunos desde 2011;    </li>
                <li>&rightarrow;
                Promoção do intercâmbio cultural França – Angola;      </li>
                <li>&rightarrow;
                Encontro anual de todos os finalistas: actividades lúdicas, culturais e pedagógicas;    </li>
                               
              </ul>
            </div>
          </li>
         
          <li>
            <div class="collapsible-header Roboto-Bold"><i class="material-icons">chevron_right</i>Horário de Funcionamento</div>
            <div class="collapsible-body Roboto-Regular">
              
            <p class ="texto-0" style="text-align: justify;">
            O regime de funcionamento dos diferentes liceus é definido pelos Acordos de Cooperação assinados em 2020 que preveem os
                  horários seguintes: 7h30 – 15h00 (um único turno) da segunda-feira a sexta-feira em regime de externato. 
                  Em função das especificidades de um liceu ou da província na qual se encontra,
                  os tempos de educação física podem ser ministrados ao sábado de manhã.
            </p>
            </div>
          </li>

          <li>
            <div class="collapsible-header Roboto-Bold"><i class="material-icons">chevron_right</i>Refeitórios</div>
            <div class="collapsible-body Roboto-Regular">
              <p class="texto-0" style="text-align: justify;">
              Os liceus Eiffel dispõem de um refeitório coberto que fornece refeições confecionadas na cozinha da escola. A cantina funciona no pátio do liceu e atende aos alunos em horários especiais e nos intervalos de aulas, fornecendo lanches, refrescos, refrigerantes, salgados e doces, de esmerada confecção e boa qualidade de ingredientes
              </p>
            </div>
          </li>
         
        </ul>
      </div>
    </div>
  </div>
</section>


@endsection
