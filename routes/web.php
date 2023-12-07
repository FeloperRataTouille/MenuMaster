<?php
use App\Http\Middleware\VerificarComanda;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComandaController;
use App\Http\Controllers\PratoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
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

Route::post('/cardapio', [ComandaController::class, 'store'])->name('store.comanda');
Route::get('/cardapio', [PratoController::class, 'show'])->name('cardapio')->middleware(('verificarComanda'));
Route::get('/prato', [PratoController::class, 'index'])->name('prato');
Route::post('/prato', [PratoController::class, 'store'])->name('store.prato');
Route::post('/pedido', [PedidoController::class, 'store'])->name('store.pedido');
Route::get('/pedidos', [PedidoController::class, 'show'])->name('pedidos');
Route::get('/comandas', [ComandaController::class, 'show'])->name('show.comandas');
Route::put('/prato/{id}', [PratoController::class, 'update'])->name('prato.update');
Route::delete('/prato/{id}', [PratoController::class, 'delete'])->name('prato.delete');
Route::delete('/pedido/{id}', [PedidoController::class, 'delete'])->name('pedido.delete');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'index'])->name('register.index');
Route::post('/register', [UserController::class, 'register'])->name('register.register');
