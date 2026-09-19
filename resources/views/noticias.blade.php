
@extends('layouts.main')
@section('content')


<section class="banner-other">
  <div class="container">
    <div class="row">
      <div class="col s12 white-text" data-aos="fade-up" data-aos-delay="100">
        <h5 class="title">Notícias</h5>
      </div>
    </div>
  </div>
</section>

  <section class="white">
    <div class="container">
      <div class="row">

     


        @foreach( $noticias as $noticia) 
        
        <div class="col s12 m4 l6" data-aos="fade-up" data-aos-delay="100">
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
  </section>
@endsection
