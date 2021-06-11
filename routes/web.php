<?php

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
Route::get('/', function () {
    return view('page_not_found');
    //return view('welcome');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();

//start Super admin routes
Route::group(['middleware' => ['auth', 'verified','superadmin']], function () { 
    Route::get('superadmin/dashboard', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('superadmin/users', App\Http\Controllers\SuperAdmin\UsersController::class)->names('users');

});
//end Super admin routes

Route::group(['middleware' => ['auth', 'verified','branchadmin']], function () {
    //start branch admin routes
    Route::get('branchadmin/dashboard', [App\Http\Controllers\BranchAdmin\DashboardController::class, 'index'])->name('dashboard');

    //end branch admin routes

});

Route::group(['middleware' => ['auth', 'verified','student']], function () {
    //start student admin routes
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //end student admin routes
});


    Route::resource('superadmin/subscription', App\Http\Controllers\SuperAdmin\SubscriptionsController::class);

    

    Route::resource('superadmin/device', App\Http\Controllers\SuperAdmin\DeviceController::class);

    Route::resource('superadmin/email', App\Http\Controllers\SuperAdmin\EmailTemplatesController::class);

