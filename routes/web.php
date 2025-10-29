<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('hakkimda', [PageController::class, 'about'])->name('about');
Route::prefix('hizmetler')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('services.index');
    Route::get('{slug}', [ServiceController::class, 'show'])->name('services.show');
});
Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('{blog}', [BlogController::class, 'show'])->name('blogs.show');
});
Route::get('tags/{tag}', [TagController::class, 'show'])->name('tags.show');
Route::post('submit-message', ContactMessageController::class)->name('submit-message');

