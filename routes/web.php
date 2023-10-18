<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Modules\MasterData\MasterDataController;
use App\Http\Controllers\Modules\MasterData\Products\ProductController;
use App\Http\Controllers\Modules\MasterData\Users\User\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    if (auth()->check()) {
        return view('dashboard.index'); // User is logged in, so redirect to home.blade.php
    } else {
        return view('auth.login'); // User is not logged in, so redirect to login.blade.php
    }
});

Route::resource('roles', RoleController::class);

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Masterdata routes
Route::prefix('masterdata')->name('masterdata.')->group(function () {
    // Main master data index route
    Route::get('/', [MasterDataController::class, 'index'])->name('index');
    // Products routes
    Route::prefix('products')->name('products.')->group(function () {
        // Product index route
        Route::get('/', [ProductController::class, 'index'])->name('index');
        // Standard CRUD routes for products
        Route::resource('product', ProductController::class)->except(['destroy']);
    });

    // Users routes
    Route::prefix('users')->name('users.')->group(function () {
        // Product index route
        Route::get('/', [UserController::class, 'index'])->name('index');
        // Standard CRUD routes for products
        Route::resource('user', UserController::class)->except(['destroy']);
    });
})->middleware(['auth']);

