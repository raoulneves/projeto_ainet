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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes(['verify' => true]);
//Route::get('/', [FilmeController::class, 'index'])->name('exibicao.index');

Route::get('/', [App\Http\Controllers\FilmeController::class, 'index'])->name('filme');
Route::get('/detalheFilme', [App\Http\Controllers\FilmeController::class, 'detalheFilme'])->name('detalhe_filme');
Route::get('exibicao/detalhe', [App\Http\Controllers\FilmeController::class, 'detalheFilme'])->name('exibicao.detalhe');

Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth')->name('admin.dashboard');


/*Route::middleware([VerifyIfIsAdmin::class])->group(function () {
    //dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

});*/

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('disciplinas', [DisciplinaController::class, 'admin_index'])->name('disciplinas');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});
