<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\AuthAPI\LoginController;
use App\Http\Controllers\AuthAPI\ForgetPassController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [LoginController::class, 'login'])->name('login');

Route::post('register', [LoginController::class, 'register'])->name('register');

Route::post('sociallogin', [LoginController::class, 'socialLogin'])->name('socialLogin');

Route::post('forgetpass', [ForgetPassController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('resetpass', [ForgetPassController::class, 'resetPassword'])->name('resetPassword');

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('home', [HomeController::class, 'home'])->name('home');
    Route::post('myActiveOrders', [HomeController::class, 'myActiveOrders'])->name('myActiveOrders');
    Route::post('allOrders', [HomeController::class, 'allOrders'])->name('allOrders');
    Route::post('mySavedService', [HomeController::class, 'mySavedService'])->name('mySavedService');
    Route::post('profileDetail', [HomeController::class, 'profileDetail'])->name('profileDetail');
    Route::post('searchGig', [HomeController::class, 'searchGig'])->name('searchGig');
    Route::post('saveService', [HomeController::class, 'saveService'])->name('saveService');
    Route::post('getServicesdetail', [HomeController::class, 'getServicesdetail'])->name('getServicesdetail');
    Route::post('delFavService', [HomeController::class, 'delFavService'])->name('delFavService');
    Route::post('addService', [HomeController::class, 'addService'])->name('addService');
    Route::post('recentlyViewPost', [HomeController::class, 'recentlyViewPost'])->name('recentlyViewPost');
    Route::post('recentlyViewGet', [HomeController::class, 'recentlyViewGet'])->name('recentlyViewGet');
    Route::post('onlineStatus', [HomeController::class, 'onlineStatus'])->name('onlineStatus');
    
});
