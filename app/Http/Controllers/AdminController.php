<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Publicacao;
use App\Models\Slider;
use App\Models\Comentario;
use App\Models\Galeria;
use App\Models\Mensagem;
use App\Models\NewLatter;
use App\Models\Projecto;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

   function create(Request $request){
      //Validate Inputs
      $request->validate([
          'name'=>'required',
          'email'=>'required|email|unique:admins,email',
          'password'=>'required|min:5|max:30',
          'c_password'=>'required|min:5|max:30|same:password'
      ]);

      $user = new Admin();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = \Hash::make($request->password);

      $user->c_password = $request->c_password;
      $save = $user->save();

    

      if( $save ){
          return redirect()->back()->with('sucess','sucess');
      }else{
          return redirect()->back()->with('fail','Algo de errado ao registar');
      }
}


  function check(Request $request){
       //Validate Inputs
       $request->validate([
          'email'=>'required|email|exists:admins,email',
          'password'=>'required|min:5|max:30'
       ],[
           'email.exists'=>'This email is not exists in admins table'
       ]);

       $creds = $request->only('email','password');

       if( Auth::guard('admin')->attempt($creds) ){
           return redirect()->route('admin.home');
       }else{
           return redirect()->route('admin.login')->with('fail','Incorrect credentials');
       }
}



  function home()
{
    $mensagens = Mensagem::count();

    $noticias = Publicacao::where('tipo', 1)->count();

    $utilizadores = Admin::count();

    return view('admin.home', [
        'mensagens' => $mensagens,
        'noticias' => $noticias,
        'utilizadores' => $utilizadores,
    ]);
}

   function add_slide(){
      return view('admin.add_slide');
   }

   function add_slid(Request $request){
    

      $clientes = new Slider();
      $clientes->titulo_um = $request->titulo_um;
      $clientes->titulo_dois = $request->titulo_dois;
      $clientes->titulo_botao = $request->titulo_botao;
      $clientes->link_botao = $request->link_botao;
      
     
      
      if ($request->hasFile('fotografia') && $request->file('fotografia')->isValid()) {
         $requestImage = $request->fotografia;
         $extension = $requestImage->extension();
         $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
         $requestImage->move(public_path('/media/slide'), $imageName);
         $clientes->fotografia = $imageName;
     }

      $save = $clientes->save();

      if( $save ){
          return redirect()->back()->with('success',' Slider adicionado com sucesso');
      }else{
          return redirect()->back()->with('fail','Something went wrong, failed to send');
      }
  }

    function ver_slider()
    {

      $slides = Slider::all();

       return view('admin.ver_slider',[
         'slides'=>$slides,
        
      
      ]);
    }

    function editar_slider($id)
    {

      $slide = Slider::findOrFail($id);

       return view('admin.editar_slide',[
         'slide'=>$slide,
        
      
      ]);
    }

   function edit_slider(Request $request,$id){
    

      $clientes = Slider::findOrFail($id);
      $clientes->titulo_um = $request->titulo_um;
      $clientes->titulo_dois = $request->titulo_dois;
      $clientes->titulo_botao = $request->titulo_botao;
      $clientes->link_botao = $request->link_botao;
      
     
      
      if ($request->hasFile('fotografia') && $request->file('fotografia')->isValid()) {
         $requestImage = $request->fotografia;
         $extension = $requestImage->extension();
         $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
         $requestImage->move(public_path('/media/slide'), $imageName);
         $clientes->fotografia = $imageName;
     }

      $save = $clientes->update();

      if( $save ){
          return redirect()->route('admin.ver_slider')->with('success',' Slider editado com sucesso');
      }else{
          return redirect()->back()->with('fail','Something went wrong, failed to send');
      }
  }


      public function delete_slider($id)
    {

        Slider::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Slider eliminado Com sucesso');
    }



   function add_publicacao()
   {
      
      return view('admin.add_publicacao');
   }




