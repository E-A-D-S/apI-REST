<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\UFController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\BairroController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('enderecos')->group(function () {
    Route::get('/', [EnderecoController::class, 'index'])->name('endereco.index');

    Route::post('/store', [EnderecoController::class, 'store'])->name('endereco.store');

    Route::put('/edit/{id}', [EnderecoController::class, 'edit'])->name('endereco.edit');

    Route::delete('/destroy', [EnderecoController::class, 'destroy'])->name('endereco.destroy');
});


Route::prefix('pessoas')->group(function () {
    Route::get('/', [PessoaController::class, 'index'])->name('pessoa.index');

    Route::post('/store', [PessoaController::class, 'store'])->name('pessoa.store');

    Route::put('/edit/{id}', [PessoaController::class, 'edit'])->name('pessoa.edit');

    Route::delete('/destroy', [PessoaController::class, 'destroy'])->name('pessoa.destroy');
});


Route::prefix('uf')->group(function () {
    Route::get('/', [UFController::class, 'index'])->name('uf.index');

    Route::post('/store', [UFController::class, 'store'])->name('uf.store');

    Route::put('/edit/{id}', [UFController::class, 'edit'])->name('uf.edit');

    Route::delete('/destroy', [UFController::class, 'destroy'])->name('uf.destroy');
});

Route::prefix('municipios')->group(function () {
    Route::get('/', [MunicipioController::class, 'index'])->name('municipio.index');

    Route::post('/store', [MunicipioController::class, 'store'])->name('municipio.store');

    Route::put('/edit/{id}', [MunicipioController::class, 'edit'])->name('municipio.edit');

    Route::delete('/destroy', [MunicipioController::class, 'destroy'])->name('municipio.destroy');
});

Route::prefix('bairros')->group(function () {
    Route::get('/', [BairroController::class, 'index'])->name('bairro.index');

    Route::post('/store', [BairroController::class, 'store'])->name('bairro.store');

    Route::put('/edit/{id}', [BairroController::class, 'edit'])->name('bairro.edit');

    Route::delete('/destroy', [BairroController::class, 'destroy'])->name('bairro.destroy');
});
