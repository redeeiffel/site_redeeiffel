<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

// Página inicial
Route::get('/', [AdminController::class, 'welcome'])->name('welcome');

// Página temporária de manutenção dos sites dos Liceus
Route::get('/manutencao', function () {
    return view('manutencao', [
        'liceu' => 'Rede Eiffel'
    ]);
})->name('manutencao');


// --------------------------------------------------------------------------
// Páginas públicas
// --------------------------------------------------------------------------

Route::get('/apresentacao_liceu', [AdminController::class, 'apresentacao_liceu'])->name('apresentacao_liceu');
Route::get('/mulher_eiffeliana', [AdminController::class, 'mulher_eiffeliana'])->name('mulher_eiffeliana');
Route::get('/acerca', [AdminController::class, 'acerca'])->name('acerca');
Route::get('/comentarios', [AdminController::class, 'comentarios'])->name('comentarios');
Route::get('/detalhes_evento', [AdminController::class, 'detalhes_evento'])->name('detalhes_evento');
Route::get('/equipe', [AdminController::class, 'equipe'])->name('equipe');
Route::get('/eventos', [AdminController::class, 'eventos'])->name('eventos');
Route::get('/fale_conosco', [AdminController::class, 'fale_conosco'])->name('fale_conosco');
Route::get('/galerias', [AdminController::class, 'galerias'])->name('galerias');
Route::get('/inscricoes', [AdminController::class, 'inscricoes'])->name('inscricoes');
Route::get('/nossos_parceiros', [AdminController::class, 'nossos_parceiros'])->name('nossos_parceiros');
Route::get('/noticias', [AdminController::class, 'noticias'])->name('noticias');
Route::get('/organizacao_alunos', [AdminController::class, 'organizacao_alunos'])->name('organizacao_alunos');
Route::get('/organizacao_classes', [AdminController::class, 'organizacao_classes'])->name('organizacao_classes');
Route::get('/organizacao_educaional', [AdminController::class, 'organizacao_educaional'])->name('organizacao_educaional');
Route::get('/organograma', [AdminController::class, 'organograma'])->name('organograma');
Route::get('/praticas_laboratorias', [AdminController::class, 'praticas_laboratorias'])->name('praticas_laboratorias');
Route::get('/projecto_desenvolvidos', [AdminController::class, 'projecto_desenvolvidos'])->name('projecto_desenvolvidos');
Route::get('/projecto_educacional', [AdminController::class, 'projecto_educacional'])->name('projecto_educacional');
Route::get('/projecto_formacao_docente', [AdminController::class, 'projecto_formacao_docente'])->name('projecto_formacao_docente');
Route::get('/sobre', [AdminController::class, 'sobre'])->name('sobre');
Route::get('/sucessos_estudantis', [AdminController::class, 'sucessos_estudantis'])->name('sucessos_estudantis');
Route::get('/videos', [AdminController::class, 'videos'])->name('videos');
Route::get('/resultados', [AdminController::class, 'resultados'])->name('resultados');

Route::get('/comunicado', [AdminController::class, 'comunicado'])->name('comunicado');

Route::get('/detalhes_noticias/{id}', [AdminController::class, 'detalhes_noticias'])->name('detalhes_noticias');

Route::post('/enviar_sms', [AdminController::class, 'enviar_sms'])->name('enviar_sms');
Route::post('/new_latter', [AdminController::class, 'new_latter'])->name('new_latter');


// --------------------------------------------------------------------------
// Partilha nas redes sociais
// --------------------------------------------------------------------------

Route::get('/share/whatsapp', [AdminController::class, 'shareViaWhatsApp']);
Route::get('/share/facebook', [AdminController::class, 'shareViaFacebook']);


// --------------------------------------------------------------------------
// Área administrativa
// --------------------------------------------------------------------------

