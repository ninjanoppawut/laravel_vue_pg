<?php
use App\Http\Controllers\formController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('test', function () {
    return Inertia::render('Test');
})->middleware(['auth', 'verified'])->name('test');
Route::resource("form", formController::class);
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
