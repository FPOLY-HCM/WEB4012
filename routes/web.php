<?php

declare(strict_types=1);

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Livewire\EditProfile;
use App\Livewire\Posts\Create;
use App\Livewire\Posts\Index;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class)->name('home');
Route::get('categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('posts', Index::class)->name('posts.index');
Route::get('posts/create', Create::class)->name('posts.create');
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', EditProfile::class)->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