Route::prefix('admin')->name('admin.')->group(function () {

    // ----------------------------------------------------------------------
    // Autenticação do administrador
    // ----------------------------------------------------------------------

    Route::middleware(['guest:admin'])->group(function () {

        Route::view('/login', 'admin.login')->name('login');

        Route::view('/register', 'admin.register')->name('register');

        Route::post('/create', [AdminController::class, 'create'])->name('create');

        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });


    // ----------------------------------------------------------------------
    // Área protegida do administrador
    // ----------------------------------------------------------------------

    Route::middleware(['auth:admin'])->group(function () {

        Route::get('/home', [AdminController::class, 'home'])->name('home');

        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');


        // ------------------------------------------------------------------
        // Notícias / Publicações
        // ------------------------------------------------------------------

        Route::get('/add_new', [AdminController::class, 'add'])->name('add');

        Route::get('/add_post', [AdminController::class, 'add_post'])->name('add_post');

        Route::post('/add_posts', [AdminController::class, 'add_posts'])->name('add_posts');

        Route::get('/add_publicacao', [AdminController::class, 'add_publicacao'])->name('add_publicacao');

        Route::post('/add_p', [AdminController::class, 'add_p'])->name('add_p');

        Route::get('/ver_publicacao', [AdminController::class, 'ver_publicacao'])->name('ver_publicacao');

        Route::get('/editar_publicacao/{id}', [AdminController::class, 'editar_publicacao'])->name('editar_publicacao');

        Route::put('/edit_publicacao/{id}', [AdminController::class, 'edit_publicacao'])->name('edit_publicacao');

        Route::delete('/delete_publicacao/{id}', [AdminController::class, 'delete_publicacao'])->name('delete_publicacao');


        // ------------------------------------------------------------------
        // Slider
        // ------------------------------------------------------------------

        Route::get('/add_slide', [AdminController::class, 'add_slide'])->name('add_slide');

        Route::post('/add_slid', [AdminController::class, 'add_slid'])->name('add_slid');

        Route::get('/ver_slider', [AdminController::class, 'ver_slider'])->name('ver_slider');

        Route::get('/editar_slider/{id}', [AdminController::class, 'editar_slider'])->name('editar_slider');

        Route::put('/edit_slider/{id}', [AdminController::class, 'edit_slider'])->name('edit_slider');

        Route::delete('/delete_slider/{id}', [AdminController::class, 'delete_slider'])->name('delete_slider');


        // ------------------------------------------------------------------
        // Comentários
        // ------------------------------------------------------------------

        Route::get('/add_comment', [AdminController::class, 'add_comment'])->name('add_comment');

        Route::post('/add_com', [AdminController::class, 'add_com'])->name('add_com');

        Route::get('/ver_comentario', [AdminController::class, 'ver_comentario'])->name('ver_comentario');

        Route::get('/editar_comentario/{id}', [AdminController::class, 'editar_comentario'])->name('editar_comentario');

        Route::put('/edit_comentario/{id}', [AdminController::class, 'edit_comentario'])->name('edit_comentario');

        Route::delete('/delete_comentario/{id}', [AdminController::class, 'delete_comentario'])->name('delete_comentario');


        // ------------------------------------------------------------------
        // Galeria
        // ------------------------------------------------------------------

        Route::get('/add_galeria', [AdminController::class, 'add_galeria'])->name('add_galeria');

        Route::post('/add_galery', [AdminController::class, 'add_galery'])->name('add_galery');

        Route::get('/ver_galeria', [AdminController::class, 'ver_galeria'])->name('ver_galeria');

        Route::get('/editar_galeria/{id}', [AdminController::class, 'editar_galeria'])->name('editar_galeria');

        Route::put('/edit_galeria/{id}', [AdminController::class, 'edit_galeria'])->name('edit_galeria');

        Route::delete('/delete_galeria/{id}', [AdminController::class, 'delete_galeria'])->name('delete_galeria');


        // ------------------------------------------------------------------
        // Mensagens e newsletter
        // ------------------------------------------------------------------

        Route::get('/ver_mensagem', [AdminController::class, 'ver_mensagem'])->name('ver_mensagem');

        Route::get('/ver_new', [AdminController::class, 'ver_new'])->name('ver_new');

    });

});