<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnquiries2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('enquiries')){

            Schema::create('enquiries', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('institution_course_id')->unsigned();
                $table->string('name');
                $table->string('phone');
                $table->string('email');
                $table->boolean('notification_status')->default(0);
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::table('enquiries', function ($table){

                $table->foreign('institution_course_id')
                      ->references('id')->on('institution_courses')
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
        Schema::dropIfExists('enquiries');
    }
}
