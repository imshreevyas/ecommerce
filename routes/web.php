<?php

use App\Http\Controllers\front\AuthController;
use App\Http\Controllers\front\IndexController;
use App\Http\Controllers\front\CartController;
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

Route::get('/', [IndexController::class, 'index'])->name('home');

// route for login
Route::post('/requestOtp', [AuthController::class, 'requestOtp']);
Route::post('/loginOtp', [AuthController::class, 'login']);


Route::get('/product-detail/{id}', [IndexController::class, 'productDetail'])->name('product-detail');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/addToCart',[CartController::class,'addCart'])->name('addToCart');
    Route::post('/removeCart',[CartController::class,'removeCart'])->name('removeCart');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/account-details',[AuthController::class,'userAccount'])->name('account-details');
    Route::get('/account-order',function(){
        return view('front.account-order');
    })->name('account-order');
    Route::post('/userUpdate',[AuthController::class,'userUpdate'])->name('userUpdate');
});
