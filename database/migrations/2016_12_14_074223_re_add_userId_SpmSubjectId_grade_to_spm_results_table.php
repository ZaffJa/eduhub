<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReAddUserIdSpmSubjectIdGradeToSpmResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spm_results', function (Blueprint $table) {

            if (!Schema::hasColumn('spm_results', 'user_id')) {

                $table->integer('user_id')->unsigned();
            }

            if (!Schema::hasColumn('spm_results', 'spm_subject_id')) {

                $table->integer('spm_subject_id')->unsigned();
            }

            if (!Schema::hasColumn('spm_results', 'grade')) {

                $table->string('grade');
            }

            if (!Schema::hasColumn('spm_results', 'deleted_at')) {

                $table->softDeletes();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spm_results_table', function (Blueprint $table) {

            if (Schema::hasColumn('spm_results', 'user_id')) {

                $table->dropColumn(['user_id']);
            }

            if (Schema::hasColumn('spm_results', 'spm_subject_id')) {

                $table->dropColumn(['spm_subject_id']);
            }

            if (Schema::hasColumn('spm_results', 'grade')) {

                $table->dropColumn(['grade']);
            }

            if (Schema::hasColumn('spm_results', 'deleted_at')) {

                $table->dropColumn(['deleted_at']);
            }
        });
    }
}
