<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComandaController;
use App\Http\Controllers\PratoController;
use App\Http\Controllers\PedidoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [ComandaController::class, 'index'])->name('index');

Route::post('/comanda', [ComandaController::class, 'store'])->name('store.comanda');
Route::get('/cardapio', [PratoController::class, 'show'])->name('cardapio');
Route::get('/prato', [PratoController::class, 'index'])->name('prato');
Route::post('/prato', [PratoController::class, 'store'])->name('store.prato');
Route::post('/pedido', [PedidoController::class, 'store'])->name('store.pedido');
Route::get('/pedidos', [PedidoController::class, 'show'])->name('pedidos');