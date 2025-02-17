<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/admin-login', [AdminController::class, 'adminLogin'])->name('custom.login');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');

        /** User Management */
        Route::resource('users', UserController::class);
        Route::resource('wallets', WalletController::class);

        /**User Charges */
        Route::get('user-charges', [UserController::class, 'userCharges'])->name('user-charges');
        Route::patch('users/{user}/update-user-charges', [UserController::class, 'updateUserCharges'])->name('users.update-chargeable-amount');
        Route::get('user-weight-slab', [UserController::class, 'user_weight_slab'])->name('user-weight-slab');
        Route::get('courier-rate-slab', [UserController::class, 'courier_rate_slab'])->name('courier-rate-slab');
        Route::patch('/wallets/{wallet}/update-status', [WalletController::class, 'updateStatus'])->name('wallets.updateStatus');
    });
});
