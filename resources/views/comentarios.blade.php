@extends('layouts.main')
@section('content')
<section class="white">
    <div class="container">
      <div class="row">
        <div class="col s12 m4 l8 offset-l2" data-aos="fade-up" data-aos-delay="100">

        <h5 class="center">Alguns comentários dos utentes da comunidade Eiffel</h5>

        <div class="carousel" style="min-height: 800px;">

          @foreach( $comentarios as $comentario)    
    <a class="carousel-item" href="#one!">
    <div class="card">
    <div class="card-image">
          <img src="/media/comentario/{{$comentario->fotografia}}" style="filter: brightness(70%); height: 300px; object-fit:cover;">
          <span class="card-title">{{$comentario->nome}} - {{$comentario->turma}}</span>
        </div>
        <div class="card-content">
          <p>
            {{$comentario->comentario}}
          
          </p>
        </div>
      </div>
    </a>
   
   
    @endforeach  
 
  </div>
        </div>

      </div>
    </div>
  </section>

@endsection
