<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BacklogController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('backlog', [BacklogController::class, 'list'])->name('backlog');
    Route::get('backlog/new', [BacklogController::class, 'form'])->name('backlog.new');

    Route::post('backlog/new', [BacklogController::class, 'create'])->name('backlog.create');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
