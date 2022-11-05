<?php

use App\Http\Controllers\VotacaoController;
use App\Http\Controllers\AppController;
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

Route::prefix('/votacao')->group(function () {
    Route::get('/cadastrar', [VotacaoController::class, 'new']);
    Route::post('/cadastrar', [VotacaoController::class, 'create'])->name('create_poll');
});
