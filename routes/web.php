<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::middleware(['auth'])->group(function () {

Route::get('/bookings/index', [App\Http\Controllers\BookingController::class, 'index'])->name('bookings.index');
Route::post('/bookings', [App\Http\Controllers\BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings', [App\Http\Controllers\BookingController::class, 'view'])->name('bookings.view');
Route::get('/viewbooking/{user_id}', [App\Http\Controllers\BookingController::class, 'show'])->name('bookings.show');
});