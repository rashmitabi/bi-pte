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
        DB::statement("ALTER TABLE users_info ADD CONSTRAINT FK_RolesUserInfo FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE ");

        DB::statement("ALTER TABLE role_has_permissions ADD CONSTRAINT FK_RolesRoleHasPermissions FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE role_has_permissions ADD CONSTRAINT FK_ModulesRoleHasPermissions FOREIGN KEY (module_id) REFERENCES modules(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE log_activity ADD CONSTRAINT FK_RolesLogActivity FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE log_activity ADD CONSTRAINT FK_UsersInfoLogActivity FOREIGN KEY (user_id) REFERENCES users_info(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE question_type ADD CONSTRAINT FK_SectionsQuestionType FOREIGN KEY (section_id) REFERENCES sections(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE section_question_score ADD CONSTRAINT FK_SectionsSectionQuestionScore FOREIGN KEY (section_id) REFERENCES sections(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE section_question_score ADD CONSTRAINT FK_QuestionTypeSectionQuestionScore FOREIGN KEY (question_type_id) REFERENCES question_type(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE generat_test ADD CONSTRAINT FK_TestSubjectGeneratTest FOREIGN KEY (subject_id) REFERENCES test_subject(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE generat_test ADD CONSTRAINT FK_UsersInfoGeneratTest FOREIGN KEY (generated_by_user_id) REFERENCES users_info(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE generat_test ADD CONSTRAINT FK_RolesGeneratTest FOREIGN KEY (generated_by_role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE question_design ADD CONSTRAINT FK_SectionsQuestionDesign FOREIGN KEY (section_id) REFERENCES sections(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE test_result ADD CONSTRAINT FK_GeneratTestTestResult FOREIGN KEY (test_id) REFERENCES generat_test(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE test_result ADD CONSTRAINT FK_UsersInfoTestResult FOREIGN KEY (user_id) REFERENCES users_info(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE test_result ADD CONSTRAINT FK_SectionsTestResult FOREIGN KEY (section_id) REFERENCES sections(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE test_result ADD CONSTRAINT FK_QuestionTypeTestResult FOREIGN KEY (question_type_id) REFERENCES question_type(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE test_result ADD CONSTRAINT FK_QuestionTestResult FOREIGN KEY (question_id) REFERENCES question(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE question_data ADD CONSTRAINT FK_QuestionQuestionData FOREIGN KEY (question_id) REFERENCES question(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE question ADD CONSTRAINT FK_SectionsQuestion FOREIGN KEY (section_id) REFERENCES sections(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE question ADD CONSTRAINT FK_GeneratTestQuestion FOREIGN KEY (test_id) REFERENCES generat_test(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE question ADD CONSTRAINT FK_QuestionDesignQuestion FOREIGN KEY (design_id) REFERENCES question_design(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE question ADD CONSTRAINT FK_QuestionTypeQuestion FOREIGN KEY (question_type_id) REFERENCES question_type(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE answer_data ADD CONSTRAINT FK_QuestionAnswerData FOREIGN KEY (question_id) REFERENCES question(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE student_answer_data ADD CONSTRAINT FK_QuestionStudentAnswerData FOREIGN KEY (question_id) REFERENCES question(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE student_details ADD CONSTRAINT FK_UsersInfoStudentDetails FOREIGN KEY (user_id) REFERENCES users_info(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE student_test ADD CONSTRAINT FK_UsersInfoStudentTest FOREIGN KEY (user_id) REFERENCES users_info(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE student_test ADD CONSTRAINT FK_GeneratTestStudentTest FOREIGN KEY (test_id) REFERENCES generat_test(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE prediction ADD CONSTRAINT FK_UsersInfoPrediction FOREIGN KEY (user_id) REFERENCES users_info(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE prediction ADD CONSTRAINT FK_SectionsPrediction FOREIGN KEY (section_id) REFERENCES sections(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE prediction ADD CONSTRAINT FK_QuestionTypePrediction FOREIGN KEY (question_type_id) REFERENCES question_type(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE video ADD CONSTRAINT FK_UsersInfoVideo FOREIGN KEY (user_id) REFERENCES users_info(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE video ADD CONSTRAINT FK_SectionsVideo FOREIGN KEY (section_id) REFERENCES sections(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE video ADD CONSTRAINT FK_QuestionTypeVideo FOREIGN KEY (question_type_id) REFERENCES question_type(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE subscription ADD CONSTRAINT FK_RolesSubscription FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE users_subscription ADD CONSTRAINT FK_UsersInfoUsersSubscription FOREIGN KEY (user_id) REFERENCES users_info(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE users_subscription ADD CONSTRAINT FK_SubscriptionUsersSubscription FOREIGN KEY (subscription_id) REFERENCES subscription(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE users_subscription ADD CONSTRAINT FK_UsersPaymentsUsersSubscription FOREIGN KEY (payment_id) REFERENCES users_payments(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE certificate ADD CONSTRAINT FK_UsersInfoCertificate FOREIGN KEY (student_user_id) REFERENCES users_info(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE certificate ADD CONSTRAINT FK_GeneratTestCertificate FOREIGN KEY (test_id) REFERENCES generat_test(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE certificate ADD CONSTRAINT FK_UsersInfoCertificate_GeneratedBy FOREIGN KEY (generate_by_user_id) REFERENCES users_info(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE users_payments ADD CONSTRAINT FK_UserInfoUsersPayments FOREIGN KEY (user_id) REFERENCES users_info(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE institue ADD CONSTRAINT FK_UserInfoInstitue FOREIGN KEY (user_id) REFERENCES users_info(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE student_packages ADD CONSTRAINT FK_UserInfoStudentPackages FOREIGN KEY (user_id) REFERENCES users_info(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE student_packages ADD CONSTRAINT FK_UsersPaymentsStudentPackages FOREIGN KEY (payment_id) REFERENCES users_payments(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE student_packages_test ADD CONSTRAINT FK_GeneratTestStudentPackagesTest FOREIGN KEY (test_id) REFERENCES generat_test(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE student_packages_test ADD CONSTRAINT FK_UsersInfoStudentPackagesTest FOREIGN KEY (user_id) REFERENCES users_info(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE student_packages_test ADD CONSTRAINT FK_StudentPackagesStudentPackagesTest FOREIGN KEY (student_package_id) REFERENCES student_packages(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE vouchers ADD CONSTRAINT FK_RolesVouchers FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE practice_question_data ADD CONSTRAINT FK_PracticeQuestionsPracticeQuestionData FOREIGN KEY (practice_question_id) REFERENCES practice_questions(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE practice_questions ADD CONSTRAINT FK_UsersInfoPracticeQuestions FOREIGN KEY (user_id) REFERENCES users_info(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE practice_questions ADD CONSTRAINT FK_SectionsPracticeQuestions FOREIGN KEY (section_id) REFERENCES sections(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE practice_questions ADD CONSTRAINT FK_QuestionDesignPracticeQuestions FOREIGN KEY (design_id) REFERENCES question_design(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE practice_questions ADD CONSTRAINT FK_QuestionTypePracticeQuestions FOREIGN KEY (question_type_id) REFERENCES question_type(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE device_log ADD CONSTRAINT FK_UsersInfoDeviceLog FOREIGN KEY (user_id) REFERENCES users_info(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE practice_answer_data ADD CONSTRAINT FK_PracticeQuestionsPracticeAnswerData FOREIGN KEY (practice_question_id) REFERENCES practice_questions(id) ON UPDATE CASCADE ON DELETE CASCADE");
        DB::statement("ALTER TABLE email_templates ADD CONSTRAINT FK_UsersInfoEmailTemplates FOREIGN KEY (user_id) REFERENCES users_info(id) ON UPDATE CASCADE ON DELETE CASCADE");

        DB::statement("ALTER TABLE users_info ADD CONSTRAINT FK_RolesUsersInfo FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE users_info DROP CONSTRAINT FK_RolesUserInfo");

        DB::statement("ALTER TABLE role_has_permissions DROP CONSTRAINT FK_RolesRoleHasPermissions");
        DB::statement("ALTER TABLE role_has_permissions DROP CONSTRAINT FK_ModulesRoleHasPermissions");

        DB::statement("ALTER TABLE log_activity DROP CONSTRAINT FK_RolesLogActivity");
        DB::statement("ALTER TABLE log_activity DROP CONSTRAINT FK_UsersInfoLogActivity");

        DB::statement("ALTER TABLE question_type DROP CONSTRAINT FK_SectionsQuestionType");

        DB::statement("ALTER TABLE section_question_score DROP CONSTRAINT FK_SectionsSectionQuestionScore");
        DB::statement("ALTER TABLE section_question_score DROP CONSTRAINT FK_QuestionTypeSectionQuestionScore");

        DB::statement("ALTER TABLE generat_test DROP CONSTRAINT FK_TestSubjectGeneratTest");
        DB::statement("ALTER TABLE generat_test DROP CONSTRAINT FK_UsersInfoGeneratTest");
        DB::statement("ALTER TABLE generat_test DROP CONSTRAINT FK_RolesGeneratTest");

        DB::statement("ALTER TABLE question_design DROP CONSTRAINT FK_SectionsQuestionDesign");

        DB::statement("ALTER TABLE test_result DROP CONSTRAINT FK_GeneratTestTestResult");
        DB::statement("ALTER TABLE test_result DROP CONSTRAINT FK_UsersInfoTestResult");
        DB::statement("ALTER TABLE test_result DROP CONSTRAINT FK_SectionsTestResult");
        DB::statement("ALTER TABLE test_result DROP CONSTRAINT FK_QuestionTypeTestResult");
        DB::statement("ALTER TABLE test_result DROP CONSTRAINT FK_QuestionTestResult");

        DB::statement("ALTER TABLE question_data DROP CONSTRAINT FK_QuestionQuestionData");

        DB::statement("ALTER TABLE question DROP CONSTRAINT FK_SectionsQuestion");
        DB::statement("ALTER TABLE question DROP CONSTRAINT FK_GeneratTestQuestion");
        DB::statement("ALTER TABLE question DROP CONSTRAINT FK_QuestionDesignQuestion");
        DB::statement("ALTER TABLE question DROP CONSTRAINT FK_QuestionTypeQuestion");

        DB::statement("ALTER TABLE answer_data DROP CONSTRAINT FK_QuestionAnswerData");

        DB::statement("ALTER TABLE student_answer_data DROP CONSTRAINT FK_QuestionStudentAnswerData");

        DB::statement("ALTER TABLE student_details DROP CONSTRAINT FK_UsersInfoStudentDetails");

        DB::statement("ALTER TABLE student_test DROP CONSTRAINT FK_UsersInfoStudentTest");
        DB::statement("ALTER TABLE student_test DROP CONSTRAINT FK_GeneratTestStudentTest");

        DB::statement("ALTER TABLE prediction DROP CONSTRAINT FK_UsersInfoPrediction");
        DB::statement("ALTER TABLE prediction DROP CONSTRAINT FK_SectionsPrediction");
        DB::statement("ALTER TABLE prediction DROP CONSTRAINT FK_QuestionTypePrediction");

        DB::statement("ALTER TABLE video DROP CONSTRAINT FK_UsersInfoVideo");
        DB::statement("ALTER TABLE video DROP CONSTRAINT FK_SectionsVideo");
        DB::statement("ALTER TABLE video DROP CONSTRAINT FK_QuestionTypeVideo");

        DB::statement("ALTER TABLE subscription DROP CONSTRAINT FK_RolesSubscription");

        DB::statement("ALTER TABLE users_subscription DROP CONSTRAINT FK_UsersInfoUsersSubscription");
        DB::statement("ALTER TABLE users_subscription DROP CONSTRAINT FK_SubscriptionUsersSubscription");
        DB::statement("ALTER TABLE users_subscription DROP CONSTRAINT FK_UsersPaymentsUsersSubscription");

        DB::statement("ALTER TABLE certificate DROP CONSTRAINT FK_UsersInfoCertificate");
        DB::statement("ALTER TABLE certificate DROP CONSTRAINT FK_GeneratTestCertificate");
        DB::statement("ALTER TABLE certificate DROP CONSTRAINT FK_UsersInfoCertificate_GeneratedBy");

        DB::statement("ALTER TABLE users_payments DROP CONSTRAINT FK_UserInfoUsersPayments");

        DB::statement("ALTER TABLE institue DROP CONSTRAINT FK_UserInfoInstitue");

        DB::statement("ALTER TABLE student_packages DROP CONSTRAINT FK_UserInfoStudentPackages");
        DB::statement("ALTER TABLE student_packages DROP CONSTRAINT FK_UsersPaymentsStudentPackages");

        DB::statement("ALTER TABLE student_packages_test DROP CONSTRAINT FK_GeneratTestStudentPackagesTest");
        DB::statement("ALTER TABLE student_packages_test DROP CONSTRAINT FK_UsersInfoStudentPackagesTest");
        DB::statement("ALTER TABLE student_packages_test DROP CONSTRAINT FK_StudentPackagesStudentPackagesTest");

        DB::statement("ALTER TABLE vouchers DROP CONSTRAINT FK_RolesVouchers");

        DB::statement("ALTER TABLE practice_question_data DROP CONSTRAINT FK_PracticeQuestionsPracticeQuestionData");

        DB::statement("ALTER TABLE practice_questions DROP CONSTRAINT FK_UsersInfoPracticeQuestions");
        DB::statement("ALTER TABLE practice_questions DROP CONSTRAINT FK_SectionsPracticeQuestions");
        DB::statement("ALTER TABLE practice_questions DROP CONSTRAINT FK_QuestionDesignPracticeQuestions");
        DB::statement("ALTER TABLE practice_questions DROP CONSTRAINT FK_QuestionTypePracticeQuestions");

        DB::statement("ALTER TABLE device_log DROP CONSTRAINT FK_UsersInfoDeviceLog");

        DB::statement("ALTER TABLE practice_answer_data DROP CONSTRAINT FK_PracticeQuestionsPracticeAnswerData");

        DB::statement("ALTER TABLE email_templates DROP CONSTRAINT FK_UsersInfoEmailTemplates");

        DB::statement("ALTER TABLE users_info DROP CONSTRAINT FK_RolesUsersInfo");
    }
}
