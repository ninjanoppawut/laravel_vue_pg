<?php
use App\Http\Controllers\formController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('test', TestController::class)->middleware(['auth', 'verified']);
Route::resource("form", formController::class);
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
