<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBankTypeIdToShortProviders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('short_providers')) {

            Schema::table('short_providers', function (Blueprint $table) {

                $table->integer('bank_type_id')->unsigned()->nullable();
            });


            Schema::table('short_providers', function (Blueprint $table) {

                $table->foreign('bank_type_id')
                      ->references('id')->on('bank_types')
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
        Schema::table('short_providers', function (Blueprint $table) {
            //
        });
    }
}
