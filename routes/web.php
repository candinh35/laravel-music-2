<?php

use App\Http\Controllers\Admin\AdminAlbumController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminSingerController;
use App\Http\Controllers\Admin\AdminSongController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Client\ClientAlbumController;
use App\Http\Controllers\Client\ClientLoginController;
use App\Http\Controllers\Client\ClientPlaylistController;
use App\Http\Controllers\Client\ClientProfileController;
use App\Http\Controllers\Client\ClientRechargeController;
use App\Http\Controllers\Client\ClientRegisterController;
use App\Http\Controllers\Client\ClientSearchController;
use App\Http\Controllers\Client\ClientSingerController;
use App\Http\Controllers\Client\ClientTransactionController;
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\HomeController as ControllersHomeController;
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

Route::prefix('/admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});

Route::middleware('auth.admin')->prefix('/admin')->group(function () {
    // dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    //cateogries
    Route::resource('categories', AdminCategoryController::class);

    // singers
    Route::resource('singers', AdminSingerController::class);

    // users
    Route::resource('users', AdminUserController::class);

    // albums
    Route::resource('albums', AdminAlbumController::class);

    // songs
    Route::resource('songs', AdminSongController::class);
});

// user
Route::prefix('/')->group(function () {
    Route::get('', [ClientHomeController::class, 'index'])->name('client.home');

    //account
    Route::get('login', [ClientLoginController::class, 'index'])->name('client.login');
    Route::post('login', [ClientLoginController::class, 'login'])->name('client.login.submit');
    Route::get('logout', [ClientLoginController::class, 'logout'])->name('client.logout');
    Route::get('register', [ClientRegisterController::class, 'index'])->name('client.register');
    Route::post('register', [ClientRegisterController::class, 'register'])->name('client.register.submit');


    //albums
    Route::get('albums', [ClientAlbumController::class, 'index'])->name('client.albums');
    Route::get('albums/{album}', [ClientAlbumController::class, 'show'])->name('client.albums.detail');

    //singers
    Route::get('singers', [ClientSingerController::class, 'index'])->name('client.singers');
    Route::get('singers/{singer}', [ClientSingerController::class, 'show'])->name('client.singers.detail');

    // search
    Route::get('search', [ClientSearchController::class, 'search'])->name('client.search');

    //need login
    Route::middleware('auth.client')->group(function () {
        //profile
        Route::get('profile', [ClientProfileController::class, 'index'])->name('client.profile');
        Route::post('profile', [ClientProfileController::class, 'update'])->name('client.profile.update');

        Route::post('change-password', [ClientProfileController::class, 'updatePass'])->name('client.password.update');


        Route::get('playlist', [ClientPlaylistController::class, 'index'])->name('client.playlist');
        Route::post('playlist/{song}', [ClientPlaylistController::class, 'update'])->name('client.playlist.update');

        // nap tien vnpay
        Route::post('vnpay-payment', [ClientRechargeController::class, 'vnpayPayment'])->name('vnpay.payment');
        //
        Route::get('recharge', [ClientRechargeController::class, 'rechargeVnPay'])->name('client.recharge');

        Route::post('transactions/{song}', [ClientTransactionController::class, 'update'])->name('client.transactions.update');
    });
});
