<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;

Route::get('/', [StoryController::class, 'index'])->name('home');
Route::get('/tulis', [StoryController::class, 'create'])->name('stories.create');
Route::post('/tulis', [StoryController::class, 'store'])->name('stories.store');
Route::get('/cerita/{id}', [StoryController::class, 'show'])->name('stories.show');
