<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShortPictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('short_pictures')){
            Schema::create('short_pictures', function (Blueprint $table){
                $table->increments('id');
                $table->integer('course_id')->unsigned();
                $table->string('filename');
                $table->timestamps();
                $table->softDeletes();

            });

            Schema::table('short_pictures', function ($table){

                $table->foreign('course_id')
                      ->references('id')->on('short_courses')
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
        Schema::dropIfExists('short_pictures');
    }
}
