<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ImportarController;
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
    Route::get('/listar', [CadastroController::class, 'checkin'])->name('web.cadastro.list');
    Route::get('/edit/{id}', [CadastroController::class, 'editInscricao'])->name('web.cadastro.checkin.edit');
    Route::get('/checkin/{id}', [CadastroController::class, 'editCheckin'])->name('web.cadastro.checkin.');
    Route::get('/gerar/{id}', [CadastroController::class, 'gerarCracha'])->name('web.cadastro.cracha');

    Route::post('/', [CadastroController::class, 'form_cadastrar'])->name('web.cadastro.form_cadastrar');
});

Route::prefix('/importar')->group(function() {
    Route::get('/', [ImportarController::class, 'index'])->name('web.importar.index');
    Route::post('/load', [ImportarController::class, 'importar_planilha'])->name('web.importar.load');
});
