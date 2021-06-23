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
    Route::get('superadmin/users/showpassword/{id}', [App\Http\Controllers\SuperAdmin\UsersController::class, 'showPassword'])->name('superadmin-user-showpassword');
    Route::patch('superadmin/users/setpassword/{id}', [App\Http\Controllers\SuperAdmin\UsersController::class, 'setPassword'])->name('superadmin-user-setpassword');
   
   

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

/*Subjects module start*/
Route::get('superadmin/subjects/changestatus/{id}', [App\Http\Controllers\SuperAdmin\SubjectsController::class, 'changeStatus'])
    ->name('superadmin-subjects-changestatus');
Route::resource('superadmin/subjects', App\Http\Controllers\SuperAdmin\SubjectsController::class);
/*Subjects module end*/


/*Tests Modules start*/
    Route::get('superadmin/tests/mocktest', [App\Http\Controllers\SuperAdmin\TestsController::class, 'mockTests'])
        ->name('superadmin-tests-mocktest');
    Route::get('superadmin/tests/changestatus/{id}', [App\Http\Controllers\SuperAdmin\TestsController::class, 'changeStatus'])
        ->name('superadmin-tests-changestatus');
    Route::get('superadmin/tests/addQuestions', [App\Http\Controllers\SuperAdmin\TestsController::class, 'addQuestions'])
        ->name('superadmin-tests-addQuestions');
Route::resource('superadmin/tests', App\Http\Controllers\SuperAdmin\TestsController::class);
/*Tests Modules end*/

/*Questions Modules start*/
Route::resource('superadmin/questions', App\Http\Controllers\SuperAdmin\questionsController::class);
/* writing sesction */
Route::post('superadmin/questions/summarize', [App\Http\Controllers\SuperAdmin\questionsController::class,'storeSummarizeWritten'])->name('add-summarize-written');
Route::post('superadmin/questions/essay', [App\Http\Controllers\SuperAdmin\questionsController::class,'storeEssayWritting'])->name('add-essay-writting');

/* speaking sesction */
Route::post('superadmin/questions/readaloud', [App\Http\Controllers\SuperAdmin\questionsController::class,'storeReadAloud'])->name('add-read-aloud');
Route::post('superadmin/questions/repeatsentence', [App\Http\Controllers\SuperAdmin\questionsController::class,'storeRepeatSentence'])->name('add-repeat-sentence');

/*Questions Modules end*/

    Route::resource('superadmin/predictionfiles', App\Http\Controllers\SuperAdmin\PredictionFilesController::class);

    Route::resource('superadmin/videos', App\Http\Controllers\SuperAdmin\VideosController::class);

    Route::resource('superadmin/subjects', App\Http\Controllers\SuperAdmin\SubjectsController::class);

    Route::resource('superadmin/transactions', App\Http\Controllers\SuperAdmin\TransactionsController::class);

    Route::resource('superadmin/certificates', App\Http\Controllers\SuperAdmin\CertificatesController::class);

    

    Route::resource('superadmin/results', App\Http\Controllers\SuperAdmin\TestResultsController::class);

    Route::get('superadmin/tests/add', [App\Http\Controllers\SuperAdmin\TestsController::class, 'add'])
    ->name('superadmin-tests-add');
