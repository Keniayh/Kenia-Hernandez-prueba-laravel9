<?php

use App\Http\Controllers\PromocionController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

// Tiendas
Route::get('/tiendas', [TiendaController::class, 'index'])->name('tienda.index');
Route::get('/tiendas/create', [TiendaController::class, 'create'])->name('tienda.create');
Route::post('/tiendas', [TiendaController::class, 'store'])->name('tienda.store');
Route::put('/tiendas/{id}/edit', [TiendaController::class, 'update'])->name('tienda.update');
Route::delete('/tiendas/{id}', [TiendaController::class, 'destroy'])->name('tienda.destroy');

// Promociones
Route::get('/promociones', [PromocionController::class, 'index'])->name('promocion.index');
Route::get('/promociones/create', [PromocionController::class, 'create'])->name('promocion.create');
Route::post('/promociones', [PromocionController::class, 'store'])->name('promocion.store');
Route::put('/promociones/{id}', [PromocionController::class, 'update'])->name('promocion.update');
Route::delete('/promociones/{id}', [PromocionController::class, 'destroy'])->name('promocion.destroy');

// Usuarios
Route::get('/usuarios', [UserController::class, 'index'])->name('usuario.index');
Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuario.create');
Route::post('/usuarios', [UserController::class, 'store'])->name('usuario.store');
Route::put('/usuarios/{id}/edit', [UserController::class, 'update'])->name('usuario.update');
Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuario.destroy');
