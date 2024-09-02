<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\str;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ESIMPlansController;
use App\Http\Controllers\TopupOrdersController;
use App\Http\Controllers\CompatibleDevicesController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SimsController;
use App\Http\Controllers\EsimCustomerController;
use App\Http\Controllers\SocialiteControllerController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\FrontController\FrontHomeController;
use App\Http\Controllers\FrontController\LoginController;



Route::get('/', function () {
    return redirect(route('home'));
});

Route::controller(PackageController::class)->group(function () {
    Route::get('store-package', 'store')->name('store_package');
});

Route::controller(SimsController::class)->group(function () {
    Route::get('get-esims-list', 'store')->name('get_esims_list');
    Route::get('test', 'test')->name('test');
});

Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('facebook-callback', [LoginController::class, 'handleFacebookCallback']);

Route::group(['prefix' => 'admin'], function () {
// Route::group(['middleware' => 'guest'], function(){
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login-check');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('signup', [SignupController::class, 'signup'])->name('signup');
Route::post('save-user', [SignupController::class, 'create'])->name('save-user');
Route::post('change-password', [SignupController::class, 'changepass'])->name('change-password');
Route::get('/forget', [SignupController::class, 'forget'])->name('forget');
Route::post('forget-password', [SignupController::class, 'forgetpassword'])->name('forget-password');
Route::get('otp_validation', [SignupController::class, 'otp_validation'])->name('otp_validation');
Route::post('validation', [SignupController::class, 'validation'])->name('validation');
Route::post('new_password', [SignupController::class, 'new_password'])->name('new_password');
// });

 Route::group(['middleware' => ['isAdmin']], function () {
    Route::resource('permissions',App\Http\Controllers\PermissionController::class);
    Route::get('permissions/{id}/destroy',[App\Http\Controllers\PermissionController::class,'destroy']);
    // ->middleware('permission:Delete')
    Route::resource('roles',App\Http\Controllers\RoleController::class);
    Route::get('roles/{id}/destroy',[App\Http\Controllers\RoleController::class,'destroy']);
    Route::get('roles/{roleid}/addpermissiontorole',[App\Http\Controllers\RoleController::class,'addpermissiontorole']);
    Route::PUT('roles/{roleid}/updatepermissiontorole',[App\Http\Controllers\RoleController::class,'updatepermissiontorole']);
    Route::controller(UserController::class)->group(function () {
      Route::get('user-index', 'index')->name('user-index');
      Route::get('user-create', 'create')->name('user-create');
      Route::post('user-store', 'store')->name('user-store');
      Route::get('user-edit/{id}', 'edit')->name('user-edit');
      Route::get('user-view/{id}', 'view')->name('user-view');
      Route::get('user-delete/{id}', 'delete')->name('user-delete');
  });

 });


    Route::get('dashboard', [DashboardController::class, 'dashboardAnalytics'])->name('dashboard');
    // Route::get('who_we_are', [WhoweareController::class, 'index'])->name('who_we_are');
    // Route::post('save-who-we-are', [WhoweareController::class, 'store'])->name('save-who-we-are');

    Route::controller(CountryController::class)->group(function () {

        Route::get('country', 'index')->name('country');
        Route::get('create-country', 'create')->name('create-country');
        Route::post('save-country', 'save')->name('save-country');
        Route::get('create-countrys/{id}', 'edit')->name('create-countrys');

    });

    Route::controller(ESIMPlansController::class)->group(function () {
        Route::get('e-sim-plan', 'index')->name('index_e_sim_plan');
        Route::get('create-e-sim-plan', 'create')->name('create_e_sim_plan');
        Route::post('store-e-sim-plan', 'store')->name('store_e_sim_plan');
        Route::get('edit-e-sim-plan/{id}', 'edit')->name('edit_e_sim_plan');

    });

    Route::controller(PackageController::class)->group(function () {
        Route::get('package', 'index')->name('index_package');
        Route::get('create-package', 'create')->name('create_package');
        Route::post('store-package', 'store')->name('store_package');
        Route::get('store-package', 'store')->name('store-package');
        Route::get('view-package/{id}', 'show')->name('view_package');
        Route::get('view-coverage/{id}', 'showCoverage')->name('view_coverage');

    });

    Route::controller(SimsController::class)->group(function () {
        Route::get('esims', 'index')->name('index_esims');
        Route::get('get-esims-list', 'store')->name('get_esims_list');

    });

    Route::controller(CompatibleDevicesController::class)->group(function () {

        Route::get('compatible-devices', 'index')->name('compatible-devices');
        Route::get('add-compatible-devices', 'add')->name('add-compatible-devices');
        Route::get('save-compatible-devices', 'save')->name('save-compatible-devices');
        Route::get('view-compatible-devices/{id}', 'edit')->name('view-compatible-devices');
        Route::get('delete-compatible-devices/{id}', 'delete')->name('delete-compatible-devices');


    });


    Route::controller(TopupOrdersController::class)->group(function () {
        Route::get('top-up-order-list', 'index')->name('top-up-order-list');
        Route::get('top-up-order-sync', 'sync')->name('top-up-order-sync');
        Route::get('top-up-order-view/{id}', 'view')->name('top-up-order-view');
    });

    Route::controller(OrderController::class)->group(function () {
        Route::get('order-list', 'index')->name('order-list');
        Route::get('order-sync', 'sync')->name('order-sync');
        Route::get('order-view/{id}', 'view')->name('order-view');
        Route::post('post_data', 'post_data')->name('post_data');

    });


});

//************************************************************Front view route ***********************************************************

Route::controller(FrontHomeController::class)->group(function () {
    Route::get('home', 'index')->name('home');
    Route::get('operator-id/{id}', 'operator')->name('operator');
    Route::get('shop-now-id/{id}', 'shopNow')->name('shopNow');
    Route::get('select-package/{id}', 'selectPackage')->name('select-package');
    Route::get('searchDestination', 'searchDestination')->name('searchDestination');
});

Route::controller(EsimCustomerController::class)->group(function () {
    Route::get('front_login', 'index')->name('front_login');
    Route::post('front_logout', 'front_logout')->name('front_logout');
    Route::get('signup', 'signup')->name('signup');
    Route::post('register', 'register')->name('register');
    Route::post('login-user', 'login')->name('login-user');

    Route::get('test', 'test')->name('test');
});

Route::get('auth/google', [SocialiteControllerController::class, 'redirectToGoogle']);

Route::get('auth/google/callback', [SocialiteControllerController::class, 'handleGoogleCallback']);

Route::get('paypal/checkout', [PayPalController::class, 'checkout'])->name('paypal.checkout');
Route::get('paypal/status', [PayPalController::class, 'getPaymentStatus'])->name('paypal.status');
Route::get('paypal/status', [PayPalController::class, 'getPaymentStatus'])->name('paypal.status');
Route::get('paypal/cancel', [PayPalController::class, 'cancel'])->name('paypal.cancel');



