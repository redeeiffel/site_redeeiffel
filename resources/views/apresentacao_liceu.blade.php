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
        <h5 class="title">Apresentação dos liceus</h5>
      </div>
    </div>
  </div>
</section>


<section class="my-5">
  <div class="container">
    <div class="row" data-aos="fade-up" data-aos-delay="400">
      <div class="col s12 m12 l12">


        <div class="tab">
          <button class="tablinks" onclick="openCity(event, 'Angola')" id="defaultOpen">Seis Liceus</button>
          <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Objectivo</button>
          <button class="tablinks" onclick="openCity(event, 'Paris')">Origem e Significado</button>
          <button class="tablinks" onclick="openCity(event, 'Tokyo')">Metas a Cumprir</button>
        </div>

        
        <div id="Angola" class="tabcontent">
          <section>
            <div class="">
              <div class="row">
               
              </div>

              <div class="row">
                

                <div data-aos="fade-up" data-aos-delay="200" class="center">
                  <img src="/assets/novo_mapa.jpg" class="responsive-img" alt="" style="width: 500px; height: 500px;">
                </div>

              </div>

            </div>
          </section>
        </div>


        <div id="London" class="tabcontent">
          <section>
            <div class="">
              <div class="row">
               
              </div>

              <div class="row">
                <div class="col s12 m6 l6" data-aos="fade-up" data-aos-delay="100">
                  <p class="texto-0">
                    Inspirados em Comenius, pedagogo do século XVII que propôs um sistema articulado de ensino, reconhecendo o igual direito de todos os homens ao saber, os liceus Eiffel pretendem ser escolas de referência pela qualidade da sua intervenção no desenvolvimento da comunidade onde se inserem, valorizando o saber e a exigência, traçando percursos diversificados, fontes de valores humanistas, interessado em preparar os alunos para se tornarem cidadãos e cidadãs do futuro, assente na máxima "Ensinar tudo a todos"   </p>
                </div>

                <div class="col s12 m6 l4" data-aos="fade-up" data-aos-delay="200">
                  <img src="/assets/imagens/OBJECTIVO.JPG" class="responsive-img" alt="">
                  <p style="text-align: center; font-size: 14px;"> Estudantes do Liceu Nº 44 Eiffel de Malanje</p>
            
                </div>

              </div>

            </div>
          </section>
        </div>
      

        <div id="Paris" class="tabcontent">
          <section class="white">
            <div class="">
              <div class="row m-0">
              
              </div>

              <div class="row">

              <div class="col s12 m6 l6" data-aos="fade-up" data-aos-delay="100">
                  <p class="texto-0">
                    O símbolo da Rede Eiffel traduz, de forma icónica, a nossa missão: a torre Eiffel encima de um livro, símbolo do saber, obstinação e rigor, a torre Eiffel expressa a elevação/ascensão e vigor do conhecimento, da ciência e sabedoria, consubstanciado no crescimento integral de cada indivíduo, de forma gradual e sustentada.Esta torre do conhecimento encontra-se encimada pelo globo terrestre símbolo dum mundo em permanente evolução destacando a vermelho Angola como país. A rede Eiffel assenta a sua linha de ação neste mesmo exemplo: o ciclo evolutivo e renovador do processo ensino-aprendizagem só se constrói com base na periódica mutação de atitudes e comportamentos que conduzirá a novos caminhos, novas etapas.Cada ser aprendente, renova-se a cada instante, semeando talentos, cumprindo etapas, para que a colheita seja profícua e de forma integral.   </p>
                </div>

                <div class="col s12 m6 l4" data-aos="fade-up" data-aos-delay="100">
                  <img src="/assets/imagens/origem_.JPG" class="responsive-img" alt="">
                   <p style="text-align: center; font-size: 14px;"> Estudantes do Liceu Eiffel de Ondjiva</p>
            
                </div>

              </div>

            </div>
          </section>
        </div>


        
        <div id="Tokyo" class="tabcontent">
          <section class="white">
            <div class="">
              <div class="row m-0">
              
              </div>

              <div class="row">

              <div class="col s12 m6 l6" data-aos="fade-up" data-aos-delay="100">
                  <p class="texto-0">
                    Desta forma, a Rede Eiffel presta um serviço público de educação, apoiado em quatro pilares - aprender a conhecer, aprender a fazer, aprender a viver em comunidade e aprender a ser, com vista à formação de cidadãos autónomos e interventivos, capazes de se adaptar a novos desafios sociais, numa perspetiva de aprendizagem ao longo da vida. A adaptação à mudança, à construção de aprendizagens pessoais, ao desenvolvimento afetivo e comportamental, à articulação das atividades escolares com o meio e o mundo do trabalho são também áreas a privilegiar assim como a associação entre as liberdades individuais, a dimensão curricular, a integração no mundo do trabalho e/ou o prosseguimento de estudos.  </p>
                </div>

                <div class="col s12 m6 l4" data-aos="fade-up" data-aos-delay="100">
                  <img src="/assets/imagens/metas_a_cumprir.jpg" class="responsive-img" alt="">
                  <p style="text-align: center; font-size: 14px;"> Estudantes do Liceu Nº 30 Eiffel de Cazengo durante uma prática no laboratório de biologia</p>
            
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
