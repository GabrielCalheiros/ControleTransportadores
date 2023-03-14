<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FornecedorController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::post('/empresas', 'EmpresaController@store')->name('empresas.store');
//Route::post('/empresas', [App\Http\Controllers\EmpresaController::class, 'store'])->name('empresas.store');
//Route::get('/empresas/create', [App\Http\Controllers\EmpresaController::class, 'create'])->name('empresas.create');
//Route::post('/empresas', [App\Http\Controllers\EmpresaController::class, 'store'])->name('empresas.store');

Route::get('/empresas/create', [App\Http\Controllers\EmpresaController::class, 'create'])->name('empresas.create');
Route::post('/empresas', [App\Http\Controllers\EmpresaController::class, 'store'])->name('empresas.store');



Route::get('/fornecedores/create', [FornecedorController::class, 'create'])->name('fornecedores.create');
Route::post('/fornecedores', [FornecedorController::class, 'store'])->name('fornecedores.store');
