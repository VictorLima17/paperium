<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
//Rotas de autenticação de redes socias
Route::get('login/{provedor}', 'Auth\SocialController@redirectToProvider');
Route::get('login/callback/{provedor}', 'Auth\SocialController@handleProviderCallback');

Route::get('/', 'LeitorController@index');
Route::get('/perfil','LeitorController@mostraPerfil');
Route::get('/download/{id}','LeitorController@downloadLivroDigital');

//Rotas de ajax da lista de livros digitais do usuario
Route::post('/adicionar/leitura','LivroDigitalController@adicionarLivroLeitura');
Route::post('/remover/leitura','LivroDigitalController@removerLivroLeitura');

/* rotas admin */
//Rotas de autenticação
$this->get('admin/login', 'AdminAuth\AuthController@showLoginForm');
$this->post('admin/login', 'AdminAuth\AuthController@login');
$this->get('admin/logout', 'AdminAuth\AuthController@logout');
// Cadastro()
$this->get('admin/register', 'AdminAuth\AuthController@showRegistrationForm');
$this->post('admin/register', 'AdminAuth\AuthController@register');
//Redefinição de senha
$this->get('admin/password/reset/{token?}', 'AdminAuth\PasswordController@showResetForm');
$this->post('admin/password/email', 'AdminAuth\PasswordController@sendResetLinkEmail');
$this->post('admin/password/reset', 'AdminAuth\PasswordController@reset');

Route::group(['prefix' => 'admin','as' => 'admin::'], function(){
    Route::get('/',[ 'as' => 'index', 'uses' => 'AdminController@index']);
    Route::get('/teste',[ 'as' => 'teste', 'uses' => 'AdminController@teste']);
    Route::get('/livros',[ 'as' => 'livros.index', 'uses' => 'AdminController@livrosIndex']);
    
    //Autor
    Route::post('/cadastra/autor',[ 'as' => 'cadastra.autor', 'uses' => 'AutorController@cadastraAutor']);
    Route::get('/autor/{id}',[ 'as' => 'mostra.autor', 'uses' => 'AdminController@mostraAutor']);
    Route::get('/autor/edita/{id}',[ 'as' => 'mostra.edita.autor', 'uses' => 'AdminController@mostraAutor']);
    Route::put('/autor/{id}',[ 'as' => 'atualiza.autor', 'uses' => 'AutorController@atualizaAutor']);
    Route::get('/autor/deleta/{id}',[ 'as' => 'mostra.deleta.autor', 'uses' => 'AdminController@mostraAutor']);
    Route::delete('/autor/{id}',[ 'as' => 'deleta.autor', 'uses' => 'AutorController@deletaAutor']);

    //Genero
    Route::get('/cadastra/genero',[ 'as' => 'cadastra.genero', 'uses' => 'AdminController@formCadastraGenero']);
    Route::post('/cadastra/genero',[ 'as' => 'cadastra.genero', 'uses' => 'GeneroController@cadastraGenero']);
    Route::get('/genero/{id}',[ 'as' => 'mostra.genero', 'uses' => 'AdminController@mostraGenero']);
    Route::get('/genero/edita/{id}',[ 'as' => 'mostra.edita.genero', 'uses' => 'AdminController@formEditaGenero']);
    Route::put('/genero/{id}',[ 'as' => 'atualiza.genero', 'uses' => 'GeneroController@atualizaGenero']);
    Route::get('/genero/deleta/{id}',[ 'as' => 'mostra.deleta.genero', 'uses' => 'AdminController@mostraGenero']);
    Route::delete('/genero/{id}',[ 'as' => 'deleta.genero', 'uses' => 'GeneroController@deletaGenero']);
    
    //Livro
    Route::get('/cadastra/livro',[ 'as' => 'cadastra.livro', 'uses' => 'AdminController@formCadastraLivro']);
    Route::post('/cadastra/livro',[ 'as' => 'cadastra.livro', 'uses' => 'LivroDigitalController@cadastraLivro']);
    Route::get('/livro/{id}',[ 'as' => 'mostra.livro', 'uses' => 'AdminController@mostraLivro']);
    Route::get('/livro/edita/{id}',[ 'as' => 'mostra.edita.livro', 'uses' => 'AdminController@formEditaLivro']);
    Route::put('/livro/{id}',[ 'as' => 'atualiza.livro', 'uses' => 'LivroDigitalController@atualizaLivro']);
    Route::get('/livro/deleta/{id}',[ 'as' => 'mostra.deleta.livro', 'uses' => 'AdminController@mostraLivro']);
    Route::delete('/livro/{id}',[ 'as' => 'deleta.livro', 'uses' => 'LivroDigitalController@deletaLivro']);
    
});

