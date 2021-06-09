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
    return view('auth.login');
    //return view('welcome');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();


Route::group(['middleware' => ['auth']], function () {
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	Route::get('superadmin/dashboard', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'index'])->name('dashboard');

	Route::get('branchadmin/dashboard', [App\Http\Controllers\BranchAdmin\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('superadmin/subscription', App\Http\Controllers\SuperAdmin\SubscriptionsController::class);

    Route::resource('superadmin/users/index', App\Http\Controllers\SuperAdmin\ManageUserController::class);
});
