<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Authcontroler;
use App\Http\Controllers\PostControler;
use App\Http\Controllers\TopcControler;
use App\Http\Controllers\TagContrler;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

        

    

Route::match (['get','post'],'/login',[Authcontroler::class,'login_user'])->name('login');

Route::match (['get','post'],'/register',[UserController::class,'register_user'])->name('register');

Route::get('',[UserController::class, 'menu_inicial'])->name('inicial');



Route::middleware('auth')->group(function () {

    Route::get('/user',[UserController::class ,'listALLUsers']) ->name('listALLUsers');
    Route::get('/logout',[Authcontroler::class, 'logout_user'])->name('logout');
    Route::get('/user/{id}',[UserController::class, 'List_user'])->name('List_user');
    Route::put('/user/{id}/update',[UserController::class, 'Update_user'])->name('Update_user');
    Route::delete('/user/{id}/delete',[UserController::class, 'Delete_user'])->name('Delete_user');
    //post
    Route::get('/post',[PostControler::class, 'Listll_post'])->name('Listll_post');
    Route::get('/post/list',[PostControler::class, 'List_post'])->name('List_post');
    Route::get('/post/{id}/update',[PostControler::class, 'Update_post'])->name('Update_post');
    Route::delete('/post/{id}/delete',[PostControler::class, 'Delete_post'])->name('Delete_post');
    Route::match(['get', 'post'], '/create_post', [PostControler::class, 'create_post'])->name('create_post');

    // Rota para listar todos os tópicos
Route::get('/topics', [TopcControler::class, 'listAllTopics'])->name('topics.listAllTopics');

// Rota para exibir o formulário de criação de tópico (GET) ou salvar um novo tópico (POST)
Route::match(['get', 'post'], '/topics/create', [TopcControler::class, 'createTopic'])->name('topics.createTopic');
// Rota para exibir os detalhes de um tópico específico
Route::get('/topics/{id}', [TopcControler::class, 'listTopicById'])->name('topics.viewTopic');

// Rota para exibir o formulário de edição de tópico (GET) e salvar as alterações (PUT)
Route::match(['get', 'put'], '/topics/{id}/edit', [TopcControler::class, 'editAndUpdateTopic'])->name('editAndUpdateTopic');


// Rota para excluir um tópico
Route::delete('/topics/{id}', [TopcControler::class, 'deleteTopic'])->name('topics.deleteTopic');
    //tag
    Route::prefix('tags')->group(function () {
        Route::get('/', [TagContrler::class, 'index'])->name('tags.index');
        Route::get('/create', [TagContrler::class, 'create'])->name('tags.create');
        Route::post('/store', [TagContrler::class, 'store'])->name('tags.store');
        Route::match(['get', 'put'], '/{id}/edit', [TagContrler::class, 'edit'])->name('tags.edit');
        Route::match(['get', 'put'], '/{id}/update', [TagContrler::class, 'update'])->name('tags.update');
        Route::delete('/{id}/delete', [TagContrler::class, 'destroy'])->name('tags.destroy');
    });

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::match(['get', 'put'], '/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::match(['get', 'put'], '/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

});