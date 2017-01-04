<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInstitutionIdCourseIdDeletedAtAtStudentEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_enrollments', function (Blueprint $table) {
            $table->softDeletes();
            $table->unsignedInteger('institution_id')->nullable()->after('user_id');
            $table->unsignedInteger('course_id')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_enrollments', function (Blueprint $table) {
            $table->dropColumn(['deleted_at','institution_id','course_id']);
        });
    }
}
