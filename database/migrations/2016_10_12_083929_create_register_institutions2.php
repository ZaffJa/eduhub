<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterInstitutions2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('register_institutions')){
            Schema::create('register_institutions', function (Blueprint $table){
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->integer('institution_id')->unsigned();
                $table->integer('status');
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::table('register_institutions', function ($table){
                $table->foreign('institution_id')
                        ->references('id')->on('institutions')
                        ->onDelete('cascade')
                        ->onUpdate('restrict');

                $table->foreign('user_id')
                        ->references('id')->on('users')
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
        Schema::dropIfExists('register_institutions');
    }
}
