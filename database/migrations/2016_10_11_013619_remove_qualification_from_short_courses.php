<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveQualificationFromShortCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasColumn('short_courses','qualification')){
            Schema::table('short_courses', function($table){
                $table->dropColumn('qualification');
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
        if(!Schema::hasColumn('short_courses','qualification')){
            Schema::table('short_courses', function($table){
                $table->string('qualification')->nullable();
            });
        }
    }
}
