<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCapacityIntToVarcharFacilities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('facilities')) {
            Schema::table('facilities',function ($table){
                $table->string('capacity')->change();
                $table->integer('parent_id')->unsigned()->nullable()->change();
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
        if(Schema::hasTable('facilities')) {
            Schema::table('facilities',function ($table){
                $table->integer('capacity')->change();
                $table->integer('parent_id')->unsigned()->change();
            });
        }
    }
}
