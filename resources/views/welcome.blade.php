@extends('layouts.main')
@section('content')

<section>
      <div class="slider">
        <ul class="slides">
        @foreach( $slides as $slide) 

          <li>
            <img src="media/slide/{{$slide->fotografia}}" style="" alt="">
            <div class="caption left-align espaco-m-top-2">
              <h1 class="Roboto-Black">{{$slide->titulo_um}}</h1>
              <h5 class="font_logo  Roboto-Regular" id="titulo_dois">{{$slide->titulo_dois}}</h5>
              <p>
                <a href="{{$slide->link_botao}}"
                  class="btn btn-outline-light transparent btn-large z-depth-0 borda-1 Roboto-Bold"><span
                  class="fa fa-edit"></span> {{$slide->titulo_botao}}
                </a>
              </p>
            </div>
          </li>
          @endforeach  

        </ul>
      </div>
    </section>

    <section class="white espaco-m-top-1 py-5">
      <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col s12">
            <p><span class="fa fa-handshake transparent-text texto-5"></span> </p>
            <h5>NOSSOS<span class="negrito"> PARCEIROS</span></h5>
            <div class="borda-titulo-0"></div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col s12 m4 l3" data-aos="fade-up" data-aos-delay="100">
            <a href="https://governo.gov.ao/" target="_blank" class="center">
              <div class="boxCategoria z-depth-2 borda-2">
                <div class="child">
                  <img src="/assets/img/parceiros/images.jpeg" class="responsive-img" alt="">
                </div>
              </div>
              <h6>Ministério da Educação</h6>
            </a>
          </div>

          <div class="col s12 m4 l3" data-aos="fade-up" data-aos-delay="200">
            <a href="https://totalenergies.com/" target="_blank" class="center">
              <div class="boxCategoria z-depth-2 borda-2">
                <div class="child">
                  <img src="/assets/img/parceiros/totalenergies-logo.png" class="responsive-img" alt="">
                </div>
              </div>
              <h6>Total Energies</h6>
            </a>
          </div>

          <div class="col s12 m4 l3" data-aos="fade-up" data-aos-delay="300">
            <a href="https://www.mlfmonde.org/" target="_blank" class="center">
              <div class="boxCategoria z-depth-2 borda-2">
                <div class="child">
                  <img src="/assets/img/parceiros/Imagem1.png" class="responsive-img" alt="">
                </div>
              </div>
              <h6>Missão Laica Francesa</h6>
            </a>
          </div>

          <div class="col s12 m4 l3" data-aos="fade-up" data-aos-delay="400">
            <a href="https://ao.ambafrance.org/-Embaixada-de-Franca-em-Luanda-" target="_blank" class="center">
              <div class="boxCategoria z-depth-2 borda-2">
                <div class="child">
                  <img src="/assets/img/parceiros/embaixada-logo.jpg" class="responsive-img" alt="">
                </div>
              </div>
              <h6>Embaixada de França</h6>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col s12 l12" data-aos="fade-up" data-aos-delay="100">
            <h5>ACESSO <span class="negrito">RÁPIDO</span></h5>
            <div class="borda-titulo-0"></div>
          </div>
        </div>

        <div class="row">
          <div class="col s12 m12 l2 mt-3" data-aos="fade-up" data-aos-delay="100">
            <div class="center linha-top-30">
              <a href="{{ route('comentarios') }}" class="boxCategoria orange lighten-1 z-depth-2 borda-2 white-text"><span
                  class="bi bi-chat-dots texto-5"></span></a>
              <p><a href="./comentarios.html" class="mt-5 negrito">Comentários recentes</a></p>
            </div>
          </div>

          <div class="col s12 m12 l2 mt-3" data-aos="fade-up" data-aos-delay="100">
            <div class="center linha-top-30">
              <a href="{{ route('inscricoes') }}" class="boxCategoria green  z-depth-2 borda-2 white-text"><span
                  class="bi bi-pencil-square texto-5"></span></a>
              <p><a href="{{ route('inscricoes') }}" class="mt-5 negrito">Inscrição</a></p>
            </div>
          </div>

          <div class="col s12 m12 l2 mt-3" data-aos="fade-up" data-aos-delay="200">
            <div class="center linha-top-30">
              <a href="{{ route('galerias') }}" class="boxCategoria light-green darken-1 z-depth-2 borda-2 white-text"><span
                  class="fa fa-file-image texto-5"></span></a>
              <p><a href="{{ route('galerias') }}" class="mt-5 negrito">Galeria</a></p>
            </div>
          </div>

          <div class="col s12 m12 l2 mt-3" data-aos="fade-up" data-aos-delay="200">
            <div class="center linha-top-30">
              <a href="{{ route('apresentacao_liceu') }}"
                class="boxCategoria light-blue darken-2 z-depth-2 borda-2 white-text"><span
                  class="bi bi-pin-map texto-5"></span></a>
              <p><a href="./assets/img/mapa-liceus.png" class="mt-5 negrito">Liceus</a></p>
            </div>
          </div>

          <div class="col s12 m12 l2 mt-3" data-aos="fade-up" data-aos-delay="400">
            <div class="center linha-top-30">
              <a href="{{ route('projecto_educacional') }}" class="boxCategoria teal darken-3 z-depth-2 borda-2 white-text"><span
                  class="bi bi-bar-chart texto-5"></span></a>
              <p><a href="{{ route('projecto_educacional') }}" class="mt-5 negrito">Projectos</a></p>
            </div>
          </div>
          <div class="col s12 m12 l2 mt-3" data-aos="fade-up" data-aos-delay="400">
            <div class="center linha-top-30">
              <a href="{{ route('fale_conosco') }}" class="boxCategoria pink darken-4 z-depth-2 borda-2 white-text"><span
                  class="bi bi-headset texto-5"></span></a>
              <p><a href="{{ route('fale_conosco') }}" class="mt-5 negrito">Fale connosco</a></p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="white py-3" data-aos="fade-up" data-aos-delay="200">
      <div class="container">
        <div class="row">
          <div class="col s12 l12">
            <h5>ÚLTIMAS <span class="negrito">NOTÍCIAS</span>

              <a href="{{ route('noticias') }}"
                class="btn transparent grey-text text-darken-3 borda-1 right btn-outline-dark"><span
                  class="fa fa-chevron-right"></span> Ver todas</a>
            </h5>
            <div class="borda-titulo-0"></div>
          </div>
        </div>

        <div class="row" >
         
        @foreach( $noticias as $noticia) 
        
        <div class="col s12 m4 l6" data-aos="fade-up" data-aos-delay="100" id = "noticias ">
          <div class="card z-depth-0">
            <div class="card-image">
              <img src="media/publicacao/{{$noticia->imagem_externa}}" style="height: 300px; object-fit: cover; " loading="lazy" alt="" />
            </div>
            <div class="card-content px-0">
              <p>
                <span class="Roboto-Regular">{{$noticia->data}} </span>
              </p>
              <span class="card-title Roboto-Bold text-primary">{{$noticia->titulo}} </span>

              <p  class="Roboto-Regular">{{$noticia->descricao}}</p>
            </div>
            <div class="card-action px-0">
              <a href="/detalhes_noticias/{{$noticia->id}}" class="bg-primary btn z-depth-0">Continuar a ler</a>
            </div>
          </div>
        </div>
    
        @endforeach  


        </div>
      </div>
    </section>

@endsection
