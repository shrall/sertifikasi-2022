<?php

use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\HistoryController as AdminHistoryController;
use App\Http\Controllers\Admin\PositionController as AdminPositionController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::post('/search', [PageController::class, 'search'])->name('search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['customer'], 'prefix' => 'customer', 'as' => 'customer.'], function () {
    Route::resource('admin', AdminController::class);
    Route::resource('book', BookController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('history', HistoryController::class);
    Route::resource('position', PositionController::class);
    Route::resource('user', UserController::class);
});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('admin', AdminAdminController::class);
    Route::resource('book', AdminBookController::class);
    Route::resource('customer', AdminCustomerController::class);
    Route::resource('history', AdminHistoryController::class);
    Route::resource('position', AdminPositionController::class);
    Route::resource('user', AdminUserController::class);
});
