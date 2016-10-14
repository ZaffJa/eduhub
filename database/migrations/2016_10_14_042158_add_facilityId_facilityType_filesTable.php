<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacilityIdFacilityTypeFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('files')) {
            Schema::table('files', function ($table){
                $table->integer('facility_id')->unsigned();
                $table->integer('facility_type')->unsigned();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('files')) {
            Schema::table('files', function($table){
                $table->dropColumn(['facility_type','facility_id']);
            });
        }
    }
}
