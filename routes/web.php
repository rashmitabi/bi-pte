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

    // return view('page_not_found');

    return redirect('/login');

    //return view('welcome');

});

Route::get('/login', function () {

    return view('auth.login');

});

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();



/*Notifications module start*/

    Route::get('notifications', [App\Http\Controllers\NotificationController::class, 'getNotifications'])->name('notifications');

/*Notifications module end*/



//start Super admin routes

Route::group(['middleware' => ['auth', 'verified','superadmin']], function () { 

    Route::get('superadmin/dashboard', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('superadmin/dashboard/activitylogs', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'activitylogs'])->name('dashboard-activitylogs');
    Route::get('superadmin/dashboard/transactions', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'transactions'])->name('dashboard-transactions');
    Route::get('superadmin/dashboard/expired_subscriptions', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'expired_subscriptions'])->name('dashboard-expired-subscriptions');
    Route::get('superadmin/dashboard/near_to_expire', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'near_to_expire'])->name('dashboard-near-to-expire-subscriptions');
    Route::get('superadmin/dashboard/top_ranking_institutes', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'top_ranking_institutes'])->name('dashboard-top-ranking-institutes');


    Route::resource('superadmin/users', App\Http\Controllers\SuperAdmin\UsersController::class)->names('users');

    Route::get('instituteexport', [App\Http\Controllers\SuperAdmin\UsersController::class, 'instituteExport'])->name('superadmin-user-institute-export');
    Route::get('studentexport', [App\Http\Controllers\SuperAdmin\UsersController::class, 'studentExport'])->name('superadmin-user-student-export');
    
    
    Route::get('superadmin/users/userblock/{id}', [App\Http\Controllers\SuperAdmin\UsersController::class, 'singleUserBlock'])->name('superadmin-user-single-block');

    Route::post('superadmin/users/changestatusmodel', [App\Http\Controllers\SuperAdmin\UsersController::class, 'getChangeStatus'])->name('superadmin-user-getstatus');

    Route::post('superadmin/users/sendemailmodel', [App\Http\Controllers\SuperAdmin\UsersController::class, 'getSendEmail'])->name('superadmin-user-getsendemail');
    Route::post('superadmin/users/sendemail', [App\Http\Controllers\SuperAdmin\UsersController::class, 'SendEmail'])->name('superadmin-user-sendemailtemplate');

    Route::get('superadmin/users/changestatus/{id}', [App\Http\Controllers\SuperAdmin\UsersController::class, 'changeStatus'])->name('superadmin-user-changestatus');

    Route::get('superadmin/users/showpassword/{id}', [App\Http\Controllers\SuperAdmin\UsersController::class, 'showPassword'])->name('superadmin-user-showpassword');

    Route::patch('superadmin/users/setpassword/{id}', [App\Http\Controllers\SuperAdmin\UsersController::class, 'setPassword'])->name('superadmin-user-setpassword');

    Route::post('superadmin/users/showmocktest/{id}', [App\Http\Controllers\SuperAdmin\UsersController::class, 'showMockTest'])->name('superadmin-show-mock-test');

    Route::post('superadmin/users/assignmocktest/{id}', [App\Http\Controllers\SuperAdmin\UsersController::class, 'assignMockTest'])->name('superadmin-assign-mock-test');

    Route::get('superadmin/users/getAssignTest/{id}', [App\Http\Controllers\SuperAdmin\UsersController::class, 'getAssignTest'])->name('superadmin-user-get-assign-test');

    Route::post('superadmin/users/postAssignTest', [App\Http\Controllers\SuperAdmin\UsersController::class, 'postAssignTest'])->name('superadmin-user-post-assign-test');

    Route::post('superadmin/users/getMultipleAssignTest', [App\Http\Controllers\SuperAdmin\UsersController::class, 'getMultipleAssignTest'])->name('superadmin-user-get-multiple-assign-test');
    
    Route::post('superadmin/users/postMultipleAssignTest', [App\Http\Controllers\SuperAdmin\UsersController::class, 'postMultipleAssignTest'])->name('superadmin-user-post-multiple-assign-test');
   
    Route::get('superadmin/users/getAssignTest/{id}', [App\Http\Controllers\SuperAdmin\UsersController::class, 'getAssignTest'])->name('superadmin-user-get-assign-test');
    Route::post('superadmin/users/postAssignTest', [App\Http\Controllers\SuperAdmin\UsersController::class, 'postAssignTest'])->name('superadmin-user-post-assign-test');
    Route::post('superadmin/users/getMultipleAssignTest', [App\Http\Controllers\SuperAdmin\UsersController::class, 'getMultipleAssignTest'])->name('superadmin-user-get-multiple-assign-test');
    Route::post('superadmin/users/postMultipleAssignTest', [App\Http\Controllers\SuperAdmin\UsersController::class, 'postMultipleAssignTest'])->name('superadmin-user-post-multiple-assign-test');
    Route::post('superadmin/users/checkUniqueFields', [App\Http\Controllers\SuperAdmin\UsersController::class, 'checkUniqueUsername'])->name('superadmin-check-unique-validation');

    Route::post('superadmin/users/update/{id}', [App\Http\Controllers\SuperAdmin\UsersController::class, 'update'])
        ->name('superadmin-user-update');
    
    Route::resource('superadmin/module', App\Http\Controllers\SuperAdmin\ModulesController::class)->names('modules');

    Route::get('superadmin/module/changestatus/{id}', [App\Http\Controllers\SuperAdmin\ModulesController::class, 'changeStatus'])->name('superadmin-module-changestatus');



    Route::resource('superadmin/roles', App\Http\Controllers\SuperAdmin\RolesController::class)->names('roles');

    Route::get('superadmin/roles/changestatus/{id}', [App\Http\Controllers\SuperAdmin\RolesController::class,'changeStatus'])->name('superadmin-roles-changestatus');



    Route::resource('superadmin/results', App\Http\Controllers\SuperAdmin\TestResultsController::class);

    /*Vouchers module start*/
    Route::get('superadmin/vouchers/changestatus/{id}', [App\Http\Controllers\SuperAdmin\VouchersController::class, 'changeStatus'])
        ->name('superadmin-vouchers-changestatus');
    Route::resource('superadmin/vouchers', App\Http\Controllers\SuperAdmin\VouchersController::class);
    /*Vouchers module end*/

    
    /*Tests Modules start*/

        Route::get('superadmin/tests/mocktest', [App\Http\Controllers\SuperAdmin\TestsController::class, 'mockTests'])

            ->name('superadmin-tests-mocktest');

        Route::get('superadmin/tests/changestatus/{id}', [App\Http\Controllers\SuperAdmin\TestsController::class, 'changeStatus'])

            ->name('superadmin-tests-changestatus');

        Route::post('superadmin/tests/addQuestions', [App\Http\Controllers\SuperAdmin\TestsController::class, 'addQuestions'])

            ->name('superadmin-tests-addQuestions');

        Route::post('superadmin/tests/update/{id}', [App\Http\Controllers\SuperAdmin\TestsController::class, 'update'])

            ->name('superadmin-tests-update');

        Route::resource('superadmin/tests', App\Http\Controllers\SuperAdmin\TestsController::class);

        Route::get('superadmin/tests/add', [App\Http\Controllers\SuperAdmin\TestsController::class, 'add'])

        ->name('superadmin-tests-add');

    /*Tests Modules end*/



    /*Questions Modules start*/

    Route::post('superadmin/questions/storeReadingInstructions', [App\Http\Controllers\SuperAdmin\questionsController::class,'storeReadingInstructions'])

        ->name('superadmin-reading-questions-instructions');



    Route::post('superadmin/questions/storeListeningInstructions', [App\Http\Controllers\SuperAdmin\questionsController::class,'storeListeningInstructions'])

        ->name('superadmin-listening-questions-instructions');



    Route::post('superadmin/questions/storeWritingInstructions', [App\Http\Controllers\SuperAdmin\questionsController::class,'storeWritingInstructions'])

        ->name('superadmin-writing-questions-instructions');



    Route::post('superadmin/questions/storeSpeakingInstructions', [App\Http\Controllers\SuperAdmin\questionsController::class,'storeSpeakingInstructions'])

        ->name('superadmin-speaking-questions-instructions');



    Route::resource('superadmin/questions', App\Http\Controllers\SuperAdmin\questionsController::class);

    /*Questions Modules end*/

    

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



    /* start listening section */

        Route::post('superadmin/questions/uploadimage', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'uploadImage'])->name('upload-image');

        Route::post('superadmin/questions/uploadaudio', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'uploadAudio'])->name('upload-audio');



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



        Route::post('superadmin/questions/storeHighlightIncorrectWords', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'storeHighlightIncorrectWords'])->name('store-listen-highlight-incorrect-words');

        Route::post('superadmin/questions/updateHighlightIncorrectWords', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'updateHighlightIncorrectWords'])->name('update-listen-highlight-incorrect-words');





        Route::post('superadmin/questions/storeWriteFormDictations', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'storeWriteFormDictations'])->name('store-listen-write-form-dictations');

        Route::post('superadmin/questions/updateWriteFormDictations', [App\Http\Controllers\SuperAdmin\ListeningQuestionController::class,'updateWriteFormDictations'])->name('update-listen-write-form-dictations');

    /* end listening section */



    /* start writing section */

        Route::post('superadmin/questions/summarize', [App\Http\Controllers\SuperAdmin\WritingQuestionController::class,'storeSummarizeWritten'])->name('add-summarize-written');

        Route::post('superadmin/questions/editsummarize', [App\Http\Controllers\SuperAdmin\WritingQuestionController::class,'updateSummarizeWritten'])->name('update-summarize-written');



        Route::post('superadmin/questions/essay', [App\Http\Controllers\SuperAdmin\WritingQuestionController::class,'storeEssayWritting'])->name('add-essay-writting');

        Route::post('superadmin/questions/editessay', [App\Http\Controllers\SuperAdmin\WritingQuestionController::class,'updateEssayWritting'])->name('update-essay-writting');

    /* end writing section */



    /* start speaking section */

        Route::post('superadmin/questions/readaloud', [App\Http\Controllers\SuperAdmin\SpeakingQuestionController::class,'storeReadAloud'])->name('add-read-aloud');

        Route::post('superadmin/questions/editreadaloud', [App\Http\Controllers\SuperAdmin\SpeakingQuestionController::class,'updateReadAloud'])->name('update-read-aloud');



        Route::post('superadmin/questions/repeatsentence', [App\Http\Controllers\SuperAdmin\SpeakingQuestionController::class,'storeRepeatSentence'])->name('add-repeat-sentence');

        Route::post('superadmin/questions/editrepeatsentence', [App\Http\Controllers\SuperAdmin\SpeakingQuestionController::class,'updateRepeatSentence'])->name('update-repeat-sentence');



        Route::post('superadmin/questions/describeimage', [App\Http\Controllers\SuperAdmin\SpeakingQuestionController::class,'storeDescribeImage'])->name('add-describe-image');

        Route::post('superadmin/questions/editdescribeimage', [App\Http\Controllers\SuperAdmin\SpeakingQuestionController::class,'updateDescribeImage'])->name('update-describe-image');



        Route::post('superadmin/questions/retelllecture', [App\Http\Controllers\SuperAdmin\SpeakingQuestionController::class,'storeReTellLecture'])->name('add-re-tell-lecture');

        Route::post('superadmin/questions/editretelllecture', [App\Http\Controllers\SuperAdmin\SpeakingQuestionController::class,'updateReTellLecture'])->name('update-re-tell-lecture');



        Route::post('superadmin/questions/answershortquestion', [App\Http\Controllers\SuperAdmin\SpeakingQuestionController::class,'storeAnswerShortQuestion'])->name('add-answer-short-question');

        Route::post('superadmin/questions/editanswershortquestion', [App\Http\Controllers\SuperAdmin\SpeakingQuestionController::class,'updateAnswerShortQuestion'])->name('update-answer-short-question');

    /* end speaking section */

    Route::get('superadmin/setting', [App\Http\Controllers\HomeController::class, 'setting'])->name('superadmin-setting');



    /*Superadmin settings start*/

    

    Route::post('superadmin/settings/changePassword', [App\Http\Controllers\SuperAdmin\SettingsController::class,'changePassword'])->name('superadmin-change-password');

    Route::resource('superadmin/settings', App\Http\Controllers\SuperAdmin\SettingsController::class);

    /*Superadmin settings end*/

    

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



    /* prediction files routes start *//* prediction files routes start */

    Route::resource('superadmin/predictionfiles', App\Http\Controllers\SuperAdmin\PredictionFilesController::class);

    Route::get('superadmin/predictionfiles/changestatus/{id}', [App\Http\Controllers\SuperAdmin\PredictionFilesController::class, 'changeStatus'])
        ->name('superadmin-predictionfiles-changestatus');

    Route::post('superadmin/predictionfiles/update/{id}', [App\Http\Controllers\SuperAdmin\PredictionFilesController::class, 'update'])
        ->name('superadmin-predictionfiles-update');

    /* prediction files routes ends */

    Route::resource('superadmin/transactions', App\Http\Controllers\SuperAdmin\TransactionsController::class);

    Route::get('superadmin/transactions/download_invoice/{id}', [App\Http\Controllers\SuperAdmin\TransactionsController::class, 'download_invoice'])->name('transaction-download-invoice');



    Route::resource('superadmin/certificates', App\Http\Controllers\SuperAdmin\CertificatesController::class);

    Route::get('superadmin/certificates/edit/{aid}/{bid}', [App\Http\Controllers\SuperAdmin\CertificatesController::class, 'edit'])->name('generate-certificate');

    Route::post('superadmin/certificates/updateScore', [App\Http\Controllers\SuperAdmin\CertificatesController::class, 'updateScore'])->name('update-score');

    
    Route::resource('superadmin/results', App\Http\Controllers\SuperAdmin\TestResultsController::class);
    Route::get('superadmin/results/edit/{aid}/{bid}', [App\Http\Controllers\SuperAdmin\TestResultsController::class, 'edit'])->name('generate-result');

    /*Device logs module start*/

    Route::get('superadmin/device/changestatus/{id}', [App\Http\Controllers\SuperAdmin\DeviceController::class, 'changeStatus'])->name('superadmin-device-changestatus');

    Route::resource('superadmin/device', App\Http\Controllers\SuperAdmin\DeviceController::class);

    /*Device logs module end*/

    /*Videos module start*/

    Route::resource('superadmin/videos', App\Http\Controllers\SuperAdmin\VideosController::class);

    Route::get('superadmin/videos/changestatus/{id}', [App\Http\Controllers\SuperAdmin\VideosController::class, 'changeStatus'])

        ->name('superadmin-videos-changestatus');

    /*Videos module end*/



    /*Super admin notification start*/

        Route::get('superadmin/notifications', [App\Http\Controllers\SuperAdmin\NotificationController::class, 'index'])->name('superadmin-notifications');

        Route::get('superadmin/notifications/{id}', [App\Http\Controllers\SuperAdmin\NotificationController::class, 'viewNotification'])->name('superadmin-view-notifications');

    /*Super admin notification end*/

    /* Email templates module start*/
    Route::get('superadmin/email/changestatus/{id}', [App\Http\Controllers\SuperAdmin\EmailTemplatesController::class, 'changeStatus'])
        ->name('superadmin-email-changestatus');
    Route::resource('superadmin/email', App\Http\Controllers\SuperAdmin\EmailTemplatesController::class);
    /* Email templates module start*/



