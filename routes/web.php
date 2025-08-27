<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/add_blog', [BlogController::class, 'index'])->name('add_blog');
    Route::post('add_blog_process', [BlogController::class, 'create'])->name('add_blog_process');

    Route::get('/read_blogs', [BlogController::class, 'read_blogs'])->name('read_blogs');

    Route::get('/update_blog/{id}', [BlogController::class, 'update_blogs'])->name('update_blog');
    Route::post('/update_blog_process/{id}', [BlogController::class, 'update_blog_process'])->name('update_blog_process');

    Route::post('/delete_blog/{id}', [BlogController::class, 'delete_blog'])->name('delete_blog');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
