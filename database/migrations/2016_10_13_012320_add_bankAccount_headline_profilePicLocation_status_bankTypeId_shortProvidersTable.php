<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBankAccountHeadlineProfilePicLocationStatusBankTypeIdShortProvidersTable extends Migration
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
                $table->integer('bank_account')->unsigned()->nullable();
                $table->string('headline')->nullable();
                $table->integer('short_file_id')->nullable()->unsigned();
                $table->tinyInteger('status')->nullable();
                $table->integer('bank_type_id')->nullable()->unsigned();
            });

            Schema::table('short_providers', function ($table){
                $table->foreign('parent_id')
                        ->references('id')->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('restrict');

            });

            Schema::table('short_providers', function ($table){
                $table->foreign('short_file_id')
                        ->references('id')->on('short_files')
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
                $table->dropForeign(['parent_id']);
                $table->dropForeign(['short_file_id']);
                $table->dropColumn('bank_account');
                $table->dropColumn('headline');
                $table->dropColumn('short_file_id');
                $table->dropColumn('status');
                $table->dropColumn('bank_type_id');
            });
        }
    }
}
