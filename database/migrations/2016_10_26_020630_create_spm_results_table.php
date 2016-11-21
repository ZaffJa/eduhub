<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpmResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spm_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('spm_subject_id')->unsigned();
            $table->string('grade');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::table('spm_results', function (Blueprint $table) {

            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');

            $table->foreign('spm_subject_id')
                    ->references('id')->on('spm_subjects')
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
        Schema::dropIfExists('spm_results');
    }
}
