<?php

use App\Http\Controllers\CadastroController;
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

Route::get('/', function () {
    return view('index');
});

Route::prefix('/cadastro')->group(function() {
    Route::get('/', [CadastroController::class, 'index'])->name('web.cadastro.index');
    Route::get('/checkin', [CadastroController::class, 'checkin'])->name('web.cadastro.checkin');
    Route::get('/checkin/{id}', [CadastroController::class, 'editInscricao'])->name('web.cadastro.checkin.edit');
    Route::get('/gerar/{id}', [CadastroController::class, 'gerarCracha'])->name('web.cadastro.cracha');

    Route::post('/', [CadastroController::class, 'form_cadastrar'])->name('web.cadastro.form_cadastrar');
});
