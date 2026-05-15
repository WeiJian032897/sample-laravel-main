<?php

use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return redirect()->route('post.indexF');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login.submit');
    Route::get('logout', [AdminLoginController::class, 'logout'])->name('logout.test');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

    Route::middleware(['admin'])->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
    });

    Route::prefix('post')->name('post.')->middleware(['admin'])->group(function () {
        Route::get('list', [PostController::class, 'indexB'])->name('indexB');
        Route::get('view/{postId}', [PostController::class, 'showB'])->name('showB');
        Route::get('create', [PostController::class, 'createB'])->name('createB');
        Route::post('save', [PostController::class, 'storeB'])->name('storeB');
        Route::get('edit/{post}', [PostController::class, 'editB'])->name('editB');
        Route::post('update/{post}', [PostController::class, 'updateB'])->name('updateB');
        Route::delete('delete/{post}', [PostController::class, 'destroyB'])->name('destroyB');
        Route::patch('toggle/{post}', [PostController::class, 'togglePublish'])->name('togglePublish');
    });
});

Route::prefix('post')->name('post.')->group(function () {
    Route::get('list', [PostController::class, 'indexF'])->name('indexF');
    Route::get('view/{post}', [PostController::class, 'showF'])->name('showF');
});

// Health Check
Route::get('/ping', fn() => response()->json(['pong' => true]));
