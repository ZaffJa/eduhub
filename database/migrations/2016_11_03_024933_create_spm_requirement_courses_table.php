<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpmRequirementCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spm_requirement_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->nullable()->unsigned();
            $table->text('requirement')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('course_id')
                    ->references('id')->on('courses')
                    ->onDelete('set null')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spm_requirement_courses');
    }
}