function add_p(Request $request)
{
    // 1. Validar a data antes de processar a publicação
    $request->validate([
        'data' => ['required', 'date_format:Y-m-d'],
    ], [
        'data.required' => 'A data da publicação é obrigatória.',
        'data.date_format' => 'Seleccione uma data válida no calendário.',
    ]);

    // 2. Criar a publicação
    $clientes = new Publicacao();

    $clientes->tipo = $request->tipo;
    $clientes->titulo = $request->titulo;
    $clientes->descricao = $request->descricao;
    $clientes->texto_inicial = $request->texto_inicial;
    $clientes->texto_secundario = $request->texto_secundario;
    $clientes->texto_terceario = $request->texto_terceario;
    $clientes->texto_quarto = $request->texto_quarto;

    // Data validada no formato YYYY-MM-DD
    $clientes->data = $request->data;

    $clientes->local = $request->local;
    $clientes->link = $request->link;
    $clientes->nomes = $request->nomes;
    $clientes->nomes_um = $request->nomes_um;

    // 3. Fotografia de capa principal
    if (
        $request->hasFile('imagem_externa') &&
        $request->file('imagem_externa')->isValid()
    ) {
        $requestImage = $request->file('imagem_externa');

        $extension = $requestImage->extension();

        $imageName = md5(
            $requestImage->getClientOriginalName() . microtime(true)
        ) . "." . $extension;

        $requestImage->move(
            public_path('media/publicacao'),
            $imageName
        );

        $clientes->imagem_externa = $imageName;
    }

    // 4. Fotografia interna 1
    if (
        $request->hasFile('imagem_interna') &&
        $request->file('imagem_interna')->isValid()
    ) {
        $requestImage = $request->file('imagem_interna');

        $extension = $requestImage->extension();

        $imageName = md5(
            $requestImage->getClientOriginalName() . microtime(true)
        ) . "." . $extension;

        $requestImage->move(
            public_path('media/publicacao'),
            $imageName
        );

        $clientes->imagem_interna = $imageName;
    }

    // 5. Fotografia interna 2
    if (
        $request->hasFile('imagem_interna_tercearia') &&
        $request->file('imagem_interna_tercearia')->isValid()
    ) {
        $requestImage = $request->file('imagem_interna_tercearia');

        $extension = $requestImage->extension();

        $imageName = md5(
            $requestImage->getClientOriginalName() . microtime(true)
        ) . "." . $extension;

        $requestImage->move(
            public_path('media/publicacao'),
            $imageName
        );

        $clientes->imagem_interna_tercearia = $imageName;
    }

    // 6. Guardar a publicação
    $save = $clientes->save();

    if ($save) {
        return redirect()
            ->back()
            ->with('success', 'Publicação adicionada com sucesso.');
    }

    return redirect()
        ->back()
        ->with('fail', 'Não foi possível guardar a publicação.');
}


function ver_publicacao()
    {

      $publicacoes = Publicacao::all();

       return view('admin.ver_publicacao',[
         'publicacoes'=>$publicacoes,
        
      
      ]);
    }

function editar_publicacao($id)
    {

      $post = Publicacao::findOrFail($id);

       return view('admin.editar_publicacao',[
         'post'=>$post,
        
      
      ]);
    }

function edit_publicacao(Request $request,$id){
    

      $clientes =Publicacao::findOrFail($id);
      $clientes->tipo = $request->tipo;
      $clientes->titulo = $request->titulo;
      $clientes->descricao = $request->descricao;
      $clientes->texto_inicial = $request->texto_inicial;
      $clientes->texto_secundario = $request->texto_secundario;
      $clientes->texto_terceario = $request->texto_terceario;
      $clientes->texto_quarto = $request->texto_quarto;
      $clientes->data = $request->data;
      $clientes->local = $request->local;
      $clientes->link = $request->link;
      $clientes->nomes = $request->nomes;
      $clientes->nomes_um = $request->nomes_um;
     
      
      if ($request->hasFile('imagem_externa') && $request->file('imagem_externa')->isValid()) {

         $requestImage = $request->imagem_externa;

         $extension = $requestImage->extension();

         $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

         $requestImage->move(public_path('/media/publicacao'), $imageName);

         $clientes->imagem_externa = $imageName;

     }
     
     if ($request->hasFile('imagem_interna') && $request->file('imagem_interna')->isValid()) {

      $requestImage = $request->imagem_interna;

      $extension = $requestImage->extension();

      $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

      $requestImage->move(public_path('/media/publicacao'), $imageName);

      $clientes->imagem_interna = $imageName;

  }
  if ($request->hasFile('imagem_interna_tercearia') && $request->file('imagem_interna_tercearia')->isValid()) {

   $requestImage = $request->imagem_interna_tercearia;

   $extension = $requestImage->extension();

   $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

   $requestImage->move(public_path('/media/publicacao'), $imageName);

   $clientes->imagem_interna_tercearia = $imageName;

}
     
      $save = $clientes->update();

      if( $save ){
          return redirect()->route('admin.ver_publicacao')->with('success','Publica├º├úo editada com sucesso');
      }else{
          return redirect()->back()->with('fail','Something went wrong, failed to send');
      }
  }

