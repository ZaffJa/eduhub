<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToShortProviders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('short_providers', function (Blueprint $table) {
        $table->string('bank_name',75);
        $table->integer('bank_account')->unsigned();
        $table->integer('user_id')->unsigned();
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('short_providers', function (Blueprint $table) {
            //
        });
    }
}
