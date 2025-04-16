<?php

use App\Http\Controllers\HallController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage', ['title' => 'Homepage']);
});
Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/coba', function () {
    return view('coba');
});



Route::get('/hall', [HallController::class, 'index']);
Route::get('/hall/{book:slug}', [HallController::class, 'detailBook']);
Route::get('/hall/author/{author:slug}', [HallController::class, 'bookByAuthor']);
Route::get('/hall/category/{category:slug}', [HallController::class, 'bookByCategory']);

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/registration', [LoginController::class, 'registration'])->middleware('guest');
Route::post('/registration', [LoginController::class, 'store'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'isAdmin']);