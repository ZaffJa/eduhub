<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVisionMissionObjectiveContactsToSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {

            $table->text('vision')->nullable()->after('fax');
            $table->text('mission')->nullable()->after('fax');
            $table->text('objective')->nullable()->after('fax');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schools', function (Blueprint $table) {

            $table->dropColumn(['vision','mission','objective']);

        });
    }
}
