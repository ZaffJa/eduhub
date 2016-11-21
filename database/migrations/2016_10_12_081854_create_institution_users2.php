<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionUsers2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('institution_users')){
            Schema::create('institution_users', function (Blueprint $table){
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->integer('institution_id')->unsigned();
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::table('institution_users' , function ($table){
                $table->foreign('user_id')
                        ->references('id')->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('restrict');

                $table->foreign('institution_id')
                        ->references('id')->on('institutions')
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
        Schema::dropIfExists('institution_users');
    }
}