public function delete_publicacao($id)
    {

        Publicacao::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Slider eliminado Com sucesso');
    }



       function ver_mensagem()
    {

      $mensagens = Mensagem::all();

       return view('admin.ver_mensagem',[
         'mensagens'=>$mensagens,
      ]);
    }

function new_latter(Request $request){
   

   $clientes = new NewLatter();
   $clientes->email = $request->email;
   $save = $clientes->save();

   if( $save ){
       return redirect()->back()->with('success',' Email submetido com sucesso, enviaremos todas as actualizações acerca da Rede Eiffel');
   }else{
       return redirect()->back()->with('fail','Something went wrong, failed to send');
   }
}


       function ver_new()
    {

      $news = NewLatter::all();

       return view('admin.ver_new',[
         'news'=>$news,
        
      
      ]);
    }

    
public function welcome()
{
    // Slides institucionais existentes
    $slides = Slider::orderBy('created_at', 'desc')->get();

    // Projectos publicados e seleccionados para o slider
    $projectosSlider = \App\Models\Projecto::query()
        ->where('publicado', true)
        ->where('adicionar_ao_slider', true)
        ->whereNotNull('fotografia')
        ->orderBy('created_at', 'desc')
        ->get();

    // Notícias da página inicial
    $noticias = Publicacao::where('tipo', '=', 1)
        ->orderBy('id', 'desc')
        ->limit(2)
        ->get();

    return view('welcome', [
        'slides' => $slides,
        'projectosSlider' => $projectosSlider,
        'noticias' => $noticias,
    ]);
}


    function add_comment()
    {
       
       return view('admin.add_comment');
    }
  
    function add_com(Request $request){
     
  
       $clientes = new Comentario();
       $clientes->turma = $request->turma;
       $clientes->nome = $request->nome;
       $clientes->comentario = $request->comentario;
       $clientes->liceu = $request->liceu;
      
       if ($request->hasFile('fotografia') && $request->file('fotografia')->isValid()) {
          $requestImage = $request->fotografia;
          $extension = $requestImage->extension();
          $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
          $requestImage->move(public_path('/media/comentario'), $imageName);
          $clientes->fotografia = $imageName;
      }
  
       $save = $clientes->save();
  
       if( $save ){
           return redirect()->back()->with('success',' Comentario adicionado com sucesso');
       }else{
           return redirect()->back()->with('fail','Something went wrong, failed to send');
       }
   }

       function ver_comentario()
    {

      $comentarios = Comentario::all();

       return view('admin.ver_comentario',[
         'comentarios'=>$comentarios,
        
      
      ]);
    }


       function editar_comentario($id)
    {

      $comentario = Comentario::findOrFail($id);

       return view('admin.editar_comentario',[
         'comentario'=>$comentario,
        
      
      ]);
    }


    function edit_comentario(Request $request,$id){
     
  
       $clientes =Comentario::findOrFail($id);
       $clientes->turma = $request->turma;
       $clientes->nome = $request->nome;
       $clientes->comentario = $request->comentario;
       $clientes->liceu = $request->liceu;
      
       if ($request->hasFile('fotografia') && $request->file('fotografia')->isValid()) {
          $requestImage = $request->fotografia;
          $extension = $requestImage->extension();
          $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
          $requestImage->move(public_path('/media/comentario'), $imageName);
          $clientes->fotografia = $imageName;
      }
  
       $save = $clientes->update();
  
       if( $save ){
           return  redirect()->route('admin.ver_comentario')->with('success',' Comentario adicionado com sucesso');
       }else{
           return redirect()->back()->with('fail','Something went wrong, failed to send');
       }
   }


   
      public function delete_comentario($id)
    {

        Comentario::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Slider eliminado Com sucesso');
    }


    function apresentacao_liceu()
    {
       return view('/apresentacao_liceu');
    }

    function comentarios()
    {
       $comentarios = Comentario::all();

      return view('/comentarios',['comentarios'=>$comentarios]);
    }

    public function equipe()
{
    $coordenacao = \App\Models\Liceu::query()
        ->where('tipo', 'coordenacao')
        ->where('ativo', true)
        ->with(['membros' => function ($query) {
            $query->where('ativo', true)
                  ->orderBy('ordem')
                  ->orderBy('id');
        }])
        ->first();

    $liceus = \App\Models\Liceu::query()
        ->where('tipo', 'liceu')
        ->where('ativo', true)
        ->with(['membros' => function ($query) {
            $query->where('ativo', true)
                  ->orderBy('ordem')
                  ->orderBy('id');
        }])
        ->orderBy('ordem')
        ->orderBy('nome')
        ->get();

    return view('equipe', compact('coordenacao', 'liceus'));
}
    function eventos()
    {
      $eventos = Publicacao::where('tipo','=',2)->get();
      return view('/eventos',['eventos'=>$eventos]);
    }

    

    function fale_conosco()
    {
       return view('/fale_conosco');
    }

    function mulher_eiffeliana()
    {
       return view('/mulher_eiffeliana');
    }

   public function galerias()
{
    // Buscar todas as fotografias da galeria
    $fotos = Galeria::orderBy('id', 'desc')->get();

    // Buscar apenas os vídeos publicados
    $videos = \App\Models\Video::where('publicado', true)
        ->orderBy('id', 'desc')
        ->get();

    // Enviar fotografias e vídeos para a página pública
    return view('galeria', compact('fotos', 'videos'));
}

    function inscricoes()
    {
       return view('/inscricoes');
    }

    function videos()
    {
       return view('/video');
    }

      function resultados()
    {
       return view('/resultados');
    }
    
    function nossos_parceiros()
    {
       return view('/nossos_parceiros');
    }

    function noticias()
    {
      $noticias = Publicacao::where('tipo','=',1)->orderBy('id', 'desc')->get();
       return view('/noticias',['noticias'=>$noticias]);
    }

    function organizacao_alunos()
    {
       return view('/organizacao_alunos');
    }

    function organizacao_classes()
    {
       return view('/organizacao_classes');
    }
    function acerca()
    {
       return view('/acerca_rede');
    }
    function organizacao_educaional()
    {
       return view('/organizacao_educacional');
    }

    function organograma()
    {
       return view('/organograma');
    }

    function praticas_laboratorias()
    {
       return view('/praticas_no_laboratorio');
    }

   public function projecto_desenvolvidos()
{
    $projectos = Projecto::where('categoria', 'desenvolvidos')
        ->where('publicado', true)
        ->latest()
        ->get();

    return view('projecto_desenvolvidos', compact('projectos'));
}

