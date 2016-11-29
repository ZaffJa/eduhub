<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogs2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('logs')){
            Schema::create('logs', function (Blueprint $table){
                $table->increments('id');
                $table->integer('user_id');
                $table->string('owner_type');
                $table->integer('owner_id');
                $table->text('old_value');
                $table->text('new_value');
                $table->string('type');
                $table->string('route');
                $table->string('ip');
                $table->timestamps();
                $table->softDeletes();
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
        Schema::dropIfExists('logs');
    }
}
