<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('browse.all');
});

Route::get('/browse/all', [Dashboard::class, 'index'])->name('browse.all');
Route::get('/browse/{course_topics}', [Dashboard::class, 'course_topics'])->name('course_topics');
Route::get('/topics/{course_topic}', [Dashboard::class, 'course_topic'])->name('course_topic');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