public function projecto_educacional()
{
    $projectos = Projecto::where('categoria', 'educacional')
        ->where('publicado', true)
        ->latest()
        ->get();

    return view('projecto_educacional', compact('projectos'));
}

public function projecto_formacao_docente()
{
    $projectos = Projecto::where('categoria', 'formacao_docente')
        ->where('publicado', true)
        ->latest()
        ->get();

    return view('projecto_formacao_docentes', compact('projectos'));
}

    function sobre()
    {
       return view('/sobre');
    }

    function sucessos_estudantis()
    {
       return view('/sucessos_estudantis');
    }


    function detalhes_noticias($id)
    {

      $detalhes = Publicacao::where('id','=',$id)->get();

       return view('detalhes_noticias',
       [
         
         'detalhes'=>$detalhes
      
      ]);
    }
    

    public function shareViaWhatsApp(Request $request)
    {
        $url = $request->input('url');
        $whatsappUrl = 'https://api.whatsapp.com/send?text=' . urlencode($url);
        return redirect()->away($whatsappUrl);
    }

    public function shareViaFacebook(Request $request)
    {
        $url = $request->input('url');
        $facebookUrl = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($url);
        return redirect()->away($facebookUrl);
    }


    // Gestao administrativa da galeria
    public function ver_galeria()
    {
        $galerias = Galeria::orderBy('id', 'desc')->get();

        return view('admin.ver_galeria', compact('galerias'));
    }
