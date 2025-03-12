<?php
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::post("/submit", [TestController::class, 'storeName']);