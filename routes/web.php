<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// signup
Route::group(['prefix' => '/account'], function () {
    Route::get('signin', [AccountsController::class, 'index']);
    Route::post('signin', [AccountsController::class, 'signin'])->name('signin');
    Route::post('signout', [AccountsController::class, 'signout'])->name('signout');
});

// dashboard routes
Route::group(['prefix' => '/'], function () {
    Route::get('/', [DashboardController::class, 'index']);
});
