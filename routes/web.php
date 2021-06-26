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
    Route::get('superadmin/roles/changestatus/{id}', [App\Http\Controllers\SuperAdmin\RolesController::class,'changeStatus'])->name('superadmin-roles-changestatus');

    Route::get('superadmin/setting', [App\Http\Controllers\HomeController::class, 'setting'])->name('superadmin-setting');

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
    Route::get('superadmin/tests/add', [App\Http\Controllers\SuperAdmin\TestsController::class, 'add'])
    ->name('superadmin-tests-add');
/*Tests Modules end*/

/*Questions Modules start*/
Route::post('superadmin/questions/updateReadingWritingFillInTheBlanks', [App\Http\Controllers\SuperAdmin\questionsController::class,'updateReadingWirtingFillInTheBlanks'])
->name('superadmin-question-update-readingwriting-fillintheblanks');
Route::post('superadmin/questions/storeReadingMultipleChoiceMultipleanswers', [App\Http\Controllers\SuperAdmin\questionsController::class,'storeMultipleChoiceMultipleanswers'])
->name('superadmin-question-store-MultipleChoice-Multipleanswers');
Route::post('superadmin/questions/updateReadingMultipleChoiceMultipleanswers', [App\Http\Controllers\SuperAdmin\questionsController::class,'updateMultipleChoiceMultipleanswers'])
->name('superadmin-question-update-MultipleChoice-Multipleanswers');
Route::resource('superadmin/questions', App\Http\Controllers\SuperAdmin\questionsController::class);

Route::resource('superadmin/questions', App\Http\Controllers\SuperAdmin\questionsController::class);
Route::patch('superadmin/questions', [App\Http\Controllers\SuperAdmin\questionsController::class,'storeSummarizeWritten'])->name('add-summarize-written');
/*Questions Modules end*/

/* start listening section */
Route::post('superadmin/questions/summarizespokenitem', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'storeSummarizeSpokenItem'])->name('add-summarize-spoken-item');
Route::post('superadmin/questions/editsummarizespokenitem', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'updateSummarizeSpokenItem'])->name('update-summarize-spoken-item');

Route::post('superadmin/questions/choosemultipleanswersitem', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'storeChooseMultipleAnswersItem'])->name('add-choose-multiple-answers-item');
Route::post('superadmin/questions/editchoosemultipleanswersitem', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'updateChooseMultipleAnswersItem'])->name('update-choose-multiple-answers-item');

Route::post('superadmin/questions/fillintheblanks', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'storeFillInTheBlanks'])->name('add-fill-in-the-blanks');
Route::post('superadmin/questions/editfillintheblanks', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'updateFillInTheBlanks'])->name('update-fill-in-the-blanks');

Route::post('superadmin/questions/highlightcorrectsummaryitem', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'storeHighlightCorrectSummaryItem'])->name('add-highlight-correct-summary-item');
Route::post('superadmin/questions/edithighlightcorrectsummaryitem', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'updateHighlightCorrectSummaryItem'])->name('update-highlight-correct-summary-item');

Route::post('superadmin/questions/storeListenMultipleChoiceChooseSingle', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'storeMultipleChoiceChooseSingle'])->name('store-listen-multiple-choice-choose-single');
Route::post('superadmin/questions/updateListenMultipleChoiceChooseSingle', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'updateMultipleChoiceChooseSingle'])->name('update-listen-multiple-choice-choose-single');

Route::post('superadmin/questions/storeListenMissingWordItem', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'storeMissingWordItem'])->name('store-listen-missing-word-item');
Route::post('superadmin/questions/updateListenMissingWordItem', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'updateMissingWordItem'])->name('update-listen-missing-word-item');

Route::post('superadmin/questions/storeWriteFormDictations', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'storeWriteFormDictations'])->name('store-listen-write-form-dictations');
Route::post('superadmin/questions/updateWriteFormDictations', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'updateWriteFormDictations'])->name('update-listen-write-form-dictations');
/* end listening section */

/* start writing section */
Route::post('superadmin/questions/summarize', [App\Http\Controllers\SuperAdmin\writingQuestionController::class,'storeSummarizeWritten'])->name('add-summarize-written');
Route::post('superadmin/questions/editsummarize', [App\Http\Controllers\SuperAdmin\writingQuestionController::class,'updateSummarizeWritten'])->name('update-summarize-written');

Route::post('superadmin/questions/essay', [App\Http\Controllers\SuperAdmin\writingQuestionController::class,'storeEssayWritting'])->name('add-essay-writting');
Route::post('superadmin/questions/editessay', [App\Http\Controllers\SuperAdmin\writingQuestionController::class,'updateEssayWritting'])->name('update-essay-writting');
/* end writing section */

