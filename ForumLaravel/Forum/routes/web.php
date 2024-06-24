<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Authcontroler;
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
});
