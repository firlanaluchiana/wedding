<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{WeddingController, AdminController, HomeController};
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::resource('wedding', WeddingController::class);
});

Route::get('/storage/{any}', function ($any) {
    return response()->file(storage_path('app/' . $any));
})->where('any', '.*');