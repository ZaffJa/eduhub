<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoles2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_roles')){
            Schema::create('user_roles', function (Blueprint $table){
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->integer('role_id')->unsigned();
                $table->timestamps();
                $table->softDeletes();
            });
        }
        if(Schema::hasTable('user_roles')){
            Schema::table('user_roles', function ($table){
                $table->foreign('user_id')
                        ->references('id')->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('restrict');

                $table->foreign('role_id')
                        ->references('id')->on('roles')
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
        Schema::dropIfExists('user_roles');
    }
}
