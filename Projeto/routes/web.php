<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\DashboardController;



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

Route::get('/home', [FilmeController::class, 'index'])->name('home');

//Route::get('/', [FilmeController::class, 'index'])->name('exibicao.index');

Route::get('/', [FilmeController::class, 'index'])->name('filme');
Route::get('/detalheFilme', [FilmeController::class, 'detalheFilme'])->name('detalhe_filme');
Route::get('exibicao/detalhe', [FilmeController::class, 'detalheFilme'])->name('exibicao.detalhe');

//Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth')->name('admin.dashboard');


/*Route::middleware([VerifyIfIsAdmin::class])->group(function () {
    //dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

});*/

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    //dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware([VerifyIfIsAdmin::class])->group(function () {


    });


});
Auth::routes();