// Abrir o formulário para adicionar fotografias
public function add_galeria()
{
    return view('admin.add_galeria');
}
    // Apresentar formulario de nova fotografia
   // Guardar nova fotografia na galeria
public function add_galery(Request $request)
{
    $dados = $request->validate([
        'tipo' => 'required|in:filter-app,filter-card,filter-web',
        'titulo' => 'required|string|max:5000',
        'fotografia' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
    ]);

    $diretorio = public_path('media/galeria');

    if (!is_dir($diretorio)) {
        if (!mkdir($diretorio, 0755, true) && !is_dir($diretorio)) {
            return back()
                ->withInput()
                ->with('fail', 'Não foi possível preparar a pasta da galeria.');
        }
    }

    $ficheiro = $request->file('fotografia');
    $nome = \Illuminate\Support\Str::uuid() . '.' . $ficheiro->extension();

    $ficheiro->move($diretorio, $nome);

    try {
        Galeria::create([
            'tipo' => $dados['tipo'],
            'titulo' => $dados['titulo'],
            'fotografia' => $nome,
        ]);
    } catch (\Throwable $e) {
        @unlink($diretorio . DIRECTORY_SEPARATOR . $nome);
        throw $e;
    }

    return redirect()
        ->route('admin.ver_galeria')
        ->with('success', 'Fotografia adicionada à galeria com sucesso!');
}

// Abrir o formulário de edição
public function editar_galeria($id)
{
    $galeria = Galeria::findOrFail($id);

    return view('admin.editar_galeria', compact('galeria'));
}

// Actualizar os dados da fotografia
public function edit_galeria(Request $request, $id)
{
    $galeria = Galeria::findOrFail($id);

    $dados = $request->validate([
        'tipo' => 'required|in:filter-app,filter-card,filter-web',
        'titulo' => 'required|string|max:5000',
        'fotografia' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
    ]);

    $fotografiaAntiga = $galeria->fotografia;
    $novaFotografia = null;

    if ($request->hasFile('fotografia')) {
        $diretorio = public_path('media/galeria');

        if (!is_dir($diretorio)) {
            if (!mkdir($diretorio, 0755, true) && !is_dir($diretorio)) {
                return back()
                    ->withInput()
                    ->with('fail', 'Não foi possível preparar a pasta da galeria.');
            }
        }

        $ficheiro = $request->file('fotografia');
        $novaFotografia = \Illuminate\Support\Str::uuid()
            . '.' . $ficheiro->extension();

        $ficheiro->move($diretorio, $novaFotografia);

        $dados['fotografia'] = $novaFotografia;
    }

    try {
        $galeria->update($dados);
    } catch (\Throwable $e) {
        if ($novaFotografia) {
            @unlink(public_path('media/galeria/' . $novaFotografia));
        }

        throw $e;
    }

    if ($novaFotografia && $fotografiaAntiga) {
        $caminhoAntigo = public_path(
            'media/galeria/' . basename($fotografiaAntiga)
        );

        if (is_file($caminhoAntigo)) {
            @unlink($caminhoAntigo);
        }
    }

    return redirect()
        ->route('admin.ver_galeria')
        ->with('success', 'Fotografia actualizada com sucesso!');
}

// Eliminar fotografia
public function delete_galeria($id)
{
    $galeria = Galeria::findOrFail($id);

    $fotografia = $galeria->fotografia;

    $galeria->delete();

    if ($fotografia) {
        $caminho = public_path(
            'media/galeria/' . basename($fotografia)
        );

        if (is_file($caminho)) {
            @unlink($caminho);
        }
    }

    return redirect()
        ->route('admin.ver_galeria')
        ->with('success', 'Fotografia eliminada com sucesso!');
}

}
