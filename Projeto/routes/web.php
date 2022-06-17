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
use Illuminate\Support\Facades\Artisan;

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

//exibicao
Route::get('/', [FilmeController::class, 'index'])->name('filme');
Route::get('index_filter', [FilmeController::class, 'index_filter'])->name('index_filter');
Route::get('/detalheFilme', [FilmeController::class, 'detalheFilme'])->name('detalhe_filme');
Route::get('exibicao/detalhe/{filme}', [FilmeController::class, 'detalheFilme'])->name('exibicao.detalhe');


//perfil
Route::get('perfil', [UserController::class, 'perfil'])->name('perfil');
Route::get('perfil/{perfil}/edit', [UserController::class, 'edit'])->name('perfil.edit');
Route::put('perfil/{perfil}', [UserController::class, 'update'])->name('perfil.update');
Route::get('alterarPassword', [UserController::class, 'alterarPassword'])->name('alterarPassword');
Route::post('updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');


//carrinho
Route::get('carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::put('carrinho/filmes/{filme}', [CarrinhoController::class, 'update_filme'])->name('carrinho.index_update');
Route::delete('carrinho/filmes/{filme}', [CarrinhoController::class, 'destroy_filme'])->name('carrinho.index_des');
Route::post('carrinho', [CarrinhoController::class, 'store_filme'])->name('carrinho.index_post');

//pagamento
Route::get('pagamento', [PagamentoController::class, 'index'])->name('pagamento.index');


//cria pasta atalho storage
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});




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


    //Users
    Route::get('/users', [UserController::class, 'admin_utilizadores'])->name('users');
    Route::get('users/{Users}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('users/{Users}', [UserController::class, 'update'])->name('users.update');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::delete('users/{Users}', [UserController::class, 'destroy'])->name('users.destroy');


    });
});

Auth::routes(['register' => true]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
