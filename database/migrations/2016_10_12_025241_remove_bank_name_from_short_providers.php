<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveBankNameFromShortProviders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasColumn('short_providers', 'bank_name')){
            Schema::table('short_providers', function ($table){
                $table->dropColumn('bank_name');
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
        if(!Schema::hasColumn('short_providers', 'bank_name')){
            Schema::table('short_providers', function ($table){
                $table->string('bank_name')->nullable();
            });
        }
    }
}
