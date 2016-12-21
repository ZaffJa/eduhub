<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFbIgTwitterToSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {

            $table->string('facebook')->nullable()->after('fax');
            $table->string('instagram')->nullable()->after('fax');
            $table->string('twitter')->nullable()->after('fax');
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

            $table->dropColumn(['facebook','instagram','twitter']);
        });
    }
}
