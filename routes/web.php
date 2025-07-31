<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TracerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GraduatesController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AdminRegisterController;

// Middleware aliases (Laravel 12 style)
Route::aliasMiddleware('is_admin', \App\Http\Middleware\IsAdmin::class);
Route::aliasMiddleware('force_password_reset', \App\Http\Middleware\ForcePasswordReset::class);

// Public routes
Route::get('/', function () {
    if (Auth::check()) {
        // User is logged in, redirect based on role
        if (Auth::user()->role === 'admin') {
            return redirect('/home');       // Admin dashboard
        } else {
            return redirect('/user-home');  // Regular user dashboard
        }
    }

    // If not logged in, just show welcome page (no logout needed)
    return view('welcome');
});


// Laravel auth routes (login, register, password reset)
// Admin login and register routes
//Route::get('/x13mpsjh', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/x13mpsjh', [LoginController::class, 'login'])->name('login');

Route::get('/admin/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('admin.register.form');
Route::post('/admin/register', [AdminRegisterController::class, 'register'])->name('admin.register');


// Explicit POST logout route (optional if you want to customize)
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');

// Admin Register
Route::get('/admin/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('admin.register.form');
Route::post('/admin/register', [AdminRegisterController::class, 'register'])->name('admin.register');


// Tracer and general public routes
Route::get('/list-of-graduates', [GraduatesController::class, 'graduate_index'])->name('graduates.index');
Route::get('/agree', [TracerController::class, 'index_agree'])->name('agree');
Route::get('/terms&condition', [TracerController::class, 'terms_condition_index'])->name('termscondition');
Route::get('/thankyou', [TracerController::class, 'tracer_submit'])->name('submit');
Route::post('/tracer-submit', [TracerController::class, 'store'])->name('tracer.store');

/* Forget Password Routes */
Route::get('/forget-password', [RequestController::class, 'forget_password'])->name('forget_password');
Route::post('/forget-password/send-code', [RequestController::class, 'send_verification_code'])->name('password.sendcode');
Route::post('/forget-password/verify-code', [RequestController::class, 'verify_code'])->name('password.verifycode');
Route::post('/forget-password/reset-password', [RequestController::class, 'reset_password'])->name('password.reset.submit');

// Verification routes
Route::get('/verify', [TracerController::class, 'verification'])->name('verification.form');
Route::post('/verify', [TracerController::class, 'verifyCode'])->name('verification.submit');
Route::post('/resend-code', [TracerController::class, 'resendCode'])
    ->middleware('throttle:3,1')
    ->name('verification.resend');

// Authenticated user routes with force password reset middleware
Route::middleware(['auth', 'force_password_reset'])->group(function () {
    Route::get('/user-home', [UserController::class, 'index'])->name('user.home');

    // User profile routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/picture', [ProfileController::class, 'updatePicture'])->name('profile.update_picture');
});

// Password reset first-time route
Route::post('/password/reset-first', [UserController::class, 'resetFirstPassword'])
    ->middleware('auth')
    ->name('password.reset.first');

// Admin routes with is_admin middleware
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/home', [HomeController::class, 'dashboard'])->name('admin.home');
    Route::get('/dashboard', [HomeController::class, 'dashboard_index'])->name('admin.dashboard');
    Route::get('/list-of-request', [RequestController::class, 'request_index'])->name('request.index');
    Route::resource('users', UserController::class);
    Route::get('/graduates/{id}', [GraduatesController::class, 'show'])->name('graduates.show');
    Route::delete('/graduates/{id}', [GraduatesController::class, 'destroy'])->name('graduates.destroy');
    Route::put('/graduates/{id}', [GraduatesController::class, 'update'])->name('graduates.update');
});