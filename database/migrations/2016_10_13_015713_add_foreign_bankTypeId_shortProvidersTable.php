<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignBankTypeIdShortProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('short_providers')){
            Schema::table('short_providers', function ($table){
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
        if(Schema::hasTable('short_providers')){
            Schema::table('short_providers', function ($table){
                $table->dropForeign(['bank_type_id']);
            });
        }
    }
}