//end Super admin routes

});

Route::group(['middleware' => ['auth', 'verified','branchadmin']], function () {

    //start branch admin routes

    Route::get('branchadmin/dashboard', [App\Http\Controllers\BranchAdmin\DashboardController::class, 'index'])->name('branchadmin-dashboard');

    Route::resource('branchadmin/users', App\Http\Controllers\BranchAdmin\UsersController::class)->names('branchadmin-users');

    Route::resource('branchadmin/device', App\Http\Controllers\BranchAdmin\DeviceController::class)->names('branchadmin-device');

    Route::resource('branchadmin/certificates', App\Http\Controllers\BranchAdmin\CertificatesController::class)->names('branchadmin-certificates');
    Route::get('branchadmin/certificates/edit/{aid}/{bid}', [App\Http\Controllers\BranchAdmin\CertificatesController::class, 'edit'])->name('branchadmin-generate-certificate');
    Route::post('branchadmin/certificates/updateScore', [App\Http\Controllers\BranchAdmin\CertificatesController::class, 'updateScore'])->name('branchadmin-update-score');

    
    Route::resource('branchadmin/results', App\Http\Controllers\BranchAdmin\TestResultsController::class)->names('branchadmin-results');
    Route::get('branchadmin/results/edit/{aid}/{bid}', [App\Http\Controllers\BranchAdmin\TestResultsController::class, 'edit'])->name('branchadmin-generate-result');

    /*Device logs module start*/

    Route::get('branchadmin/device/changestatus/{id}', [App\Http\Controllers\BranchAdmin\DeviceController::class, 'changeStatus'])->name('branchadmin-device-changestatus');

    Route::resource('branchadmin/device', App\Http\Controllers\BranchAdmin\DeviceController::class)->names('branchadmin-device');

    /*Device logs module end*/

    /*Videos module start*/

    Route::resource('branchadmin/videos', App\Http\Controllers\BranchAdmin\VideosController::class)->names('branchadmin-videos');

    Route::get('branchadmin/videos/changestatus/{id}', [App\Http\Controllers\BranchAdmin\VideosController::class, 'changeStatus'])

        ->name('branchadmin-videos-changestatus');

    /*Videos module end*/

    /* prediction files routes start *//* prediction files routes start */

    Route::resource('branchadmin/predictionfiles', App\Http\Controllers\BranchAdmin\PredictionFilesController::class)->names('branchadmin-predictionfiles');

    Route::get('branchadmin/predictionfiles/changestatus/{id}', [App\Http\Controllers\BranchAdmin\PredictionFilesController::class, 'changeStatus'])
        ->name('branchadmin-predictionfiles-changestatus');

    Route::post('branchadmin/predictionfiles/update/{id}', [App\Http\Controllers\BranchAdmin\PredictionFilesController::class, 'update'])
        ->name('branchadmin-predictionfiles-update');

    /* prediction files routes ends */

    Route::resource('branchadmin/tests', App\Http\Controllers\BranchAdmin\TestsController::class)->names('branchadmin-tests');

    /*branch admin notification start*/

        Route::get('branchadmin/notifications', [App\Http\Controllers\BranchAdmin\NotificationController::class, 'index'])->name('branchadmin-notifications');

        Route::get('branchadmin/notifications/{id}', [App\Http\Controllers\BranchAdmin\NotificationController::class, 'viewNotification'])->name('branchadmin-view-notifications');

    /*branch admin notification end*/

    /* Email templates module start*/
    Route::get('branchadmin/email/changestatus/{id}', [App\Http\Controllers\BranchAdmin\EmailTemplatesController::class, 'changeStatus'])
        ->name('branchadmin-email-changestatus');
    Route::resource('branchadmin/email', App\Http\Controllers\BranchAdmin\EmailTemplatesController::class)->names('branchadmin-email');
    /* Email templates module start*/

    Route::resource('branchadmin/transactions', App\Http\Controllers\BranchAdmin\TransactionsController::class)->names('branchadmin-transactions');
    Route::get('branchadmin/transactions/download_invoice/{id}', [App\Http\Controllers\SuperAdmin\TransactionsController::class, 'download_invoice'])->name('branchadmin-download-invoice');
    //end branch admin routes



});



Route::group(['middleware' => ['auth', 'verified','student']], function () {

    //start student admin routes

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //end student admin routes

});



 



