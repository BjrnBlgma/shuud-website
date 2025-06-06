<?php
use App\Http\Controllers\web\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [HomeController::class, 'showMainPage'])->name('home');

Route::get('/enter-to-admin', function () {
    return Inertia::render('Admin/WelcomeAdmin');
})->name('enter-to-admin');

Route::get('/forbidden', function () {
    return Inertia::render('Admin/Forbidden');
})->name('forbidden');
