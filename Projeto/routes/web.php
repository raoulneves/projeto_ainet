<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarrinhoController;



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
Route::get('/detalheFilme', [FilmeController::class, 'detalheFilme'])->name('detalhe_filme');
Route::get('exibicao/detalhe/{filme}', [FilmeController::class, 'detalheFilme'])->name('exibicao.detalhe');
Route::get('perfil', [UserController::class, 'perfil'])->name('perfil');
Route::get('carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::put('carrinho/estampas/{estampa}', [CarrinhoController::class, 'update_filme'])->name('carrinho.index_update');
Route::post('carrinho', [CarrinhoController::class, 'store_filme'])->name('carrinho.index_post');
Route::get('pagamento', [PagamentoController::class, 'index'])->name('pagamento.index');





Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    //dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //salas
    Route::get('/salas', [SalaController::class, 'admin_index'])->name('salas')
        ->middleware('can:viewAny,App\Models\Sala');
    Route::get('salas/{sala}/edit', [SalaController::class, 'edit'])->name('salas.edit')
        ->middleware('can:view,sala');
    Route::get('salas/create', [SalaController::class, 'create'])->name('salas.create')
        ->middleware('can:create,App\Models\Sala');
    Route::delete('salas/{sala}', [SalaController::class, 'destroy'])->name('salas.destroy')
        ->middleware('can:delete,sala');
    Route::put('salas/{sala}', [SalaController::class, 'update'])->name('salas.update')
        ->middleware('can:update,sala');

    //filmes
 //
    Route::get('filmes', [FilmeController::class, 'admin_index'])->name('filmes')
        ->middleware('can:viewAny,App\Models\Filme');
    Route::get('filmes/{filme}/edit', [FilmeController::class, 'edit'])->name('filmes.edit')
        ->middleware('can:view,filme');
    Route::get('filmes/create', [FilmeController::class, 'create'])->name('filmes.create')
        ->middleware('can:create,App\Models\Filme');
    Route::post('filmes', [FilmeController::class, 'store'])->name('filmes.store')
        ->middleware('can:create,App\Models\Filme');
    Route::put('filmes/{filme}', [FilmeController::class, 'update'])->name('filmes.update')
        ->middleware('can:update,filme');
    Route::delete('filmes/{filme}', [FilmeController::class, 'destroy'])->name('filmes.destroy')
        ->middleware('can:delete,filme');
    Route::delete('filmes/{filme}/foto', [FilmeController::class, 'destroy_foto'])->name('filmes.foto.destroy')
        ->middleware('can:update,filme');
});

Auth::routes(['register' => true]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
