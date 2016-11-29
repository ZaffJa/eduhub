<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalityResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personality_results',function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('realistic')->unsigned();
            $table->integer('investigative')->unsigned();
            $table->integer('artistic')->unsigned();
            $table->integer('social')->unsigned();
            $table->integer('enterprising')->unsigned();
            $table->integer('conventional')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('personality_results', function ($table){
            $table->foreign('user_id')
                    ->references('id')->on('users')
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
        Schema::dropIfExists('personality_results');
    }
}
