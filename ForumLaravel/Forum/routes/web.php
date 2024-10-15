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

    // Route::get('/topics',UserController::class, 'Listarall_topics')->name('Listarall_topics');
    Route::get('/topics',[TopcControler::class, 'Listll_topics'])->name('Listll_topics');
    Route::get('/topics/list',[TopcControler::class, 'List_topics'])->name('List_topics');
    Route::get('/topics/{id}/update',[TopcControler::class, 'Update_topics'])->name('Update_topics');
    Route::delete('/topics/{id}/delete',[TopcControler::class, 'Delete_topics'])->name('Delete_topics');
    Route::match(['get', 'post'], '/create_topics', [TopcControler::class, 'create_topics'])->name('create_topics');
    //tag
    Route::group(['prefix' => 'tags'], function() {
        Route::get('/create', [TagContrler::class, 'create'])->name('tags.create');
        Route::post('/create', [TagContrler::class, 'store'])->name('tags.store');
        Route::get('/{id}/edit', [TagContrler::class, 'edit'])->name('tags.edit');
        Route::put('/{id}/edit', [TagContrler::class, 'update'])->name('tags.update');
        Route::delete('/{id}/destroy', [TagContrler::class, 'destroy'])->name('tag.destroy');
    });
    Route::group(['prefix' => 'tags'], function() {
        Route::get('/', [TagContrler::class, 'index'])->name('tags.index');
        Route::get('/{id}', [TagContrler::class, 'show'])->name('tags.show');
    });




    Route::group(['prefix' => 'categories'], function() {
            Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
            Route::post('/create', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::put('/{id}/edit', [CategoryController::class, 'update'])->name('categories.update');
            Route::delete('/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');
        });
    Route::group(['prefix' => 'categories'], function() {
            Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
            Route::get('/{id}', [CategoryController::class, 'show'])->name('categories.show');
        });
});