<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Authcontroler;
use App\Http\Controllers\PostControler;
use App\Http\Controllers\TopcControler;
use App\Http\Controllers\TagContrler;

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
    //Route::get('/topics',TopcControler::class, 'Listarall_topics')->name('Listarall_topics');
    //topics
    Route::get('/topics',[TopcControler::class, 'Listall_topics'])->name('Listall_topics');
    Route::get('/topics/list',[TopcControler::class, 'List_topics'])->name('List_topics');
    Route::get('/topics/{id}/update',[TopcControler::class, 'Update_topics'])->name('Update_topics');
    Route::delete('/topics/{id}/delete',[TopcControler::class, 'Delete_topics'])->name('Delete_topics');
    Route::match(['get', 'post'], '/create_topics', [TopcControler::class, 'create_topics'])->name('create_topics');
    //tag
    Route::get('/tag',[TagContrler::class, 'Listall_tag'])->name('Listall_tag');
    Route::get('/tag/list',[TagContrler::class, 'List_tag'])->name('List_tag');
    Route::get('/tag/{id}/update',[TagContrler::class, 'Update_tag'])->name('Update_tag');
    Route::delete('/tag/{id}/delete',[TagContrler::class, 'Delete_tag'])->name('Delete_tag');
    Route::match(['get', 'post'], '/create_topics', [TagContrler::class, 'create_topics'])->name('create_tag');
});
