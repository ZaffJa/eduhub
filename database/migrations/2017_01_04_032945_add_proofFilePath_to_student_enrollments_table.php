<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProofFilePathToStudentEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_enrollments', function (Blueprint $table) {
            $table->string('proof_file_path')->nullable()->after('uploaded_file_path');
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
            $table->dropColumn(['proof_file_path']);
        });
    }
}
