<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{WeddingController, AdminController, HomeController, StoryController, GalleryController};
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

    Route::get('/story', [StoryController::class, 'index'])->name('story.index');
    Route::get('wedding/{wedding}/story/create', [StoryController::class, 'create'])->name('story.create');
    Route::post('wedding/{wedding}/story', [StoryController::class, 'store'])->name('story.store');
    Route::get('wedding/{wedding}/story/{story}/edit', [StoryController::class, 'edit'])->name('story.edit');
    Route::put('wedding/{wedding}/story/{story}', [StoryController::class, 'update'])->name('story.update');
    Route::delete('wedding/{wedding}/story/{story}', [StoryController::class, 'destroy'])->name('story.destroy');
    Route::get('wedding/{wedding}/story/{story}', [StoryController::class, 'show'])->name('story.show');

    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('wedding/{wedding}/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('wedding/{wedding}/gallery', [GalleryController::class, 'store'])->name('story.store');
    Route::get('wedding/{wedding}/gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('wedding/{wedding}/gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('wedding/{wedding}/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    Route::get('wedding/{wedding}/gallery/{gallery}', [GalleryController::class, 'show'])->name('gallery.show');

});

Route::get('/storage/{any}', function ($any) {
    return response()->file(storage_path('app/' . $any));
})->where('any', '.*');
