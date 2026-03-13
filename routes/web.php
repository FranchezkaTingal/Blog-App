<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::resource('posts', PostController::class)->middleware('auth');

Route::get('/my-posts', [PostController::class, 'index'])
    ->middleware('auth')
    ->name('my-posts');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()?->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    $posts = Post::with('user')->latest()->get();

    return view('dashboard', compact('posts'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::delete('/admin/posts/{post}', [AdminController::class, 'destroyPost'])->name('admin.posts.destroy');
    Route::patch('/admin/users/{user}/ban', [AdminController::class, 'banUser'])->name('admin.users.ban');
    Route::patch('/admin/users/{user}/toggle-role', [AdminController::class, 'toggleUserRole'])->name('admin.users.toggle-role');
});

require __DIR__.'/auth.php';
