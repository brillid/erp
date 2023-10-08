<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Modules\MasterData\MasterDataController;
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

Route::get('master-data', [MasterDataController::class, 'index'])->name('master.data.index');
