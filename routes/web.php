<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// переименовать вход в панель упралвения, так как '/' будет отображаться главная страница сайта
Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

// переименовать панель упралвения на другое имя, например, /admin
Route::get('/forbidden', function () {
    return Inertia::render('Forbidden');
})->name('forbidden');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
