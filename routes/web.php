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
    Route::get('superadmin/users/changestatus/{id}', [App\Http\Controllers\SuperAdmin\UsersController::class, 'changeStatus'])->name('superadmin-user-changestatus');
   
   

    Route::resource('superadmin/module', App\Http\Controllers\SuperAdmin\ModulesController::class)->names('modules');
    Route::get('superadmin/module/changestatus/{id}', [App\Http\Controllers\SuperAdmin\ModulesController::class, 'changeStatus'])->name('superadmin-module-changestatus');

    Route::resource('superadmin/roles', App\Http\Controllers\SuperAdmin\RolesController::class)->names('roles');
    Route::get('superadmin/roles/changestatus/{id}', [App\Http\Controllers\SuperAdmin\RolesController::class, 'changeStatus'])->name('superadmin-roles-changestatus');

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

/*Subscription module start*/
Route::get('superadmin/subscription/changestatus/{id}', [App\Http\Controllers\SuperAdmin\SubscriptionsController::class, 'changeStatus'])
    ->name('superadmin-subscription-changestatus');
Route::resource('superadmin/subscription', App\Http\Controllers\SuperAdmin\SubscriptionsController::class);
/*Subscription module end*/

Route::resource('superadmin/users', App\Http\Controllers\SuperAdmin\ManageUserController::class);

Route::resource('superadmin/device', App\Http\Controllers\SuperAdmin\DeviceController::class);
/* Email templates module start*/
Route::get('superadmin/email/changestatus/{id}', [App\Http\Controllers\SuperAdmin\EmailTemplatesController::class, 'changeStatus'])
    ->name('superadmin-email-changestatus');
Route::resource('superadmin/email', App\Http\Controllers\SuperAdmin\EmailTemplatesController::class);
/* Email templates module start*/
    
/*Vouchers module start*/
Route::get('superadmin/vouchers/changestatus/{id}', [App\Http\Controllers\SuperAdmin\VouchersController::class, 'changeStatus'])
    ->name('superadmin-vouchers-changestatus');
Route::resource('superadmin/vouchers', App\Http\Controllers\SuperAdmin\VouchersController::class);
/*Vouchers module end*/

    Route::resource('superadmin/predictionfiles', App\Http\Controllers\SuperAdmin\PredictionFilesController::class);

    Route::resource('superadmin/videos', App\Http\Controllers\SuperAdmin\VideosController::class);

    Route::resource('superadmin/questions', App\Http\Controllers\SuperAdmin\questionsController::class);

    Route::resource('superadmin/subjects', App\Http\Controllers\SuperAdmin\SubjectsController::class);

    Route::resource('superadmin/transactions', App\Http\Controllers\SuperAdmin\TransactionsController::class);

    Route::resource('superadmin/certificates', App\Http\Controllers\SuperAdmin\CertificatesController::class);

    Route::resource('superadmin/tests', App\Http\Controllers\SuperAdmin\TestsController::class);

    Route::get('superadmin/tests/add', [App\Http\Controllers\SuperAdmin\TestsController::class, 'add'])
    ->name('superadmin-tests-add');