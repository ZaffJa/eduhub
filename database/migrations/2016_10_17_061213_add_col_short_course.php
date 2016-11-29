<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColShortCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('short_courses')) {
            Schema::table('short_courses', function ($table){
                $table->integer('credit_hours')->nullable()->unsigned();
                $table->string('early_birds')->nullable();
                $table->string('who_should_att')->nullable();
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
        if(Schema::hasColumn('short_courses','who_should_att')) {
            Schema::table('short_courses', function ($table){
                $table->dropColumn(['who_should_att',
                                    'early_birds',
                                    'credit_hours'
                    ]);
            });
        }
    }
}
