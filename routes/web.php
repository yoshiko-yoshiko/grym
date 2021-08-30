<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('top');
});

Route::get('/search', function () {
    $title = '変数名の検索';
    return view('search', compact('title'));
});

Route::get('/naming', [App\Http\Controllers\NamingController::class, '__invoke'])->name('naming');
Route::post('/naming', [\App\Http\Controllers\NamingPostController::class, '__invoke'])->name('naming-post');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\BookmarkController::class, '__invoke'])->name('bookmark');
