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
   
    Route::get('superadmin/users/getAssignTest/{id}', [App\Http\Controllers\SuperAdmin\UsersController::class, 'getAssignTest'])->name('superadmin-user-get-assign-test');
    Route::post('superadmin/users/postAssignTest', [App\Http\Controllers\SuperAdmin\UsersController::class, 'postAssignTest'])->name('superadmin-user-post-assign-test');
    Route::post('superadmin/users/getMultipleAssignTest', [App\Http\Controllers\SuperAdmin\UsersController::class, 'getMultipleAssignTest'])->name('superadmin-user-get-multiple-assign-test');
    Route::post('superadmin/users/postMultipleAssignTest', [App\Http\Controllers\SuperAdmin\UsersController::class, 'postMultipleAssignTest'])->name('superadmin-user-post-multiple-assign-test');
    Route::post('superadmin/users/checkUniqueFields', [App\Http\Controllers\SuperAdmin\UsersController::class, 'checkUniqueUsername'])->name('superadmin-check-unique-validation');

    Route::post('superadmin/users/update/{id}', [App\Http\Controllers\SuperAdmin\UsersController::class, 'update'])
        ->name('superadmin-user-update');

    Route::get('superadmin/users/result/{id}', [App\Http\Controllers\SuperAdmin\UsersController::class, 'result'])->name('superadmin-student-result');  
    
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

    Route::resource('superadmin/activities', App\Http\Controllers\SuperAdmin\ActivitiesController::class);

    
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

    Route::post('superadmin/questions/storeReadingInstructions', [App\Http\Controllers\SuperAdmin\QuestionsController::class,'storeReadingInstructions'])

        ->name('superadmin-reading-questions-instructions');



    Route::post('superadmin/questions/storeListeningInstructions', [App\Http\Controllers\SuperAdmin\QuestionsController::class,'storeListeningInstructions'])

        ->name('superadmin-listening-questions-instructions');



    Route::post('superadmin/questions/storeWritingInstructions', [App\Http\Controllers\SuperAdmin\QuestionsController::class,'storeWritingInstructions'])

        ->name('superadmin-writing-questions-instructions');



    Route::post('superadmin/questions/storeSpeakingInstructions', [App\Http\Controllers\SuperAdmin\QuestionsController::class,'storeSpeakingInstructions'])

        ->name('superadmin-speaking-questions-instructions');



    Route::resource('superadmin/questions', App\Http\Controllers\SuperAdmin\QuestionsController::class);

    /*Questions Modules end*/

    

    /*Superadmin Reading section questions start*/

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

    /*Superadmin Reading section questions end*/



    /*Superadmin listening section start*/

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

    /*Superadmin listening section end*/



    /*Superadmin writing section start*/

        Route::post('superadmin/questions/summarize', [App\Http\Controllers\SuperAdmin\WritingQuestionController::class,'storeSummarizeWritten'])->name('add-summarize-written');

        Route::post('superadmin/questions/editsummarize', [App\Http\Controllers\SuperAdmin\WritingQuestionController::class,'updateSummarizeWritten'])->name('update-summarize-written');



        Route::post('superadmin/questions/essay', [App\Http\Controllers\SuperAdmin\WritingQuestionController::class,'storeEssayWritting'])->name('add-essay-writting');

        Route::post('superadmin/questions/editessay', [App\Http\Controllers\SuperAdmin\WritingQuestionController::class,'updateEssayWritting'])->name('update-essay-writting');

    /* Superadmin writing section end */



    /* Superadmin speaking section start*/

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

    /* Superadmin speaking section end */

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
    Route::get('branchadmin/dashboard/activitylogs', [App\Http\Controllers\BranchAdmin\DashboardController::class, 'activitylogs'])->name('branchadmin-dashboard-activitylogs');
    /*Branch Admin students module start*/
    Route::resource('branchadmin/students', App\Http\Controllers\BranchAdmin\UsersController::class)->names('branchadmin-students');
    Route::get('branchadmin/studentexport', [App\Http\Controllers\BranchAdmin\UsersController::class, 'studentExport'])->name('branchadmin-students-export');
    Route::post('branchadmin/students/changestatusmodel', [App\Http\Controllers\BranchAdmin\UsersController::class, 'getChangeStatus'])->name('branchadmin-students-getstatus');
    Route::post('branchadmin/students/sendemailmodel', [App\Http\Controllers\BranchAdmin\UsersController::class, 'getSendEmail'])->name('branchadmin-students-getsendemail');
    Route::post('branchadmin/students/sendemail', [App\Http\Controllers\BranchAdmin\UsersController::class, 'SendEmail'])->name('branchadmin-students-sendemailtemplate');
    Route::get('branchadmin/students/changestatus/{id}', [App\Http\Controllers\BranchAdmin\UsersController::class, 'changeStatus'])->name('branchadmin-students-changestatus');
    Route::get('branchadmin/students/showpassword/{id}', [App\Http\Controllers\BranchAdmin\UsersController::class, 'showPassword'])->name('branchadmin-students-showpassword');
    Route::patch('branchadmin/students/setpassword/{id}', [App\Http\Controllers\BranchAdmin\UsersController::class, 'setPassword'])->name('branchadmin-students-setpassword');
    Route::get('branchadmin/students/getAssignTest/{id}', [App\Http\Controllers\BranchAdmin\UsersController::class, 'getAssignTest'])->name('branchadmin-students-get-assign-test');
    Route::post('branchadmin/students/postAssignTest', [App\Http\Controllers\BranchAdmin\UsersController::class, 'postAssignTest'])->name('branchadmin-students-post-assign-test');
    Route::post('branchadmin/students/getMultipleAssignTest', [App\Http\Controllers\BranchAdmin\UsersController::class, 'getMultipleAssignTest'])->name('branchadmin-students-get-multiple-assign-test');
    Route::post('branchadmin/students/postMultipleAssignTest', [App\Http\Controllers\BranchAdmin\UsersController::class, 'postMultipleAssignTest'])->name('branchadmin-students-post-multiple-assign-test');
     Route::post('branchadmin/students/checkUniqueFields', [App\Http\Controllers\BranchAdmin\UsersController::class, 'checkUniqueUsername'])->name('branchadmin-check-unique-validation');
    Route::post('branchadmin/students/update/{id}', [App\Http\Controllers\BranchAdmin\UsersController::class, 'update'])->name('branchadmin-students-update');
    Route::get('branchadmin/students/result/{id}', [App\Http\Controllers\BranchAdmin\UsersController::class, 'result'])->name('branchadmin-student-result');    
    /*Branch Admin students module start*/
    
    Route::get('branchadmin/subscriptionpackages',[App\Http\Controllers\BranchAdmin\UsersController::class,'subscription'])->name('branchadmin-subscriptionpackages');
    Route::post('branchadmin/subscriptionpayment',[App\Http\Controllers\BranchAdmin\UsersController::class,'subscriptionPayment'])->name('branchadmin-subscriptionpayment');
    
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

    Route::resource('branchadmin/videos', App\Http\Controllers\BranchAdmin\VideosController::class)->names('branchadmin-videos')->middleware('branchVideo');

    Route::get('branchadmin/videos/changestatus/{id}', [App\Http\Controllers\BranchAdmin\VideosController::class, 'changeStatus'])

        ->name('branchadmin-videos-changestatus')->middleware('branchVideo');

    /*Videos module end*/

    /* prediction files routes start *//* prediction files routes start */

    Route::resource('branchadmin/predictionfiles', App\Http\Controllers\BranchAdmin\PredictionFilesController::class)->names('branchadmin-predictionfiles')->middleware('branchFile');

    Route::get('branchadmin/predictionfiles/changestatus/{id}', [App\Http\Controllers\BranchAdmin\PredictionFilesController::class, 'changeStatus'])
        ->name('branchadmin-predictionfiles-changestatus')->middleware('branchFile');

    Route::post('branchadmin/predictionfiles/update/{id}', [App\Http\Controllers\BranchAdmin\PredictionFilesController::class, 'update'])
        ->name('branchadmin-predictionfiles-update')->middleware('branchFile');

    /* prediction files routes ends */

    /*branchadmin test module start*/
    Route::get('branchadmin/tests/mocktest', [App\Http\Controllers\BranchAdmin\TestsController::class, 'mockTests'])
    ->name('branchadmin-tests-mocktest');
    Route::get('branchadmin/tests/changestatus/{id}', [App\Http\Controllers\BranchAdmin\TestsController::class, 'changeStatus'])
    ->name('branchadmin-tests-changestatus');
    Route::post('branchadmin/tests/update/{id}', [App\Http\Controllers\BranchAdmin\TestsController::class, 'update'])
    ->name('branchadmin-tests-update');
    Route::post('branchadmin/tests/addQuestions', [App\Http\Controllers\BranchAdmin\TestsController::class, 'addQuestions'])
    ->name('branchadmin-tests-addQuestions');
    Route::resource('branchadmin/tests', App\Http\Controllers\BranchAdmin\TestsController::class)->names('branchadmin-tests');
    /*branchadmin test module end*/

    /*Reading section questions start*/
    Route::post('branchadmin/questions/readingStoreFillInTheBlanks', [App\Http\Controllers\BranchAdmin\ReadingQuestionController::class,'storeFillInTheBlanks'])
    ->name('branchadmin-reading-store-fill-in-the-blanks');

    Route::post('branchadmin/questions/updateReadingWritingFillInTheBlanks', [App\Http\Controllers\BranchAdmin\ReadingQuestionController::class,'updateFillInTheBlanks'])
    ->name('branchadmin-question-update-readingwriting-fillintheblanks');

    Route::post('branchadmin/questions/storeReadingMultipleChoiceMultipleanswers', [App\Http\Controllers\BranchAdmin\ReadingQuestionController::class,'storeMultipleChoiceMultipleanswers'])
    ->name('branchadmin-question-store-MultipleChoice-Multipleanswers');

    Route::post('branchadmin/questions/updateReadingMultipleChoiceMultipleanswers', [App\Http\Controllers\BranchAdmin\ReadingQuestionController::class,'updateMultipleChoiceMultipleanswers'])
    ->name('branchadmin-question-update-MultipleChoice-Multipleanswers');

    Route::post('branchadmin/questions/storeReOrderParagraphs', [App\Http\Controllers\BranchAdmin\ReadingQuestionController::class,'storeReOrderParagraph'])
    ->name('branchadmin-question-store-re-order-paragraph');

    Route::post('branchadmin/questions/updateReOrderParagraphs', [App\Http\Controllers\BranchAdmin\ReadingQuestionController::class,'updateReOrderParagraph'])
    ->name('branchadmin-question-update-re-order-paragraph');

    Route::post('branchadmin/questions/storeFillInTheBlanks', [App\Http\Controllers\BranchAdmin\ReadingQuestionController::class,'storeReadingFillInTheBlanks'])
    ->name('branchadmin-question-store-fill-in-the-blanks');

    Route::post('branchadmin/questions/updateFillInTheBlanks', [App\Http\Controllers\BranchAdmin\ReadingQuestionController::class,'updateReadingFillInTheBlanks'])
    ->name('branchadmin-question-update-fill-in-the-blanks');        
    /*Reading section questions end*/
    
    /*Branchadmin listening section start*/
    Route::post('branchadmin/questions/uploadimage', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'uploadImage'])->name('branchadmin-upload-image');
    Route::post('branchadmin/questions/uploadaudio', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'uploadAudio'])->name('branchadmin-upload-audio');
    Route::post('branchadmin/questions/summarizespokenitem', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'storeSummarizeSpokenItem'])->name('branchadmin-add-summarize-spoken-item');
    Route::post('branchadmin/questions/editsummarizespokenitem', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'updateSummarizeSpokenItem'])->name('branchadmin-update-summarize-spoken-item');
    Route::post('branchadmin/questions/choosemultipleanswersitem', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'storeChooseMultipleAnswersItem'])->name('branchadmin-add-choose-multiple-answers-item');
    Route::post('branchadmin/questions/editchoosemultipleanswersitem', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'updateChooseMultipleAnswersItem'])->name('branchadmin-update-choose-multiple-answers-item');
    Route::post('branchadmin/questions/fillintheblanks', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'storeFillInTheBlanks'])->name('branchadmin-add-fill-in-the-blanks');
    Route::post('branchadmin/questions/editfillintheblanks', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'updateFillInTheBlanks'])->name('branchadmin-update-fill-in-the-blanks');
    Route::post('branchadmin/questions/highlightcorrectsummaryitem', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'storeHighlightCorrectSummaryItem'])->name('branchadmin-add-highlight-correct-summary-item');
    Route::post('branchadmin/questions/edithighlightcorrectsummaryitem', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'updateHighlightCorrectSummaryItem'])->name('branchadmin-update-highlight-correct-summary-item');
    Route::post('branchadmin/questions/storeListenMultipleChoiceChooseSingle', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'storeMultipleChoiceChooseSingle'])->name('branchadmin-store-listen-multiple-choice-choose-single');
    Route::post('branchadmin/questions/updateListenMultipleChoiceChooseSingle', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'updateMultipleChoiceChooseSingle'])->name('branchadmin-update-listen-multiple-choice-choose-single');
    Route::post('branchadmin/questions/storeListenMissingWordItem', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'storeMissingWordItem'])->name('branchadmin-store-listen-missing-word-item');
    Route::post('branchadmin/questions/updateListenMissingWordItem', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'updateMissingWordItem'])->name('branchadmin-update-listen-missing-word-item');
    Route::post('branchadmin/questions/storeHighlightIncorrectWords', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'storeHighlightIncorrectWords'])->name('branchadmin-store-listen-highlight-incorrect-words');
    Route::post('branchadmin/questions/updateHighlightIncorrectWords', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'updateHighlightIncorrectWords'])->name('branchadmin-update-listen-highlight-incorrect-words');
    Route::post('branchadmin/questions/storeWriteFormDictations', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'storeWriteFormDictations'])->name('branchadmin-store-listen-write-form-dictations');
    Route::post('branchadmin/questions/updateWriteFormDictations', [App\Http\Controllers\BranchAdmin\ListeningQuestionController::class,'updateWriteFormDictations'])->name('branchadmin-update-listen-write-form-dictations');
    /*Branchadmin listening section end*/

    /*Branchadmin writing section start*/
    Route::post('branchadmin/questions/summarize', [App\Http\Controllers\BranchAdmin\WritingQuestionController::class,'storeSummarizeWritten'])->name('branchadmin-add-summarize-written');
    Route::post('branchadmin/questions/editsummarize', [App\Http\Controllers\BranchAdmin\WritingQuestionController::class,'updateSummarizeWritten'])->name('branchadmin-update-summarize-written');
    Route::post('branchadmin/questions/essay', [App\Http\Controllers\BranchAdmin\WritingQuestionController::class,'storeEssayWritting'])->name('branchadmin-add-essay-writting');
    Route::post('branchadmin/questions/editessay', [App\Http\Controllers\BranchAdmin\WritingQuestionController::class,'updateEssayWritting'])->name('branchadmin-update-essay-writting');
    /* Branchadmin writing section end */

    /* Branchadmin speaking section start*/
    Route::post('branchadmin/questions/readaloud', [App\Http\Controllers\BranchAdmin\SpeakingQuestionController::class,'storeReadAloud'])->name('branchadmin-add-read-aloud');
    Route::post('branchadmin/questions/editreadaloud', [App\Http\Controllers\BranchAdmin\SpeakingQuestionController::class,'updateReadAloud'])->name('branchadmin-update-read-aloud');
    Route::post('branchadmin/questions/repeatsentence', [App\Http\Controllers\BranchAdmin\SpeakingQuestionController::class,'storeRepeatSentence'])->name('branchadmin-add-repeat-sentence');
    Route::post('branchadmin/questions/editrepeatsentence', [App\Http\Controllers\BranchAdmin\SpeakingQuestionController::class,'updateRepeatSentence'])->name('branchadmin-update-repeat-sentence');
    Route::post('branchadmin/questions/describeimage', [App\Http\Controllers\BranchAdmin\SpeakingQuestionController::class,'storeDescribeImage'])->name('branchadmin-add-describe-image');
    Route::post('branchadmin/questions/editdescribeimage', [App\Http\Controllers\BranchAdmin\SpeakingQuestionController::class,'updateDescribeImage'])->name('branchadmin-update-describe-image');
    Route::post('branchadmin/questions/retelllecture', [App\Http\Controllers\BranchAdmin\SpeakingQuestionController::class,'storeReTellLecture'])->name('branchadmin-add-re-tell-lecture');
    Route::post('branchadmin/questions/editretelllecture', [App\Http\Controllers\BranchAdmin\SpeakingQuestionController::class,'updateReTellLecture'])->name('branchadmin-update-re-tell-lecture');
    Route::post('branchadmin/questions/answershortquestion', [App\Http\Controllers\BranchAdmin\SpeakingQuestionController::class,'storeAnswerShortQuestion'])->name('branchadmin-add-answer-short-question');
    Route::post('branchadmin/questions/editanswershortquestion', [App\Http\Controllers\BranchAdmin\SpeakingQuestionController::class,'updateAnswerShortQuestion'])->name('branchadmin-update-answer-short-question');
    /* Branchadmin speaking section end */

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
    Route::get('branchadmin/transactions/download_invoice/{id}', [App\Http\Controllers\BranchAdmin\TransactionsController::class, 'download_invoice'])->name('branchadmin-download-invoice');

    Route::resource('branchadmin/activities', App\Http\Controllers\BranchAdmin\ActivitiesController::class)->names('branchadmin-activities');

    Route::resource('branchadmin/profile', App\Http\Controllers\BranchAdmin\ProfileController::class)->names('branchadmin-profile');

    Route::get('branchadmin/changepassword', [App\Http\Controllers\BranchAdmin\ProfileController::class, 'changepassword'])->name('branchadmin-changepassword');

    Route::get('branchadmin/editprofile', [App\Http\Controllers\BranchAdmin\ProfileController::class, 'edit'])->name('branchadmin-editprofile');

    Route::post('branchadmin/updatePassword', [App\Http\Controllers\BranchAdmin\ProfileController::class,'updatePassword'])->name('branchadmin-updatepassword');

    Route::post('branchadmin/updateProfile', [App\Http\Controllers\BranchAdmin\ProfileController::class,'update'])->name('branchadmin-updateprofile');
    //end branch admin routes



});



Route::group(['middleware' => ['auth', 'verified','student']], function () {

    //start student admin routes

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //end student admin routes

});



 



