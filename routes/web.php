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


Route::group(['middleware' => ['auth', 'verified','superadmin']], function () { //start Super admin routes
	Route::get('superadmin/dashboard', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'index'])->name('dashboard');
	//end Super admin routes

});

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

<<<<<<< HEAD

    Route::resource('superadmin/users', App\Http\Controllers\SuperAdmin\ManageUserController::class);
=======
    Route::resource('superadmin/users/index', App\Http\Controllers\SuperAdmin\ManageUserController::class);
>>>>>>> bd306e1632190f0a9ecf094b0c37f28546b962e5

    Route::resource('superadmin/device', App\Http\Controllers\SuperAdmin\DeviceController::class);


