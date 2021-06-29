<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationWithTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE users ADD CONSTRAINT FK_RolesUsers FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE ");

        DB::statement("ALTER TABLE role_has_permissions ADD CONSTRAINT FK_RolesRoleHasPermissions FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE role_has_permissions ADD CONSTRAINT FK_ModulesRoleHasPermissions FOREIGN KEY (module_id) REFERENCES modules(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE log_activities ADD CONSTRAINT FK_RolesLogActivities FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE log_activities ADD CONSTRAINT FK_UsersLogActivities FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE question_types ADD CONSTRAINT FK_SectionsQuestionTypes FOREIGN KEY (section_id) REFERENCES sections(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE section_question_scores ADD CONSTRAINT FK_SectionsSectionQuestionScores FOREIGN KEY (section_id) REFERENCES sections(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE section_question_scores ADD CONSTRAINT FK_QuestionTypesSectionQuestionScores FOREIGN KEY (question_type_id) REFERENCES question_types(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE generate_tests ADD CONSTRAINT FK_TestSubjectsGenerateTests FOREIGN KEY (subject_id) REFERENCES test_subjects(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE generate_tests ADD CONSTRAINT FK_UsersGenerateTests FOREIGN KEY (generated_by_user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE generate_tests ADD CONSTRAINT FK_RolesGenerateTests FOREIGN KEY (generated_by_role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE question_designs ADD CONSTRAINT FK_SectionsQuestionDesigns FOREIGN KEY (section_id) REFERENCES sections(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE test_results ADD CONSTRAINT FK_GenerateTestsTestResults FOREIGN KEY (test_id) REFERENCES generate_tests(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE test_results ADD CONSTRAINT FK_UsersTestResults FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE");
       DB::statement("ALTER TABLE test_results ADD CONSTRAINT FK_SectionsTestResults FOREIGN KEY (section_id) REFERENCES sections(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE test_results ADD CONSTRAINT FK_QuestionTypesTestResults FOREIGN KEY (question_type_id) REFERENCES question_types(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE test_results ADD CONSTRAINT FK_QuestionsTestResults FOREIGN KEY (question_id) REFERENCES questions(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE test_results ADD CONSTRAINT FK_TestSubjectsTestResults FOREIGN KEY (subject_id) REFERENCES test_subjects(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE question_data ADD CONSTRAINT FK_QuestionsQuestionData FOREIGN KEY (question_id) REFERENCES questions(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE questions ADD CONSTRAINT FK_SectionsQuestions FOREIGN KEY (section_id) REFERENCES sections(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE questions ADD CONSTRAINT FK_GenerateTestsQuestions FOREIGN KEY (test_id) REFERENCES generate_tests(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE questions ADD CONSTRAINT FK_QuestionDesignsQuestions FOREIGN KEY (design_id) REFERENCES question_designs(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE questions ADD CONSTRAINT FK_QuestionTypesQuestions FOREIGN KEY (question_type_id) REFERENCES question_types(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE answer_data ADD CONSTRAINT FK_QuestionsAnswerData FOREIGN KEY (question_id) REFERENCES questions(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE student_answer_data ADD CONSTRAINT FK_QuestionsStudentAnswerData FOREIGN KEY (question_id) REFERENCES questions(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE student_details ADD CONSTRAINT FK_UsersStudentDetails FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE student_tests ADD CONSTRAINT FK_UsersStudentTests FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE student_tests ADD CONSTRAINT FK_GenerateTestsStudentTests FOREIGN KEY (test_id) REFERENCES generate_tests(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE predictions ADD CONSTRAINT FK_UsersPredictions FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE predictions ADD CONSTRAINT FK_SectionsPredictions FOREIGN KEY (section_id) REFERENCES sections(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE predictions ADD CONSTRAINT FK_QuestionTypesPredictions FOREIGN KEY (question_type_id) REFERENCES question_types(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE videos ADD CONSTRAINT FK_UsersVideos FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE videos ADD CONSTRAINT FK_SectionsVideos FOREIGN KEY (section_id) REFERENCES sections(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE videos ADD CONSTRAINT FK_QuestionTypesVideos FOREIGN KEY (question_type_id) REFERENCES question_types(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE subscriptions ADD CONSTRAINT FK_RolesSubscriptions FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE users_subscriptions ADD CONSTRAINT FK_UsersUsersSubscriptions FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE users_subscriptions ADD CONSTRAINT FK_SubscriptionsUsersSubscriptions FOREIGN KEY (subscription_id) REFERENCES subscriptions(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE users_subscriptions ADD CONSTRAINT FK_UsersPaymentsUsersSubscriptions FOREIGN KEY (payment_id) REFERENCES users_payments(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE certificates ADD CONSTRAINT FK_UsersCertificates FOREIGN KEY (student_user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE certificates ADD CONSTRAINT FK_GenerateTestsCertificates FOREIGN KEY (test_id) REFERENCES generate_tests(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE certificates ADD CONSTRAINT FK_UsersCertificates_GeneratedBy FOREIGN KEY (generate_by_user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE users_payments ADD CONSTRAINT FK_UsersUsersPayments FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE institues ADD CONSTRAINT FK_UsersInstitues FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE student_packages ADD CONSTRAINT FK_UsersStudentPackages FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE student_packages ADD CONSTRAINT FK_UsersPaymentsStudentPackages FOREIGN KEY (payment_id) REFERENCES users_payments(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE student_package_tests ADD CONSTRAINT FK_GenerateTestsStudentPackageTests FOREIGN KEY (test_id) REFERENCES generate_tests(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE student_package_tests ADD CONSTRAINT FK_UsersStudentPackageTests FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE student_package_tests ADD CONSTRAINT FK_StudentPackagesStudentPackageTests FOREIGN KEY (student_package_id) REFERENCES student_packages(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE vouchers ADD CONSTRAINT FK_RolesVouchers FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE practice_question_data ADD CONSTRAINT FK_PracticeQuestionsPracticeQuestionData FOREIGN KEY (practice_question_id) REFERENCES practice_questions(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE practice_questions ADD CONSTRAINT FK_UsersPracticeQuestions FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE practice_questions ADD CONSTRAINT FK_SectionsPracticeQuestions FOREIGN KEY (section_id) REFERENCES sections(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE practice_questions ADD CONSTRAINT FK_QuestionDesignsPracticeQuestions FOREIGN KEY (design_id) REFERENCES question_designs(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE practice_questions ADD CONSTRAINT FK_QuestionTypesPracticeQuestions FOREIGN KEY (question_type_id) REFERENCES question_types(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE device_logs ADD CONSTRAINT FK_UsersDeviceLogs FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE practice_answer_data ADD CONSTRAINT FK_PracticeQuestionsPracticeAnswerData FOREIGN KEY (practice_question_id) REFERENCES practice_questions(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE email_templates ADD CONSTRAINT FK_UsersEmailTemplates FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE");

        // DB::statement("ALTER TABLE users ADD CONSTRAINT FK_RolesUsers FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE users DROP CONSTRAINT FK_RolesUsers");

        DB::statement("ALTER TABLE role_has_permissions DROP CONSTRAINT FK_RolesRoleHasPermissions");
        DB::statement("ALTER TABLE role_has_permissions DROP CONSTRAINT FK_ModulesRoleHasPermissions");

        DB::statement("ALTER TABLE log_activities DROP CONSTRAINT FK_RolesLogActivities");
        DB::statement("ALTER TABLE log_activities DROP CONSTRAINT FK_UsersLogActivities");

        DB::statement("ALTER TABLE question_types DROP CONSTRAINT FK_SectionsQuestionTypes");

        DB::statement("ALTER TABLE section_question_scores DROP CONSTRAINT FK_SectionsSectionQuestionScores");
        DB::statement("ALTER TABLE section_question_scores DROP CONSTRAINT FK_QuestionTypesSectionQuestionScores");

        DB::statement("ALTER TABLE generate_tests DROP CONSTRAINT FK_TestSubjectsGenerateTests");
        DB::statement("ALTER TABLE generate_tests DROP CONSTRAINT FK_UsersGenerateTests");
        DB::statement("ALTER TABLE generate_tests DROP CONSTRAINT FK_RolesGenerateTests");

        DB::statement("ALTER TABLE question_designs DROP CONSTRAINT FK_SectionsQuestionDesigns");

        DB::statement("ALTER TABLE test_results DROP CONSTRAINT FK_GenerateTestsTestResults");
        DB::statement("ALTER TABLE test_results DROP CONSTRAINT FK_UsersTestResults");
        DB::statement("ALTER TABLE test_results DROP CONSTRAINT FK_SectionsTestResults");
        DB::statement("ALTER TABLE test_results DROP CONSTRAINT FK_QuestionTypesTestResults");
        DB::statement("ALTER TABLE test_results DROP CONSTRAINT FK_QuestionsTestResults");
        DB::statement("ALTER TABLE test_results DROP CONSTRAINT FK_TestSubjectsTestResults");

        DB::statement("ALTER TABLE question_data DROP CONSTRAINT FK_QuestionsQuestionData");

        DB::statement("ALTER TABLE questions DROP CONSTRAINT FK_SectionsQuestions");
        DB::statement("ALTER TABLE questions DROP CONSTRAINT FK_GenerateTestsQuestions");
        DB::statement("ALTER TABLE questions DROP CONSTRAINT FK_QuestionDesignsQuestions");
        DB::statement("ALTER TABLE questions DROP CONSTRAINT FK_QuestionTypesQuestions");

        DB::statement("ALTER TABLE answer_data DROP CONSTRAINT FK_QuestionsAnswerData");

        DB::statement("ALTER TABLE student_answer_data DROP CONSTRAINT FK_QuestionsStudentAnswerData");

        DB::statement("ALTER TABLE student_details DROP CONSTRAINT FK_UsersStudentDetails");

        DB::statement("ALTER TABLE student_tests DROP CONSTRAINT FK_UsersStudentTests");
        DB::statement("ALTER TABLE student_tests DROP CONSTRAINT FK_GenerateTestsStudentTests");

        DB::statement("ALTER TABLE predictions DROP CONSTRAINT FK_UsersPredictions");
        DB::statement("ALTER TABLE predictions DROP CONSTRAINT FK_SectionsPredictions");
        DB::statement("ALTER TABLE predictions DROP CONSTRAINT FK_QuestionTypesPredictions");

        DB::statement("ALTER TABLE videos DROP CONSTRAINT FK_UsersVideos");
        DB::statement("ALTER TABLE videos DROP CONSTRAINT FK_SectionsVideos");
        DB::statement("ALTER TABLE videos DROP CONSTRAINT FK_QuestionTypesVideos");

        DB::statement("ALTER TABLE subscriptions DROP CONSTRAINT FK_RolesSubscriptions");

        DB::statement("ALTER TABLE users_subscriptions DROP CONSTRAINT FK_UsersUsersSubscriptions");
        DB::statement("ALTER TABLE users_subscriptions DROP CONSTRAINT FK_SubscriptionsUsersSubscriptions");
        DB::statement("ALTER TABLE users_subscriptions DROP CONSTRAINT FK_UsersPaymentsUsersSubscriptions");

        DB::statement("ALTER TABLE certificates DROP CONSTRAINT FK_UsersCertificates");
        DB::statement("ALTER TABLE certificates DROP CONSTRAINT FK_GenerateTestsCertificates");
        DB::statement("ALTER TABLE certificates DROP CONSTRAINT FK_UsersCertificates_GeneratedBy");

        DB::statement("ALTER TABLE users_payments DROP CONSTRAINT FK_UsersUsersPayments");

        DB::statement("ALTER TABLE institues DROP CONSTRAINT FK_UsersInstitues");

        DB::statement("ALTER TABLE student_packages DROP CONSTRAINT FK_UsersStudentPackages");
        DB::statement("ALTER TABLE student_packages DROP CONSTRAINT FK_UsersPaymentsStudentPackages");

        DB::statement("ALTER TABLE student_package_tests DROP CONSTRAINT FK_GenerateTestsStudentPackageTests");
        DB::statement("ALTER TABLE student_package_tests DROP CONSTRAINT FK_UsersStudentPackageTests");
        DB::statement("ALTER TABLE student_package_tests DROP CONSTRAINT FK_StudentPackagesStudentPackageTests");

        DB::statement("ALTER TABLE vouchers DROP CONSTRAINT FK_RolesVouchers");

        DB::statement("ALTER TABLE practice_question_data DROP CONSTRAINT FK_PracticeQuestionsPracticeQuestionData");

        DB::statement("ALTER TABLE practice_questions DROP CONSTRAINT FK_UsersPracticeQuestions");
        DB::statement("ALTER TABLE practice_questions DROP CONSTRAINT FK_SectionsPracticeQuestions");
        DB::statement("ALTER TABLE practice_questions DROP CONSTRAINT FK_QuestionDesignsPracticeQuestions");
        DB::statement("ALTER TABLE practice_questions DROP CONSTRAINT FK_QuestionTypesPracticeQuestions");

        DB::statement("ALTER TABLE device_logs DROP CONSTRAINT FK_UsersDeviceLogs");

        DB::statement("ALTER TABLE practice_answer_data DROP CONSTRAINT FK_PracticeQuestionsPracticeAnswerData");

        DB::statement("ALTER TABLE email_templates DROP CONSTRAINT FK_UsersEmailTemplates");

        DB::statement("ALTER TABLE users DROP CONSTRAINT FK_RolesUsers");
    }
}
