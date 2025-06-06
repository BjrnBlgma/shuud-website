<?php

use App\Http\Controllers\web\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::middleware(['auth', 'verified', 'admin_or_support'])->group(function () {
    // роуты для админа и поддержки
});


//Route::get('/{any}', function () {
//    return Inertia::render('Admin/404');
//});



require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

require __DIR__.'/shuud.php';
