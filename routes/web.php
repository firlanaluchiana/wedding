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

    Route::get('/wedding', [WeddingController::class, 'index'])->name('wedding.index');
    Route::get('/wedding/create', [WeddingController::class, 'create'])->name('wedding.create');
    Route::post('/wedding', [WeddingController::class, 'store'])->name('wedding.store');
    Route::get('/wedding/{slug}', [WeddingController::class, 'showBySlug'])->name('wedding.showBySlug');
    Route::get('/wedding/{slug}/edit', [WeddingController::class, 'edit'])->name('wedding.edit');
    Route::put('/wedding/{slug}', [WeddingController::class, 'update'])->name('wedding.update');
    Route::delete('/wedding/{slug}', [WeddingController::class, 'destroy'])->name('wedding.destroy');

});

Route::get('/storage/{any}', function ($any) {
    return response()->file(storage_path('app/' . $any));
})->where('any', '.*');
