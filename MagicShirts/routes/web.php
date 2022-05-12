<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CoresController;
use App\Http\Controllers\EncomendasController;
use App\Http\Controllers\EstampasController;
use App\Http\Controllers\PrecosController;
use App\Http\Controllers\TshirtsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagamentoController;
use App\Http\Middleware\VerifyIfIsAdmin;

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

//Route::get('/', function () {
    /* dd('ca');*/
     //return view('categorias.index');
//});

Route::get('/', [EstampasController::class, 'index'])->name('home');
//Route::redirect('/', '/categorias', 301);
//Route::get('', [PageController::class, 'index'])->name('home');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('categorias', [CategoriasController::class, 'index'])->name('categorias.index');
Route::get('clientes', [ClientesController::class, 'index'])->name('clientes.index');
Route::get('cores', [CoresController::class, 'index'])->name('cores.index');

Route::get('encomendas', [EncomendasController::class, 'create'])->name('encomendas.index');
Route::post('encomendas', [EncomendasController::class, 'store'])->name('encomendas.index');

Route::get('estampas', [EstampasController::class, 'index'])->name('estampas.index');
Route::get('estampas/filtro', [EstampasController::class, 'index_filter'])->name('estampas.index_filter');
//Route::get('categorias', [EstampasController::class, 'categ'])->name('estampas.categ');
Route::get('precos', [PrecosController::class, 'index'])->name('precos.index');
Route::get('users', [UsersController::class, 'index'])->name('users.index');
Route::get('carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::get('carrinho/show/{estampas}', [CarrinhoController::class, 'show_estampa'])->name('carrinho.index_show');
Route::post('carrinho', [CarrinhoController::class, 'store_estampa'])->name('carrinho.index_post');
Route::put('carrinho/estampas/{estampa}', [CarrinhoController::class, 'update_estampa'])->name('carrinho.index_update');
Route::delete('carrinho/estampas/{estampa}', [CarrinhoController::class, 'destroy_estampa'])->name('carrinho.index_des');
Route::get('pagamento', [PagamentoController::class, 'index'])->name('pagamento.index');
Route::delete('estampa/{Estampa}', [EstampasController::class, 'destroy'])->name('estampa.destroy');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    //dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


    //Users

    Route::middleware([VerifyIfIsAdmin::class])->group(function () {
        //Users
        Route::get('users', [UsersController::class, 'admin_index'])->name('users');
        Route::get('users/{Users}/edit', [UsersController::class, 'edit'])->name('users.edit');
        Route::patch('users/{Users}', [UsersController::class, 'update'])->name('users.update');
        Route::delete('users/{Users}', [UsersController::class, 'destroy'])->name('users.destroy');
        //Tshirts
        Route::get('tshirts', [TshirtsController::class, 'admin_index'])->name('tshirts');
        Route::get('tshirts/{Tshirts}/edit', [TshirtsController::class, 'edit'])->name('tshirts.edit');
        Route::patch('tshirts/{Tshirts}', [TshirtsController::class, 'update'])->name('tshirts.update');
        Route::delete('tshirts/{Tshirts}', [TshirtsController::class, 'destroy'])->name('tshirts.destroy');
        //Precos
        Route::get('precos', [PrecosController::class, 'admin_index'])->name('precos');
        Route::get('precos/{Precos}/edit', [PrecosController::class, 'edit'])->name('precos.edit');
        Route::patch('precos/{Precos}', [PrecosController::class, 'update'])->name('precos.update');
        Route::delete('precos/{Precos}', [PrecosController::class, 'destroy'])->name('precos.destroy');

        //Estampas
        Route::get('estampas', [EstampasController::class, 'admin_estampas'])->name('estampas');
        Route::get('estampas/{Estampas}/edit', [EstampasController::class, 'edit'])->name('estampas.edit');
        Route::patch('estampas/{Estampas}', [EstampasController::class, 'update'])->name('estampas.update');
        Route::delete('estampas/{Estampas}', [EstampasController::class, 'destroy'])->name('estampas.destroy');

        //Encomendas
        Route::get('encomendas', [EncomendasController::class, 'admin_index'])->name('encomendas');
        Route::get('encomendas/{Encomendas}/edit', [EncomendasController::class, 'edit'])->name('encomendas.edit');
        Route::patch('encomendas/{Encomendas}', [EncomendasController::class, 'update'])->name('encomendas.update');
        Route::delete('encomendas/{Encomendas}', [EncomendasController::class, 'destroy'])->name('encomendas.destroy');

        //Categorias
        Route::get('categorias', [CategoriasController::class, 'admin_index'])->name('categorias');
        Route::get('categorias/{Categorias}/edit', [CategoriasController::class, 'edit'])->name('categorias.edit');
        Route::patch('categorias/{Categorias}', [CategoriasController::class, 'update'])->name('categorias.update');
        Route::delete('categorias/{Categorias}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');

        //Clientes
        Route::get('clientes', [ClientesController::class, 'admin_index'])->name('clientes');
        Route::get('clientes/{Clientes}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
        Route::patch('clientes/{Clientes}', [ClientesController::class, 'update'])->name('clientes.update');
        Route::delete('clientes/{Clientes}', [ClientesController::class, 'destroy'])->name('clientes.destroy');

        //Cores
        Route::get('cores', [CoresController::class, 'admin_index'])->name('cores');
        Route::get('cores/{Cores}/edit', [CoresController::class, 'edit'])->name('cores.edit');
        Route::patch('cores/{Cores}', [CoresController::class, 'update'])->name('cores.update');
        Route::delete('cores/{Cores}', [CoresController::class, 'destroy'])->name('cores.destroy');

        //carinho
        Route::get('carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
        Route::get('carrinho/show/{estampas}', [CarrinhoController::class, 'show_estampa'])->name('carrinho.index_show');
        Route::post('carrinho', [CarrinhoController::class, 'store_estampa'])->name('carrinho.index_post');
        Route::put('carrinho/estampas/{estampa}', [CarrinhoController::class, 'update_estampa'])->name('carrinho.index_update');
        Route::delete('carrinho/estampas/{estampa}', [CarrinhoController::class, 'destroy_estampa'])->name('carrinho.index_des');

    });
});


Auth::routes(/*['register' => false]*/);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('estampasPrivadas', [EstampasController::class, 'estampasPrivadas'])->name('estampasPrivadas');
Route::get('estampas/{estampa}/imagem', [EstampasController::class, 'getEstampa'])->name('estampas.privada');
