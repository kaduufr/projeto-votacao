<?php

use App\Http\Controllers\ChapaController;
use App\Http\Controllers\EleicaoController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\VotoController;
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

Route::get('/', [AppController::class, 'index'])->name('home');

Route::prefix('/eleicao')->group(function () {
  Route::get('/cadastrar', [EleicaoController::class, 'new'])->name('new_eleicao');
  Route::post('/cadastrar', [EleicaoController::class, 'create'])->name('create_eleicao');
  Route::get('/{id}', [EleicaoController::class, 'show'])->name('show_eleicao');
});

Route::prefix('/votar')->group(function () {
  Route::post('/{id}', [VotoController::class, 'create'])->name('create_voto');
  Route::get('/{id}', [VotoController::class, 'new'])->name('new_voto');
});

Route::prefix('/chapas')->group(function () {
  Route::get('/', [ChapaController::class, 'index'])->name('chapas_index');
  Route::get('/editar/{id}', [ChapaController::class, 'edit'])->name('edit_chapa');
  Route::put('/editar', [ChapaController::class, 'update'])->name('update_chapa');
  Route::get('/{id}', [ChapaController::class, 'show'])->name('show_chapa');
  Route::delete('/{id}', [ChapaController::class, 'destroy'])->name('delete_chapa');
});
