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
        $table->integer('hrdf_scheme');
        $table->double('fee',15,8);
        $table->double('exam_fee',15,8);
        $table->string('learning_outcome',255);
        $table->string('location',255);
      });


      // Add foreign constraint to short_courses
      Schema::table('short_courses', function($table) {

          $table->foreign('provider_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');

          $table->foreign('level_id')
                ->references('id')->on('short_levels')
                ->onDelete('cascade')
                ->onUpdate('restrict');

          $table->foreign('period_type_id')
                ->references('id')->on('period_types')
                ->onDelete('cascade')
                ->onUpdate('restrict');

          $table->foreign('mode_id')
                ->references('id')->on('study_modes')
                ->onDelete('cascade')
                ->onUpdate('restrict');

          // $table->foreign('field_id')
          //       ->references('id')->on('study_fields')
          //       ->onDelete('cascade')
          //       ->onUpdate('restrict');

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
