<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EcomController;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout' , [HomeController::class, 'logout'])->name('logout');
Route::get('courses',[PostController::class, 'index']);
//Route::get('cart/store/',[PostController::class, 'addToCart'])->name('addToCart');
//Route::get('cart/store/',[PostController::class, 'addToCart']);
Route::post('cart/store/',[EcomController::class, 'addToCart'])->name('addToCart');
Route::get('course/{id}',[PostController::class, 'show']);
Route::post('course/{id}',[CommentController::class, 'create']);
Route::get('category/{slug}',[PostController::class, 'categoryView']);
Route::get('cart',[PostController::class, 'cart']);

Route::group(['middleware'=>['auth']], function () {
    Route::get('add-post',[PostController::class, 'addView']);
    Route::post('add-post',[PostController::class,'write']);
    Route::get('comment/{id}',[CommentController::class, 'edit']);
    Route::post('comment/{id}',[CommentController::class, 'editSubmit']);
    Route::post('addreply/{id}',[CommentController::class, 'reply'])->name('addreply');
});
