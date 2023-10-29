<?php

use App\Http\Controllers\Modules\Admin\RolesManager\RolesManagerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Modules\Admin\AdminController;
use App\Http\Controllers\Modules\MasterData\MasterDataController;
use App\Http\Controllers\Modules\MasterData\Products\ProductController;
use App\Http\Controllers\Modules\MasterData\Users\Roles\RoleController;
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
    // Landing page, checks if the user is logged in and redirects accordingly.
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
    // Landing page for the masterdata section.
    Route::get('/', [MasterDataController::class, 'index'])->name('index');

    // Products routes
    Route::prefix('products')->name('products.')->group(function () {
        // List all products.
        Route::get('/', [ProductController::class, 'index'])->name('index');
        // Resourceful routes for managing products, except for delete.
        Route::resource('product', ProductController::class)->except(['destroy']);
    });

    // Users routes
    Route::prefix('users')->name('users.')->group(function () {
        // List all users.
        Route::get('/', [UserController::class, 'index'])->name('index');
        // Resourceful routes for managing users, except for delete.
        Route::resource('user', UserController::class)->except(['destroy']);
    });

    // Roles routes
    Route::prefix('roles')->name('roles.')->group(function () {
        // List all roles.
        Route::get('/', [RoleController::class, 'index'])->name('index');
        // Resourceful routes for managing roles.
        Route::resource('roles', RoleController::class);
    });
})->middleware(['auth']);

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin dashboard.
    Route::get('/', [AdminController::class, 'index'])->name('index');

    // Roles Manager routes
    Route::prefix('roles-manager')->name('roles-manager.')->group(function () {
        // Display all roles with their permissions
        Route::get('/', [RolesManagerController::class, 'allRolesWithPermissions'])->name('all-roles');
        // Show the form for managing permissions for a role
        Route::get('/manage-permissions/{role}', [RolesManagerController::class, 'managePermissions'])->name('manage-permissions');
        // Update permissions for a role
        Route::patch('/update-permissions/{role}', [RolesManagerController::class, 'updatePermissions'])->name('update-permissions');
    });
})->middleware(['auth']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
