<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/app', function () {
    return view('app');
});

Route::get('/producto', function () {
    return view('productos.new');
})->name('new_product');

Route::get('/list', [ProductosController::class, 'index'])->name('index');

Route::post('/producto', [ProductosController::class, 'store'])->name('new_product');

Route::get('/producto/{id}', [ProductosController::class, 'show'])->name('producto-show');

Route::patch('/producto/{id}', [ProductosController::class, 'update'])->name('producto-update');

Route::delete('/producto/{id}', [ProductosController::class, 'destroy'])->name('producto-destroy');

