<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('registration' , [UserController::class, 'regis']);
Route::get('registration' , [UserController::class, 'registration'])->name('registration');

Route::get('/' , [HomeController::class, 'index'])->middleware('auth');
Route::get('home', function () {
    return "oke";
});