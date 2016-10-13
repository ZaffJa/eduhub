<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivateShortProviders2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('activate_short_providers')) {
            Schema::create('activate_short_providers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('email');
                $table->string('token',64);
                $table->tinyInteger('status')->default('0');
                $table->timestamps();
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
        Schema::dropIfExists('activate_short_providers');
    }
}
