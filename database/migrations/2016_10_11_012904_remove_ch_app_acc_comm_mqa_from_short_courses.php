<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveChAppAccCommMqaFromShortCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasColumn('short_courses','credit_hours')){
            Schema::table('short_courses', function($table){
                $table->dropColumn('credit_hours');
            });
        }
        if(Schema::hasColumn('short_courses','approved')){
            Schema::table('short_courses', function($table){
                $table->dropColumn('approved');
            });
        }
        if(Schema::hasColumn('short_courses','accredited')){
            Schema::table('short_courses', function($table){
                $table->dropColumn('accredited');
            });
        }
        if(Schema::hasColumn('short_courses','commencement')){
            Schema::table('short_courses', function($table){
                $table->dropColumn('commencement');
            });
        }
        if(Schema::hasColumn('short_courses','mqa_reference_no')){
            Schema::table('short_courses', function($table){
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
        if(!Schema::hasColumn('short_courses','credit_hours')){
            Schema::table('short_courses', function($table){
                $table->string('credit_hours')->nullable();
            });
        }
        if(!Schema::hasColumn('short_courses','accredited')){
            Schema::table('short_courses', function($table){
                $table->string('accredited')->nullable();
            });
        }
        if(!Schema::hasColumn('short_courses','approved')){
            Schema::table('short_courses', function($table){
                $table->string('approved')->nullable();
            });
        }
        if(!Schema::hasColumn('short_courses','mqa_reference_no')){
            Schema::table('short_courses', function($table){
                $table->string('mqa_reference_no')->nullable();
            });
        }
    }
}
