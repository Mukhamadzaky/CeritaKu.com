<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ProfileController; // Pastikan ini ditambahkan

// Rute Publik (Bisa diakses tanpa login)
Route::get('/', [StoryController::class, 'index'])->name('home');
Route::get('/cerita', [StoryController::class, 'allStories'])->name('stories.all');
Route::get('/cerita/{id}', [StoryController::class, 'show'])->name('stories.show');

// Rute Privat (Harus login)
Route::middleware(['auth'])->group(function () {
    
    // --- Rute untuk Fitur Cerita ---
    Route::get('/tulis', [StoryController::class, 'create'])->name('stories.create');
    Route::post('/tulis', [StoryController::class, 'store'])->name('stories.store');
    Route::get('/penulis/karyaku', [StoryController::class, 'myStories'])->name('stories.mine');
    Route::post('/cerita/{id}/like', [StoryController::class, 'toggleLike'])->name('stories.like');
    Route::post('/cerita/{id}/comment', [StoryController::class, 'comment'])->name('stories.comment');

    // --- Rute untuk Fitur Profil (Bawaan Breeze yang kembali ditambahkan) ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';