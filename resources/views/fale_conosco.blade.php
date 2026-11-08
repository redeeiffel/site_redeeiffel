@extends('layouts.main')
@section('content')
<section class="banner-other">
  <div class="container">
    <div class="row">
      <div class="col s12 white-text" data-aos="fade-up" data-aos-delay="100">
        <h5 class="title">Fale connosco</h5>
      </div>
    </div>
  </div>
</section>

  <section class="">
    <div class="container">

      <div class="row">
        <div class="col s12 m10 l10 offset-l1 offset-m1" data-aos="fade-up" data-aos-delay="200">
          <div class="row center espaco-m-2">
            <div class="col s12 m4 l3">
              <i class="fa fa-envelope fa-3x cor1"></i>
                <h6 class="grey-text">suporteeiffel@redeeiffel.ao</h6>
            </div>

            <div class="col s12 m4 l3" data-aos="fade-up" data-aos-delay="300">
                <i class="fa fa-paper-plane fa-3x cor1"></i>
                <h6 class="grey-text">Benguela - Baía Farta</h6>
            </div>

            <div class="col s12 m4 l3" data-aos="fade-up" data-aos-delay="400">
              <i class="fa fa-mobile-alt fa-3x cor1"></i>
                <h6 class="grey-text">Coordenação: <a href="tel:+244227210460">(+244) 227 210 460</a></h6>
            </div>

            <div class="col s12 m4 l3" data-aos="fade-up" data-aos-delay="400">
              <i class="fa fa-clock fa-3x cor1"></i>
                <h6 class="grey-text">Segunda - Sexta 7h - 16h</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<section class="grey lighten-5 espaco-p-baixo-1">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12" data-aos="fade-up" data-aos-delay="100">
        <div class="center-align">
          <h5 class="grey-text">Preencha o formulário de contacto</h5>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m8 l8 offset-l2" data-aos="fade-up" data-aos-delay="300">
        <form action="{{ route('enviar_sms')}}" method="post" class="white espaco-p-2 z-depth-3">
        @csrf    
         
        <div class="row">
            <div class="col s12 m12 l12">
              <input type="text" name="nome" class="browser-default estilo-input" placeholder="Nome" maxlength="50" required id="id_nome">
              <label for="">Nome</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m6 l6">
              <input type="text" name="telefone" class="browser-default estilo-input" placeholder="Telefone" maxlength="20" required id="id_telefone">
              <label for="">Telefone</label>
            </div>
            <div class="col s12 m6 l6">
              <input type="email" name="email" class="browser-default estilo-input" placeholder="Email" maxlength="254" required id="id_email">
              <label for="">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12 l12">
              <select name="assunto" class="browser-default estilo-input" required id="id_assunto">
                <option value="" selected>---------</option>
                <option value="Sugestão">Sugestão</option>
                <option value="Elogio">Elogio</option>
                <option value="Crítica">Crítica</option>
                <option value="Outro">Outro</option>
              </select>
              <label for="">Assunto</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12 l12">
              <textarea name="mensagem" cols="40" rows="10" class="browser-default estilo-input" placeholder="Digite a sua mensagem" required id="id_mensagem"></textarea>
              <label for="">Mensagem</label>
            </div>
          </div>

          <div class="row">
            <div class="col s12 m12 l12 ">
              <div class="">
                <button type="submit" class="btn bg-primary borda-1"><span class="bi bi-send"></span> Enviar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection
