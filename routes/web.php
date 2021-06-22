<?php

use Illuminate\Support\Facades\Route;

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

Route::get(
    '/',
    [App\Http\Controllers\Shared\MainController::class, 'index']
)->name('public_main');

Route::get(
    '/articles',
    [App\Http\Controllers\Shared\ArticleController::class, 'index']
)->name('article');

Route::get(
    '/articles/{slug}',
    [App\Http\Controllers\Shared\ArticleController::class, 'show']
)->name('article-show');

Route::post(
    '/articles/comment/store',
    [App\Http\Controllers\Shared\ArticleController::class, 'commentStore']
)->name('comment-store');

Route::post(
    '/articles/like/store',
    [App\Http\Controllers\Shared\ArticleController::class, 'likeStore']
)->name('like-store');

Route::post(
    '/articles/view/store',
    [App\Http\Controllers\Shared\ArticleController::class, 'viewStore']
)->name('view-store');

