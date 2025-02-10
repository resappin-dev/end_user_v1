<?php

use App\Http\Controllers\KerupukController;
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

Route::get('/', [KerupukController::class, 'index']);
Route::get('/details-product/{id}', [KerupukController::class, 'showDetails'])->name('details-product');
Route::post('/store-review', [KerupukController::class, 'store'])->name('store-review');