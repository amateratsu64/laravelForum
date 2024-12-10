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
   
    Route::get('/posts', [PostControler::class, 'index'])->name('posts.index');
    // Rota para exibir o formulário de criação de um novo post
    Route::get('/posts/create', [PostControler::class, 'create'])->name('posts.create');

   Route::get('/posts/{post}', [PostControler::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostControler::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostControler::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostControler::class, 'destroy'])->name('posts.destroy');
    //topc
    Route::get('/topics', [TopcControler::class, 'listAllTopics'])->name('topics.listAllTopics');
    Route::match(['get', 'post'], '/topics/create', [TopcControler::class, 'createTopic'])->name('topics.createTopic');
    Route::get('/topics/{id}', [TopcControler::class, 'listTopicById'])->name('topics.viewTopic');
    Route::match(['get', 'put'], '/topics/{id}/edit', [TopcControler::class, 'editAndUpdateTopic'])->name('editAndUpdateTopic');
    Route::delete('/topics/{id}', [TopcControler::class, 'deleteTopic'])->name('topics.deleteTopic');
    Route::post('/topics/{topicId}/comments', [TopcControler::class, 'storeComment'])->name('comments.store');

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
