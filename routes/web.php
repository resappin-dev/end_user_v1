<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KerupukController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['verify' => true]);

// Auth Routes
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'storeRegister']);
Route::get('/logout', [AuthController::class, 'logout']);

// Email Verification Routes
Route::get('/verify-email/{email}', [AuthController::class, 'verifyEmail']);
Route::get('/verify-success/{email}', [AuthController::class, 'verifySuccess']);
Route::get('/failed-verification', [AuthController::class, 'failedVerification']);
Route::get('/pending-verification', [AuthController::class, 'pendingVerification']);
Route::get('/email/resend', 'AuthController@resendEmailVerification')->name('verification.resend');
// Route::get('/email/verify/{id}/{hash}', 'AuthController@verifyEmail')->name('verification.verify');

// Password Reset Routes
Route::get('/forgot-password', [AuthController::class, 'forget']);
Route::post('/forgot-verify', [AuthController::class, 'forgetVerify']);
Route::get('/reset-password/{email}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'updatePassword'])->name('password.update');

// Public Routes
Route::get('/', [KerupukController::class, 'index']);
Route::get('/details-product/{id}', [KerupukController::class, 'showDetails'])->name('details-product');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/store-review', [KerupukController::class, 'store'])->name('store-review');
});
