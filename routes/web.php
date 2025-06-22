<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

            // Subscription Plans Routes
            Route::get('/plans/all', [PlansController::class, 'index'])->name('plans_all');
            Route::get('/plans/add', [PlansController::class, 'create'])->name('plans_add');
            Route::get('/plans/edit', [PlansController::class, 'edit'])->name('plans_edit');
            Route::get('/plans/export', [PlansController::class, 'export_data'])->name('plans_export');


        // ================ POST REQUESTS ==============================
    });
});


// Admin Routes
Route::get('/',[AdminController::class, 'index'])->name('home');
Route::get('/home',[AdminController::class, 'index'])->name('home');
