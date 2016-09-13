<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_scholarships', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fileable_type');
            $table->integer('fileable_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('filename',255);
            $table->string('path',255);
            $table->string('mime',255);
            $table->integer('size');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();

        });


        Schema::table('institution_scholarships', function($table) {
            $table->foreign('category_id')
                  ->references('id')->on('file_categories')
                  ->onDelete('cascade');
            $table->foreign('type_id')
                  ->references('id')->on('file_types')
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
        Schema::dropIfExists('institution_scholarships');
    }
}
