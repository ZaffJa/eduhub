<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeletesToMultipleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    private $tableNames = ['public_personalities', 'social_accounts', 'student_files', 'student_enrollments'];

    public function up()
    {

        foreach ($this->tableNames as $tableName) {
            // Add column deleted_at if table does not have it
            if (!Schema::hasColumn($tableName, 'deleted_at')) {

                Schema::table($tableName, function (Blueprint $table) {
                    $table->softDeletes();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        foreach ($this->tableNames as $tableName) {
            // Delete column deleted_at if table has it
            if (Schema::hasColumn($tableName, 'deleted_at')) {

                Schema::table($tableName, function (Blueprint $table) {
                    $table->dropColumn(['deleted_at']);
                });
            }
        }
    }
}
