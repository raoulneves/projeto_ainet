<?php

use Illuminate\Support\Facades\Auth;
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

/*Route::get('/', function () {
    return view('exibicao.index');
})->name('exibicao.index');*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');
Auth::routes(['verify' => true]);
//Route::get('/', [FilmeController::class, 'index'])->name('exibicao.index');

Route::get('/', [App\Http\Controllers\FilmeController::class, 'index'])->name('filme');
Route::get('/detalheFilme', [App\Http\Controllers\FilmeController::class, 'detalheFilme'])->name('detalhe_filme');

Route::get('/admin', [App\Http\Controllers\AuthController::class, 'dashboard'])->name('admin');
