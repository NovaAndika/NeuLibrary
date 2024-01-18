<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});
Route::get('/search', [SearchController::class, 'index']);
Route::post('/borrow-book', [PinjamController::class, 'borrowBook']);
Route::post('/return-book', [PinjamController::class, 'returnBook']);
Route::get('/cart-status', [PinjamController::class, 'getCartStatus']);
Route::post('/add-to-cart', [BukuController::class, 'addToCart']);

Route::group(['prefix' => 'kuro'], function () {
    Route::get('/detil', [PinjamController::class, 'index']);
    Route::post('/pinjam', [PinjamController::class, 'store']);
    Route::put('/peminjaman/{id}', [PinjamController::class, 'update']);
    Route::delete('/peminjaman/{id}', [PinjamController::class, 'destroy']);
});

// Route::post('/pinjam-buku', [SaleController::class, 'pinjamBuku']);
// Route::put('/kembalikan-buku/{id}', [SaleController::class, 'kembalikanBuku']);
// Route::get('/buku', [SaleController::class, 'index']);
// Route::get('/buku/{id}', [SaleController::class, 'show']);
// Route::post('/sales', [SaleController::class, ' updatePeminjaman']);
// Route::group(['middleware' => 'guest'], function () {
//     Route::resource('sale', SaleController::class);
//     Route::get('/sale', SaleController::class);
// });
