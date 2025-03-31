<?php

use App\Http\Controllers\PromocionController;
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

Route::get('/promociones', function () {
    return view('promociones'); // Carga la vista productos.blade.php
})->name('promociones');


Route::get('/promociones', [PromocionController::class, 'index'])->name('promocion.index');
// Route::get("/", [PromocionController::class, "index"])->name("promocion.index");

Route::get('/promociones/create', [PromocionController::class, 'create'])->name('promocion.create');

Route::post('/promociones', [PromocionController::class, 'store'])->name('promocion.store');

//Route::post('/promociones/edit', [PromocionController::class, 'update'])->name('promocion.update');

Route::put('/promociones/{id}/edit', [PromocionController::class, 'update'])->name('promocion.update');

Route::delete('/promociones/{id}', [PromocionController::class, 'destroy'])->name('promocion.destroy');


