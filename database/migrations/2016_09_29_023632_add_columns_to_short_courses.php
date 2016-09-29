<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToShortCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  Add new columns to short_courses
        Schema::table('short_courses', function (Blueprint $table) {
          $table->string('code',10);
          $table->integer('hrdf_scheme',10);
          $table->double('fee',15,8);
          $table->double('exam_fee',15,8);
          $table->string('learning_outcome',255);
          $table->string('location',255);
          $table->softDeletes();
        });


        // Add foreign constraint to short_courses
        Schema::table('short_courses', function($table) {
            $table->foreign('provider_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('level_id')
                  ->references('id')->on('short_levels');
                  ->onDelete('cascade');
            $table->foreign('fileable_id')
                  ->references('id')->on('organisations')
                  ->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('short_courses', function (Blueprint $table) {
            //
        });
    }
}
