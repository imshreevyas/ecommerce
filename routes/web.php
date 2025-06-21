<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function(){

    // ================ Strting Basic without AUTH REQUESTS ==============================

    Route::get('/',[AdminController::class, 'index'])->name('login');
    Route::get('/login',[AdminController::class, 'index'])->name('login');
    Route::get('/forgot-password',[AdminController::class, 'index'])->name('forgot-password');
    Route::post('/login',[AdminController::class, 'sendOtp'])->name('adminLoginPost');
    Route::post('/verifyOTP',[AdminController::class, 'verifyOTP'])->name('verifyOTP');

    // Google Login Routes
    Route::get('/auth/google/redirect',[AdminController::class, 'google_redirect'])->name('auth.google.redirect');
    Route::get('/auth/google/callback',[AdminController::class, 'google_callback'])->name('auth.google.callback');

    // Route::middleware('admin.auth')->group(function () {

        // ================ GET REQUESTS ==============================

            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
            Route::get('/settings/all',[GeneralSettingController::class,'index'])->name('settings');
            Route::get('/account',[AdminController::class,'adminAccountPage'])->name('admin_accounts');

            // Products Routes
            Route::get('/product/add', [ProductController::class, 'index'])->name('add_product');
            Route::get('/product/edit', [PlansController::class, 'edit'])->name('plans_edit');
            Route::get('/product/manage', [PlansController::class, 'edit'])->name('manage_products');
            Route::get('/product/export', [PlansController::class, 'export_data'])->name('plans_export');

            // Category Routes
            Route::get('/category/add', [CategoryController::class, 'index'])->name('add_category');
            Route::get('/category/edit', [CategoryController::class, 'edit'])->name('edit_category');
            Route::get('/category/manage', [CategoryController::class, 'edit'])->name('manage_category');


        // ================ POST REQUESTS ==============================

            // Product Routes
            Route::post('/product/create', [ProductController::class, 'store'])->name('create_product');
            Route::post('/product/update', [ProductController::class, 'update'])->name('update_product');
            Route::post('/product_images/update', [ProductImageController::class, 'update_image'])->name('update_product_images');
            Route::post('/product_images/delete', [ProductImageController::class, 'delete_image'])->name('delete_product_images');

            // Category Routes
            Route::post('/category/create', [CategoryController::class, 'store'])->name('create_category');
            Route::post('/category/update', [CategoryController::class, 'update'])->name('update_category');
            
            // General Settings
            Route::post('/settings/all/',[AdminController::class,'settingEdit'])->name('settingEdit');
            Route::post('/settings/edit/{id}',[GeneralSettingController::class,'update'])->name('settingEdit');
            Route::post('/settings/delete/{id}',[GeneralSettingController::class,'destroy'])->name('settingEdit');
            Route::post('/settings/add',[GeneralSettingController::class,'store'])->name('settingAdd');
            
            // Admin Account
            Route::post('/account/{id}',[AdminController::class,'adminAccountUpdate'])->name('adminAccountUpdate');
            Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    // });
});


// Admin Routes
Route::get('/',[AdminController::class, 'index'])->name('home');
Route::get('/home',[AdminController::class, 'index'])->name('home');
