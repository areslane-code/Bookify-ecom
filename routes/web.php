<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Home page route
Route::get('/', [BookController::class, "index"]);

// Book routing
Route::get('/book', [BookController::class, "search"]);

Route::get('/book/{id}', [BookController::class, "show"]);


// User routing
Route::get('/signup', [UserController::class, "create"])->middleware("guest");

Route::post('/signup-check', [UserController::class, "store"])->middleware("guest");

Route::get('/login', [UserController::class, "loginShow"])->middleware("guest")->name("login");

Route::post('/login-check', [UserController::class, "login"])->middleware("guest");

Route::get('/logout', [UserController::class, "logout"])->middleware("auth");

Route::get('/account', [UserController::class, "edit"])->middleware("auth");
Route::post('/account/update-password', [UserController::class, "updatePassword"])->middleware("auth");
Route::post('/account/update-infos', [UserController::class, "updateInfos"])->middleware("auth");

// Review Routing

Route::get('/reviews', [ReviewController::class, "index"])->middleware("auth");

Route::post('/book/{book_id}/create-review', [ReviewController::class, "create"])->middleware("auth");

Route::post('/reviews/{id}/update', [ReviewController::class, "update"])->middleware("auth");

Route::delete('/reviews/{id}/delete', [ReviewController::class, "delete"])->middleware("auth");

// Order Routing

Route::get('/orders', [OrderController::class, "index"])->middleware("auth");

Route::get('/orders/create', [OrderController::class, "create"])->middleware("auth");

Route::post('/order/store', [OrderController::class, "store"])->middleware("auth");

Route::get('/order/edit/{id}', [OrderController::class, "edit"])->middleware("auth");

Route::post('/order/update', [OrderController::class, "update"])->middleware("auth");

Route::post('/order/cancel', [OrderController::class, "cancel"])->middleware("auth");



Route::get('/orders/cart/delete-item/{id}', [OrderController::class, "deleteItemFromCart"])->middleware("auth");

Route::post('/cart/add', [OrderController::class, "addToCart"])->middleware("auth");


// coupon routing
Route::post('/check-coupon', [CouponController::class, "check"])->middleware("auth");
Route::delete('/cancel-coupon', [CouponController::class, "cancel"])->middleware("auth");
