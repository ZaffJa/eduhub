<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInclusiveFieldShortCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('short_courses')){
            if(!Schema::hasColumn('short_courses','inclusive')){
                 Schema::table('short_courses', function($table){
                    $table->string('inclusive')->nullable();
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
        if (Schema::hasTable('short_courses')){
            if(Schema::hasColumn('short_courses','inclusive')){
                 Schema::table('short_courses', function($table){
                    $table->dropColumn('inclusive');
                });
            }
        }        
    }
}
