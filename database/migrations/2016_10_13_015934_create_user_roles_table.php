<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });



        Schema::table('roles', function ($table){

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('restrict');

            $table->foreign('role_id')
                  ->references('id')->on('user_roles')
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
        Schema::dropIfExists('user_roles');
    }
}
