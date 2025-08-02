<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\GeneralSettingController;

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

    Route::post('/sendOtp',[AdminController::class, 'sendOtp'])->name('adminLoginPost');
    Route::post('/verifyOTP',[AdminController::class, 'verifyOTP'])->name('verifyOTP');

    // Google Login Routes
    Route::get('/auth/google/redirect',[AdminController::class, 'google_redirect'])->name('auth.google.redirect');
    Route::get('/auth/google/callback',[AdminController::class, 'google_callback'])->name('auth.google.callback');

    Route::middleware('admin.auth')->group(function () {

        // ================ GET REQUESTS ==============================

            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
            Route::get('/settings/all',[GeneralSettingController::class,'index'])->name('settings');
            Route::get('/account',[AdminController::class,'profile'])->name('profile');
            Route::get('/account/update',[AdminController::class,'edit_profile'])->name('edit-profile');
            

            // Products Routes
            Route::get('/product/add', [ProductController::class, 'create'])->name('add_product');
            Route::get('/product/edit', [PlansController::class, 'edit'])->name('plans_edit');
            Route::get('/product/manage', [ProductController::class, 'index'])->name('manage_products');
            Route::get('/product/export', [PlansController::class, 'export_data'])->name('plans_export');

            // Category Routes
            Route::get('/category/add', [CategoryController::class, 'create'])->name('add_category');
            Route::get('/category/edit', [CategoryController::class, 'edit'])->name('edit_category');
            Route::get('/category/manage', [CategoryController::class, 'index'])->name('manage_category');
            Route::get('/category/get_all_category', [CategoryController::class, 'get_all_categories'])->name('get_all_category');


        // ================ POST REQUESTS ==============================

            // Profile POST routes
            Route::post('/account/update_brand_details',[CompanyProfileController::class,'update_brand_details'])->name('update-brand-details');
            Route::post('/account/update_logo',[CompanyProfileController::class,'update_logo'])->name('update-update-logo');
            Route::post('/account/update_basic_details',[AdminController::class,'update_basic_details'])->name('update-basic-details');
            Route::post('/account/update-brand-social-media',[CompanyProfileController::class,'update_brand_social_media'])->name('update-brand-social-media');

            // Product Routes
            Route::post('/product/create', [ProductController::class, 'store'])->name('create_product');
            Route::post('/product/update', [ProductController::class, 'update'])->name('update_product');
            Route::post('/product_images/update', [ProductImageController::class, 'update_image'])->name('update_product_images');
            Route::post('/product_images/delete', [ProductImageController::class, 'delete_image'])->name('delete_product_images');

            // Category Routes
            Route::post('/category/store', [CategoryController::class, 'store'])->name('categories.store');
            Route::post('/category/update', [CategoryController::class, 'update'])->name('categories.update');
            Route::post('/category/update-category-status', [CategoryController::class, 'update_category_status'])->name('update_category_status');
            
            // General Settings
            Route::post('/general_settings/update',[GeneralSettingController::class,'update'])->name('settingEdit');
            Route::post('/general_settings/update-maintenance-status',[GeneralSettingController::class,'update_maintenance_status'])->name('update-maintenance-status');
            Route::post('/general_settings/update-general-settings',[GeneralSettingController::class,'update_general_settings'])->name('update-general-settings');
            
            // Admin Account
            Route::post('/account/{id}',[AdminController::class,'adminAccountUpdate'])->name('adminAccountUpdate');
            Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    });
});


// Admin Routes
Route::get('/',[AdminController::class, 'index'])->name('home');
Route::get('/home',[AdminController::class, 'index'])->name('home');
