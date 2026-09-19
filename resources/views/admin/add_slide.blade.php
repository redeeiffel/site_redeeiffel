@extends('layouts.main_admin')
@section('content')

@if (Session::get('success'))<!-- /.card-header -->
<div class="card-body">
  
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
    {{ Session::get('success') }} 
  </div>
</div>
<!-- /.card-body -->

@endif
@if (Session::get('fail'))
<!-- /.card-header -->
<div class="card-body">
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-ban"></i> Falha!</h5>
      {{ Session::get('fail') }} 
    </div>
    
  </div>
  <!-- /.card-body -->

@endif

    <div class="row espaco-m-top-1">
        <div class="col s12">
            <h5 class="Jost-Bold grey-text text-darken-2"><span class="fa fa-home"></span> &rightarrow; Blog &rightarrow; Novo slide</h5>
            <div class="borda-titulo-3"></div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="new-card-admin">
                <div class="new-card-header-light">
                    <h6>Registar novo post</h6>
                </div>
                <div class="new-card-content">
                    <div class="espaco-p-1">
                        <form action="{{ route('admin.add_slid') }} " method="post" enctype="multipart/form-data">
                        @csrf    

                       
                            <div class="row">
                                <div class="col s12">
                                    <label for="">Título Inicial</label>
                                    <input type="text" require name="titulo_um" require id="titulo" class="browser-default estilo-input">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12">
                                    <label for="">Descrição</label>
                                    <textarea name="titulo_dois" require id="summernote" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12">
                                    <label for="">Legenda para o botão</label>
                                    <textarea name="titulo_botao" require id="summernote" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <label for="">Link do botão</label>
                                    <textarea name="link_botao" require id="summernote" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            

                           

                         

                            <div class="row">
                                <div class="col s12">
                                    <label for="">Carrege a Foto de Capa inicial</label>
                                    <input type="file" require name="fotografia">
                                </div>
                            </div>


                           

                            
                            <div class="row">
                                <div class="col s12">
                                    <button type="submit" name="btn-enviar" class="bg-primary borda-1 btn bg-primary-1"><span class="fa fa-plus"></span> Registar</button> <br>
                                    <a href=" " class="borda-1 btn grey lighten-4 grey-text espaco-m-top-0"><span class="fa fa-chevron-left"></span> Voltar</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
@endsection
