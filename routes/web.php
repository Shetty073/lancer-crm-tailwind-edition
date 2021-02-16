<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DuesController;
use App\Http\Controllers\EnquiriesController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\FollowupsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserAccountController;

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
    Route::get('signin', [AccountsController::class, 'index'])->name('signin.index');
    Route::post('signin', [AccountsController::class, 'signin'])->name('signin');
    Route::post('signout', [AccountsController::class, 'signout'])->name('signout');
});

// dashboard routes
Route::group(['prefix' => '/'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});

// enquiries routes
Route::group(['prefix' => '/enquiries'], function () {
    Route::get('/', [EnquiriesController::class, 'index'])->name('enquiries.index');
});

// followups routes
Route::group(['prefix' => '/followups'], function () {
    Route::get('/', [FollowupsController::class, 'index'])->name('followups.index');
});

// clients routes
Route::group(['prefix' => '/clients'], function () {
    Route::get('/', [ClientsController::class, 'index'])->name('clients.index');
});

// services routes
Route::group(['prefix' => '/services'], function () {
    Route::get('/', [ServicesController::class, 'index'])->name('services.index');
});

// dues routes
Route::group(['prefix' => '/dues'], function () {
    Route::get('/', [DuesController::class, 'index'])->name('dues.index');
});

// invoices routes
Route::group(['prefix' => '/invoices'], function () {
    Route::get('/', [InvoicesController::class, 'index'])->name('invoices.index');
});

// expenses routes
Route::group(['prefix' => '/expenses'], function () {
    Route::get('/', [ExpensesController::class, 'index'])->name('expenses.index');
});

// reports routes
Route::group(['prefix' => '/reports'], function () {
    Route::get('/', [ReportsController::class, 'index'])->name('reports.index');
});

// useraccount routes
Route::group(['prefix' => '/useraccount'], function () {
    Route::get('/', [UserAccountController::class, 'index'])->name('useraccount.index');
});
