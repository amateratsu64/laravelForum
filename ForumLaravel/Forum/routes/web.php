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

// Authentication Routes
Route::match(['get', 'post'], '/login', [Authcontroler::class, 'loginUser'])->name('login');
Route::match(['get', 'post'], '/register', [UserController::class, 'registerUser'])->name('register');

// Public Routes
Route::get('/', [UserController::class, 'menuInicial'])->name('inicial');

// Authenticated Routes
Route::middleware('auth')->group(function () {

    // User Routes
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'listAllUsers'])->name('user.listAll');
        Route::get('/{id}', [UserController::class, 'listUser'])->name('user.view');
        Route::put('/{id}/update', [UserController::class, 'updateUser'])->name('user.update');
        Route::delete('/{id}/delete', [UserController::class, 'deleteUser'])->name('user.delete');
    });
    Route::get('/logout', [Authcontroler::class, 'logoutUser'])->name('logout');

    // Post Routes
    Route::prefix('post')->group(function () {
        Route::get('/', [PostControler::class, 'listAllPosts'])->name('post.listAll');
        Route::get('/list', [PostControler::class, 'listPosts'])->name('post.list');
        Route::get('/{id}/update', [PostControler::class, 'updatePost'])->name('post.update');
        Route::delete('/{id}/delete', [PostControler::class, 'deletePost'])->name('post.delete');
        Route::match(['get', 'post'], '/create', [PostControler::class, 'createPost'])->name('post.create');
    });

    // Topic Routes
    Route::prefix('topics')->group(function () {
        Route::get('/', [TopcControler::class, 'listAllTopics'])->name('topics.listAll');
        Route::match(['get', 'post'], '/create', [TopcControler::class, 'createTopic'])->name('topics.create');
        Route::get('/{id}', [TopcControler::class, 'listTopicById'])->name('topics.view');
        Route::match(['get', 'put'], '/{id}/edit', [TopcControler::class, 'editAndUpdateTopic'])->name('topics.edit');
        Route::delete('/{id}', [TopcControler::class, 'deleteTopic'])->name('topics.delete');
    });

    // Tag Routes
    Route::prefix('tags')->group(function () {
        Route::get('/', [TagContrler::class, 'index'])->name('tags.index');
        Route::get('/create', [TagContrler::class, 'create'])->name('tags.create');
        Route::post('/store', [TagContrler::class, 'store'])->name('tags.store');
        Route::match(['get', 'put'], '/{id}/edit', [TagContrler::class, 'edit'])->name('tags.edit');
        Route::match(['get', 'put'], '/{id}/update', [TagContrler::class, 'update'])->name('tags.update');
        Route::delete('/{id}/delete', [TagContrler::class, 'destroy'])->name('tags.delete');
    });

    // Category Routes
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::match(['get', 'put'], '/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::match(['get', 'put'], '/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.delete');
    });
});
