<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('hakkimda', [PageController::class, 'about'])->name('about');
Route::prefix('hizmetler')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('services.index');
    Route::get('{slug}', [ServiceController::class, 'show'])->name('services.show');
});
Route::prefix('bloglar')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('{slug}', [BlogController::class, 'show'])->name('blogs.show');
});
Route::post('submit-message', ContactMessageController::class)->name('submit-message');

