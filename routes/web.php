<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Products
Route::get('/', [productsController::class, 'getProductsData']);
Route::view('add', 'add');
Route::post('add', [productsController::class, 'storeProductsData']);
Route::get('moreinfo/{id}', [productsController::class, 'ProductData']);
Route::get('edit/{id}', [productsController::class, 'getEditData']);
Route::post('edit', [productsController::class, 'editProductData']);
Route::get('delete/{id}', [productsController::class, 'deleteProductData']);
Route::post('/search', [productsController::class, 'searchProductData']);
// User Rating
Route::get('rating/{id}', [RatingController::class, 'productRating']);
Route::post('rating', [RatingController::class, 'storeProductRating']);
// Authentication
Route::view('register', 'register');
Route::post('register', [UserController::class, 'registerUser']);
Route::view('login', 'login');
Route::post('login', [UserController::class, 'loginUser']);
Route::get('logout', [UserController::class, 'logoutUser']);