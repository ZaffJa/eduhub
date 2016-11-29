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
        if (Schema::hasColumn('short_courses', 'credit_hours')) {

                Schema::table('short_courses',function ($table){
                    $table->dropColumn('credit_hours');
                });
        }

        if (Schema::hasColumn('short_courses', 'approved')) {

            Schema::table('short_courses',function ($table){
                $table->dropColumn('approved');
            });
        }

        if (Schema::hasColumn('short_courses', 'accredited')) {

            Schema::table('short_courses',function ($table){
                $table->dropColumn('accredited');
            });
        }

        if (Schema::hasColumn('short_courses', 'commencement')) {

            Schema::table('short_courses',function ($table){
                $table->dropColumn('commencement');
            });
        }

        if (Schema::hasColumn('short_courses', 'qualification')) {

            Schema::table('short_courses',function ($table){
                $table->dropColumn('qualification');
            });
        }

        if (Schema::hasColumn('short_courses', 'mqa_reference_no')) {

            Schema::table('short_courses',function ($table){
                $table->dropColumn('mqa_reference_no');
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
