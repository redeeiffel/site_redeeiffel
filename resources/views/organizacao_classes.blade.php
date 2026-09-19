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
        <h5 class="title">Organização das Classes</h5>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row mt-5" data-aos="fade-up" data-aos-delay="100">
      <div class="col s12 m12 l12">

        <div class="tab">
          <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Turmas</button>
          <button class="tablinks" onclick="openCity(event, 'Paris')">Horário de Funcionamento</button>
          <button class="tablinks" onclick="openCity(event, 'Tokyo')">Os Horários dos Alunos</button>
          <button class="tablinks" onclick="openCity(event, 'Disciplinas')">As disciplinas</button>
          <button class="tablinks" onclick="openCity(event, 'Francofonia')">Dia da Francofonia</button>
          <button class="tablinks" onclick="openCity(event, 'MissoesEducativas')">Missões Educativas</button>
        </div>

        <div id="London" class="tabcontent">
          <div class="row">
            <div class="col s12 m12 l6">
              <h5 class="negrito">Turmas</h5>
              <div class="borda-titulo-0"></div>
              <p class="texto-0" style="text-align: justify;">Cada liceu possui 6 turmas divididas da seguinte forma:</p>
            

              <table class="texto-0 striped">
                <tbody>
                  <tr>
                    <td> > 2 turmas para as décimas classes</td>
                  </tr>
                  <tr>
                    <td> > 2 turmas para as décimas primeiras classes</td>
                  </tr>
                  <tr>
                    <td> > 2 turmas para as décimas segundas classes</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="col s12 m12 l4">
              <img src="/assets/imagens/turmas.jpg" class="responsive-img" alt="">
              <p style="text-align: center; font-size: 14px;"> Estudantes do Liceu Nº 44 Eiffel Malanje na sala de aula</p>
            
            </div>
          </div>

        </div>

        <div id="Paris" class="tabcontent">
          <div class="row">
            <div class="col s12 m12 l6">
              <h5 class="negrito">Horário de Funcionamento</h5>
              <div class="borda-titulo-0"></div>
              <p class="texto-0" style="text-align: justify;">Os Liceus Eiffel abrem as suas portas a partir das 7 horas e 30 minutos e encerram às 15 horas e 30 minutos, podendo o estudante permanecer no 
              recinto escolar até às 18 horas no caso de revisões ou investigações de trabalhos. O número de alunos por turma cumpre o rácio padrão de 25 e facilita o ensino de qualidade;</p>

              <ul class="texto-0" style="text-align: justify;">
                <li>&#x203A; Os estudantes trabalham regularmente em pares e grupos de estudo com maior número</li>
                <li>&#x203A; Os estudantes com maior domínio numa disciplina ajudam os outros</li>
                <li>&#x203A; Está constituída por eleição uma Associação dos estudantes que vela pelo interesse da estudante face a Direcção do Liceu</li>
              </ul>
            </div>

            <div class="col s12 m12 l4">
              <img src="/assets/imagens/Horario_funcionamento.jpg" class="responsive-img" alt="">
              <p style="text-align: center; font-size: 14px;"> Estudantes do Liceu Nº 30 Eiffel de Cazengo no cantina do liceu.</p>
            
            </div>
          </div>


        </div>

        <div id="Tokyo" class="tabcontent">
          <div class="row">
            <div class="col s12 m12 l6">
              <h5 class="negrito">Os Horários dos Alunos</h5>
              <p class="texto-0 texto-justificado" style="text-align: justify;">Os horários dos Liceus Eiffel são elaborados de acordo com o disposto no Estatuto do Ministério da 
              Educação e o calendário anual da Rede Eiffel, sabendo-se que o estudante tem o direito a usufruir de um horário escolar adequado ao ano frequentado, 
              bem como de uma planificação equilibrada das actividades curriculares e extracurriculares, nomeadamente as que contribuem para o
              desenvolvimento cultural da comunidade. Neste sentido, resulta que, por regra, os estudantes entrem às 07 horas e 30 minutos e saiam às 15 horas e 30 minutos, 
              estabelecendo-se 1 hora para o almoço. O horário vem anualmente especificado no Projecto Curricular da Coordenação Nacional da Rede Eiffel.
              Contamos assim que cada tempo de aula tem uma duração de 50 minutos. Apesar de não incorporados nos horários normais no fim de cada dia lectivo, os 
              estudantes cumprem regularmente com as tarefas de limpeza e higiene das suas salas de aulas, coordenados pelos responsáveis pela higiene das suas turmas.</p>
            </div>

            <div class="col s12 m12 l4">
              <img src="/assets/imagens/horario_alunos.jpg" class="responsive-img" alt="">
              <p style="text-align: center; font-size: 14px;"> Estudantes do Liceu Eiffel de Ondjiva durante a parada(formatura)</p>
            
            </div>
          </div>
        </div>

        <div id="Disciplinas" class="tabcontent">
          <div class="row">
            <div class="col s12 m12 l6">
              <h5 class="negrito">As disciplinas</h5>
              <p class="texto-0">As disciplinas leccionadas são</p>

              <table class="striped">
                <tbody class="texto-0">

                <li class="texto-0"> Biologia</li>
                <li class="texto-0"> Ciências em francês (DNL)</li>
                <li class="texto-0"> Educação física</li>
                <li class="texto-0"> Física</li>
                <li class="texto-0"> Filosofia</li>
                <li class="texto-0"> Geologia</li>
                <li class="texto-0"> Informática</li>
                <li class="texto-0"> Língua portuguesa</li>
                <li class="texto-0"> Língua francesa</li>
                <li class="texto-0"> Língua inglesa</li>
                <li class="texto-0"> Matemática</li>
                <li class="texto-0"> Química</li>
                 <li class="texto-0"> Geometria descritiva</li>
                    
               
                   
                </tbody>
              </table>

             

            </div>
            <div class="col s12 m12 l4">
              <!-- <img src="./assets/img/17.jpg" class="responsive-img" alt=""> -->
            
               <p class="texto-0" style="text-align: justify;">Para facilitar o melhor rendimento escolar dos estudantes nas disciplinas científicas, a Rede Eiffel inscreveu nos horários lectivos os tempos de Estudos Dirigidos, com a seguinte carga:</p>

              <ul style="text-align: justify;" class="texto-0">
                <li>&#x203A; 3 tempos por semana para o nível da 10.ª classe, para a disciplina de Química</li>
                <li>&#x203A; 1 tempo por semana para o nível da 11.ª classe, para a disciplina de Matemática</li>
                <li>&#x203A; 1 tempo por semana para o nível da 12.ª classe, para a disciplina de Física</li>
              </ul>

              <p class="texto-0" style="text-align: justify;">As disciplinas linguísticas de francês e inglês são obrigatórias, inscritas numa carga horária de 3 tempos semanais para o de inglês, e 5 tempos para de francês.
              O volume de tempos consagrados à disciplina de francês, releva da ampliação do nível dos formandos para a realização das provas do exame internacional do DELF -DALF, e 
              tendo passado do grau de A1 em 2014, de A2 para 2015, e agora de B1 desde 2020, segundo o quadro de cooperação com a Embaixada da França em Angola.</p>

            </div>
          </div>
        </div>

        <div id="Francofonia" class="tabcontent">
          <div class="row">
            <div class="col s12 m12 l6">
              <h5 class="negrito">Dia da Francofonia</h5>
              <p class="texto-0" style="text-align: justify;">Desde 2014, anualmente, os liceus organizam as celebrações internacionais da francofonia, no mês de Março, realizando actividades culturais, 
                contando com a participação das escolas vizinhas, e o convite de entidades 
                oficiais do Governo provincial, da Educação, da Saúde, e dos órgãos
                 de Comunicação social que são a TPA e a Rádio. Estas celebrações,
                  para além do seu foco que consiste na valorização da língua francesa,
                   baseiam-se na promoção dos valores da Francofonia, que são a liberdade, a
                    democracia, os direitos individuais e a diversidade cultural.</p>

                    <p class="texto-0" style="text-align: justify;"> O jornal da francofonia é publicado anualmente pelo professor, coordenador, formador de FLE 
                    e é transmitido e partilhado com todos os parceiros no final do mês de março.  <a href="/assets/jornal.pdf" target="_blank"> Clique aqui para visualizar o jornal da francofonia 2023/2024</a>

                    
                   
                    </p>

            </div>

            <div class="col s12 m12 l3">
              <img src="./assets/img/2.jpg" class="responsive-img" alt="">
              <p style="text-align: center; font-size: 14px;"> Actividade da Francofonia no Liceu Nº 30 Eiffel de Cazengo</p>
            
            </div>
          </div>
        </div>

        <div id="MissoesEducativas" class="tabcontent">
          <div class="row">
            <div class="col s12 m12 l6">
              <h5 class="negrito">Missões Educativas</h5>
              <p class="texto-0" style="text-align: justify;">Para além da implementação de projectos socíais com foco à comunidade proxíma aos liceus, uma das suas tarefas pedagógicas normais, podemos realçar as seguintes particularidades, e bem próprias às missões educativas dos Liceus Eiffel:</p>

                <li style="text-align: justify;" class="texto-0"> Ensino de disciplinas bilingues de ciências, 
                  dita uma pedagogia integrada, comportando o desenvolvimento
                   de duas cadeiras, sendo uma linguística (língua francesa, 
                   com o auxílio e a colaboração do professor da referida 
                   disciplina para acatar os aspectos próprios à língua);
                    outra, de ciência, exigindo uma previa preparação entre 
                    as duas autoridades professorais
                </li style="text-align: justify;">

                <li style="text-align: justify;" class="texto-0">
                A abertura das aulas de Francês Língua Estrangeira com foco à comunicação, ao público em geral, e funcionando desta forma como Centros da Aliança francesa de Luanda;
                
                </li>

                <li style="text-align: justify;" class="texto-0">
                A disponibilidade de professores dos liceus Eiffel, pela qualidade das suas formações e experiências, de prestar ajuda às outras escolas da cidade ou do país;
                 
                </li>
              
                  
               

                  
                  
               
           

            </div>

            <div class="col s12 m12 l4">
              <img src="/assets/imagens/missao_educativa.png" class="responsive-img" alt="">
              <p style="text-align: center; font-size: 14px;"> Direção da TotalEnergies, professor de biologia, durante a visita ao Liceu Eiffel de Ondjiva</p>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection
