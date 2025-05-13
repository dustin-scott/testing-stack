<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('backlog', function () {
    return Inertia::render('Backlog');
})->middleware(['auth', 'verified'])->name('backlog');

Route::get('backlog/new', function () {
    return Inertia::render('Backlog');
})->middleware(['auth', 'verified'])->name('backlog.new');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
