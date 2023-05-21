<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('/profile', [\App\Http\Controllers\UserController::class, 'profile']);
Route::post('/auth', [\App\Http\Controllers\AuthController::class, 'login']);
Route::get('/login', [\App\Http\Controllers\UserController::class, 'login']);
Route::post('/save', [\App\Http\Controllers\UserController::class, 'save']);
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
