<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Tasks as AdminTasks;
use App\Models\Task;

Route::view('/', 'welcome');

Route::get('/dashboard', function () {
    $userId = auth()->id();

    return view('dashboard', [
        'totalTasks' => Task::where('user_id', $userId)->count(),
        'completedTasks' => Task::where('user_id', $userId)->where('is_completed', true)->count(),
        'pendingTasks' => Task::where('user_id', $userId)->where('is_completed', false)->count(),
    ]);
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

Route::get('/tasks', \App\Livewire\Tasks::class)
    ->middleware(['auth'])
    ->name('tasks');

Route::get('/admin/tasks', AdminTasks::class)
    ->middleware(['auth', AdminMiddleware::class])
    ->name('admin.tasks');
