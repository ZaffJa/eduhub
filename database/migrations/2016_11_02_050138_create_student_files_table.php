<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('file_type_id')->unsigned()->nullable();
            $table->integer('file_category_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('filename')->nullable();
            $table->string('path')->nullable();
            $table->string('mime')->nullable();
            $table->integer('size')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('file_category_id')
                    ->references('id')->on('file_categories')
                    ->onDelete('set null')
                    ->onUpdate('restrict');

            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');

            $table->foreign('file_type_id')
                    ->references('id')->on('file_types')
                    ->onDelete('set null')
                    ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_files');
    }
}
