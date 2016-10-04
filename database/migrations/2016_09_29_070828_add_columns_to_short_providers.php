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
        $table->string('bank_name',75)->nullable();
        $table->integer('bank_account')->unsigned()->nullable();
        $table->string('headline',255)->nullable();
        $table->string('profile_pic_location',255)->nullable();
        $table->tinyInteger('status')->nullable();
      });

      Schema::table('short_providers', function (Blueprint $table) {
        $table->foreign('parent_id')
              ->references('id')->on('users')
              ->onDelete('cascade');
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

            $table->dropColumn('bank_name');
            $table->dropColumn('headline');
            $table->dropColumn('bank_account');
            $table->dropColumn('profile_pic_location');
            $table->dropColumn('status');

            $table->dropForeign(['parent_id']);

        });
    }
}
