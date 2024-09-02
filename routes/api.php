<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\CouponAuthController;
use App\Http\Controllers\APIController\CompatibleDeviceController;
use App\Http\Controllers\APIController\ApiOrderController;
use App\Http\Controllers\APIController\TopupOrdersApiController;
use App\Http\Controllers\OrderController;

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




Route::post('register', [UserAuthController::class, 'register'])->name('register');
Route::post('login', [UserAuthController::class, 'login'])->name('login');

Route::post('delete/{id}', [UserAuthController::class, 'delete'])->name('delete');
Route::put('update', [UserAuthController::class, 'update'])->name('update');

Route::get('lists-category', [UserAuthController::class, 'list'])->name('lists-category');
// Route::get('list-category', [couponcontroller::class, 'list'])->name('list-category');

// apicrudecoupon
Route::get('listc', [CouponAuthController::class, 'listc'])->name('listc');


Route::controller(CompatibleDeviceController::class)->group(function () {
    Route::post('compatible-device', 'save')->name('compatible-device');
    Route::get('datacompatible-device', 'datacompatible')->name('datacompatible-device');
  
});

Route::controller(TopupOrdersApiController::class)->group(function () {
    Route::post('top-order-save', 'save')->name('top-order-save');
    Route::get('testorder', 'testorder')->name('testorder');
  
});

Route::controller(ApiOrderController::class)->group(function () {
    Route::post('order-save', 'save')->name('order-save');
      Route::get('data', 'data')->name('data');
  
});

Route::controller(OrderController::class)->group(function () {
    Route::post('post_data', 'post_data')->name('post_data');
    
  
});
