<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Dashboard::class, 'index'])->name('homepage');

Route::get('/browse/all',                                            [Dashboard::class, 'index'])->name('homepage');
Route::get('/browse/{course_topics}', [Dashboard::class, 'course_topics'])->name('course_topics');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
