<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemChAppAccCommQuaMqa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('short_courses')){
            Schema::table('short_courses',function ($table){
                $table->dropColumn(['credit_hours','approved','accredited','commencement','qualification','mqa_reference_no']);
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
         if(Schema::hasTable('short_courses')){
            Schema::table('short_courses',function ($table){
                $table->string('credit_hours');
                $table->string('approved');
                $table->string('accredited');
                $table->string('commencement');
                $table->text('qualification');
                $table->string('mqa_reference_no');
            });
        }
    }
}
