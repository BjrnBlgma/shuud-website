<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::get('/', function () {
//    return Inertia::render('Home', ['title' => 'Главная страница']);
//})->name('home');

// переименовать вход в панель управления, так как '/' будет отображаться главная страница сайта
Route::get('/enter-to-admin', function () {
    return Inertia::render('Admin/WelcomeAdmin');
})->name('enter-to-admin');


Route::get('/forbidden', function () {
    return Inertia::render('Forbidden');
})->name('forbidden');

//Route::get('/{any}', function () {
//    return Inertia::render('Admin/404');
//});



require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
