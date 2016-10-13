<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionScholarships2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('institution_scholarships')){
            Schema::create('institution_scholarships', function (Blueprint $table){
                $table->increments('id');
                $table->integer('fileable_type');
                $table->integer('fileable_id')->unsigned();
                $table->integer('type_id')->unsigned();
                $table->integer('category_id')->unsigned();
                $table->string('filename');
                $table->string('path');
                $table->string('mime');
                $table->integer('size');
                $table->text('description');
                $table->string('contact');
                $table->text('website');
                $table->string('name');
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::table('institution_scholarships', function ($table){
                $table->foreign('category_id')
                        ->references('id')->on('file_categories')
                        ->onDelete('cascade')
                        ->onUpdate('restrict');

                $table->foreign('fileable_id')
                        ->references('id')->on('organisations')
                        ->onDelete('cascade')
                        ->onUpdate('restrict');

                $table->foreign('type_id')
                        ->references('id')->on('file_types')
                        ->onDelete('cascade')
                        ->onUpdate('restrict');
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
        Schema::dropIfExists('institution_scholarships');
    }
}
