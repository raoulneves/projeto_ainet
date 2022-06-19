<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Middleware\VerifyIfIsAdmin;
use App\Http\Controllers\PagamentoController;



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

Route::get('/', [FilmeController::class, 'index'])->name('filme');
Route::get('index_filter', [FilmeController::class, 'index_filter'])->name('index_filter');
Route::get('/detalheFilme', [FilmeController::class, 'detalheFilme'])->name('detalhe_filme');
Route::get('exibicao/detalhe/{filme}', [FilmeController::class, 'detalheFilme'])->name('exibicao.detalhe');
Route::get('perfil', [UserController::class, 'perfil'])->name('perfil');
Route::get('carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::post('carrinho/filmes/{filme}', [CarrinhoController::class, 'update_sessao'])->name('carrinho.sessao_update');
Route::put('carrinho/filmes/{filme}', [CarrinhoController::class, 'update_filme'])->name('carrinho.index_update');
Route::delete('carrinho/filmes/{filme}', [CarrinhoController::class, 'destroy_filme'])->name('carrinho.index_des');
Route::post('carrinho', [CarrinhoController::class, 'store_filme'])->name('carrinho.index_post');
Route::get('pagamento', [PagamentoController::class, 'index'])->name('pagamento.index');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::middleware([VerifyIfIsAdmin::class])->group(function () {
    //dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


    //salas
    Route::get('/salas', [SalaController::class, 'admin_index'])->name('salas');
    Route::get('salas/{sala}/edit', [SalaController::class, 'edit'])->name('salas.edit');
    Route::get('salas/create', [SalaController::class, 'create'])->name('salas.create');
    Route::post('salas', [SalaController::class, 'store'])->name('salas.store');
    Route::delete('salas/{id}', [SalaController::class, 'delete'])->name('salas.delete');
    Route::put('salas/{sala}', [SalaController::class, 'update'])->name('salas.update');


    //filmes
    Route::get('filmes', [FilmeController::class, 'admin_index'])->name('filmes');
    Route::get('filmes/{filme}/edit', [FilmeController::class, 'edit'])->name('filmes.edit');
    Route::get('filmes/create', [FilmeController::class, 'create'])->name('filmes.create');
    Route::post('filmes', [FilmeController::class, 'store'])->name('filmes.store');
    Route::put('filmes/{filme}', [FilmeController::class, 'update'])->name('filmes.update');
    Route::delete('filmes/{filme}', [FilmeController::class, 'destroy'])->name('filmes.destroy');
    Route::delete('filmes/{filme}/foto', [FilmeController::class, 'destroy_foto'])->name('filmes.foto.destroy');

    });
});

Auth::routes(['register' => true]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
