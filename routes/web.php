<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Modules\Admin\AdminController;
use App\Http\Controllers\Modules\Admin\Roles\RoleController;
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

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Masterdata routes
Route::prefix('masterdata')->name('masterdata.')->group(function () {
    Route::get('/', [MasterDataController::class, 'index'])->name('index');
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::resource('product', ProductController::class)->except(['destroy']);
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::resource('user', UserController::class)->except(['destroy']);
    });
})->middleware(['auth']);

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::prefix('roles')->name('roles.')->group(function() {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::resource('role', RoleController::class)->except(['destroy']);
    });
})->middleware(['auth']);