<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';


Route::middleware([AdminMiddleware::class])
    ->group(function () {
        Route::view('admin', 'admin')
            ->name('admin');
    });
