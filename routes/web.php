<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherAPIController;
use App\Http\Controllers\WeatherController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


// 管理者
Route::get('/admin', [UserController::class, 'index'])->name('admin');

// エンドユーザー
Route::get('/user', function () {
    return Inertia::render('EndUser');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::get('/', [WeatherController::class, 'index']);
// Route::get('/', [WeatherAPIController::class, 'weatherData'])->name('weatherAPI.data');

// // weathercontrollerを表示させて、検索したらweatherdataを表示させる必要がある。
// // コントローラーからコントローラーの呼び出し？