/* start speaking section */
Route::post('superadmin/questions/readaloud', [App\Http\Controllers\SuperAdmin\speakingQuestionController::class,'storeReadAloud'])->name('add-read-aloud');
Route::post('superadmin/questions/editreadaloud', [App\Http\Controllers\SuperAdmin\speakingQuestionController::class,'updateReadAloud'])->name('update-read-aloud');

Route::post('superadmin/questions/repeatsentence', [App\Http\Controllers\SuperAdmin\speakingQuestionController::class,'storeRepeatSentence'])->name('add-repeat-sentence');
Route::post('superadmin/questions/editrepeatsentence', [App\Http\Controllers\SuperAdmin\speakingQuestionController::class,'updateRepeatSentence'])->name('update-repeat-sentence');

Route::post('superadmin/questions/describeimage', [App\Http\Controllers\SuperAdmin\speakingQuestionController::class,'storeDescribeImage'])->name('add-describe-image');
Route::post('superadmin/questions/editdescribeimage', [App\Http\Controllers\SuperAdmin\speakingQuestionController::class,'updateDescribeImage'])->name('update-describe-image');

Route::post('superadmin/questions/retelllecture', [App\Http\Controllers\SuperAdmin\speakingQuestionController::class,'storeReTellLecture'])->name('add-re-tell-lecture');
Route::post('superadmin/questions/editretelllecture', [App\Http\Controllers\SuperAdmin\speakingQuestionController::class,'updateReTellLecture'])->name('update-re-tell-lecture');

Route::post('superadmin/questions/answershortquestion', [App\Http\Controllers\SuperAdmin\speakingQuestionController::class,'storeAnswerShortQuestion'])->name('add-answer-short-question');
Route::post('superadmin/questions/editanswershortquestion', [App\Http\Controllers\SuperAdmin\speakingQuestionController::class,'updateAnswerShortQuestion'])->name('update-answer-short-question');
/* end speaking section */

/*Reading section questions start*/
Route::post('superadmin/questions/readingStoreFillInTheBlanks', [App\Http\Controllers\SuperAdmin\ReadingQuestionController::class,'storeFillInTheBlanks'])
    ->name('superadmin-reading-store-fill-in-the-blanks');

Route::post('superadmin/questions/updateReadingWritingFillInTheBlanks', [App\Http\Controllers\SuperAdmin\ReadingQuestionController::class,'updateFillInTheBlanks'])
    ->name('superadmin-question-update-readingwriting-fillintheblanks');

Route::post('superadmin/questions/storeReadingMultipleChoiceMultipleanswers', [App\Http\Controllers\SuperAdmin\ReadingQuestionController::class,'storeMultipleChoiceMultipleanswers'])
    ->name('superadmin-question-store-MultipleChoice-Multipleanswers');

Route::post('superadmin/questions/updateReadingMultipleChoiceMultipleanswers', [App\Http\Controllers\SuperAdmin\ReadingQuestionController::class,'updateMultipleChoiceMultipleanswers'])
    ->name('superadmin-question-update-MultipleChoice-Multipleanswers');

Route::post('superadmin/questions/storeReOrderParagraphs', [App\Http\Controllers\SuperAdmin\ReadingQuestionController::class,'storeReOrderParagraph'])
    ->name('superadmin-question-store-re-order-paragraph');

Route::post('superadmin/questions/updateReOrderParagraphs', [App\Http\Controllers\SuperAdmin\ReadingQuestionController::class,'updateReOrderParagraph'])
    ->name('superadmin-question-update-re-order-paragraph');

Route::post('superadmin/questions/storeFillInTheBlanks', [App\Http\Controllers\SuperAdmin\ReadingQuestionController::class,'storeReadingFillInTheBlanks'])
    ->name('superadmin-question-store-fill-in-the-blanks');

Route::post('superadmin/questions/updateFillInTheBlanks', [App\Http\Controllers\SuperAdmin\ReadingQuestionController::class,'updateReadingFillInTheBlanks'])
    ->name('superadmin-question-update-fill-in-the-blanks');
    
/*Reading section questions end*/


Route::resource('superadmin/predictionfiles', App\Http\Controllers\SuperAdmin\PredictionFilesController::class);

Route::resource('superadmin/transactions', App\Http\Controllers\SuperAdmin\TransactionsController::class);

Route::resource('superadmin/certificates', App\Http\Controllers\SuperAdmin\CertificatesController::class);

Route::resource('superadmin/results', App\Http\Controllers\SuperAdmin\TestResultsController::class);

Route::resource('superadmin/device', App\Http\Controllers\SuperAdmin\DeviceController::class);



 

/*Videos module start*/
Route::resource('superadmin/videos', App\Http\Controllers\SuperAdmin\VideosController::class);
Route::get('superadmin/videos/changestatus/{id}', [App\Http\Controllers\SuperAdmin\VideosController::class, 'changeStatus'])
    ->name('superadmin-videos-changestatus');
/*Videos module end*/
