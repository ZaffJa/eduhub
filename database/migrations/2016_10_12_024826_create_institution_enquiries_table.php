<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('institution_id')->unsigned();
            $table->string('course_name');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->boolean('notification_status')->default(0);
            $table->timestamps();
        });


        Schema::table('enquiries', function ($table){

            $table->foreign('institution_id')
                  ->references('id')->on('institutions')
                  ->onDelete('cascade')
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
        Schema::dropIfExists('enquiries');
    }
}
