<?php

use App\Http\Controllers\GaleryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/search', [GaleryController::class, 'search'])->name('search');
Route::get('/galeries',[GaleryController::class, 'index'])->name('home');

Route::get('/galeries-create', [GaleryController::class, 'create'])->name('galeries.create');
Route::post('/galeries-store', [GaleryController::class, 'store'])->name('galeries.store');
Route::get('/galeries-edit/{id}', [GaleryController::class, 'edit'])->name('galeries.edit');
Route::patch('galeries-update/{id}', [GaleryController::class, 'update'])->name('galeries.update');
Route::delete('/galeries-delete/{id}', [GaleryController::class, 'delete'])->name('galeries.delete');



