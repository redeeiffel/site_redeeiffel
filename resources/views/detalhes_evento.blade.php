@extends('layouts.main')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

@foreach( $detalhes as $detalhes) 

<section class="banner-other">
  <div class="container">
    <div class="row">
      <div class="col s12 white-text" data-aos="fade-up" data-aos-delay="100">
        <h5 class="title">{{$detalhes->titulo}} </h5>
      </div>
    </div>
  </div>
</section>

  <section class="white">
    <div class="container">
    <div class="row">
        <div class="col s12 m4 l8 offset-l2" data-aos="fade-up" data-aos-delay="100">
            <div class="center py-5">
            <img src="/media/publicacao/{{$detalhes->imagem_interna}}" style="height: 500px; object-fit: cover; filter: brightness(90%);" class="img-fluid" loading="lazy" alt="" />
          
              <p class="" style="text-align: center;"><span class="bg-primary borda-3 p-2 white-text"><span class="fa fa-calendar"></span> {{$detalhes->data}}</span></p>
            </div>

            <div class="center ">
              <p class="" style="text-align: justify;"> {{$detalhes->texto_inicial}}</p>
            </div>
          

            <div class="center ">
              <p class="" style="text-align: justify;">{{$detalhes->texto_secundario}}</p>
            </div>

            <div class="center py-5">
            <img src="/media/publicacao/{{$detalhes->imagem_interna_tercearia}}" style="height: 500px; object-fit: cover; filter: brightness(90%);" class="img-fluid" loading="lazy" alt="" />
          
            </div>

            <div class="center ">
              <p class="" style="text-align: justify;">{{$detalhes->texto_terceario}}</p>
            </div>

            <div class="center ">
              <p class="" style="text-align: justify;">{{$detalhes->texto_quarto}}</p>
            </div>


            <div class="center ">
              <a href="{{$detalhes->link}}" target="_blank" rel="noopener noreferrer">
              <p class="" style="text-align: justify;">Ver mais</p>
              
              </a>
              
            </div>
        </div>
      </div>
    </div>
  </section>
  @endforeach  


@endsection
