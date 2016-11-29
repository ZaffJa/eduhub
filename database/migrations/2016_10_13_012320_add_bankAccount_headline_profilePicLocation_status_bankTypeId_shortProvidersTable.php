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

                if (!Schema::hasColumn('short_providers', 'bank_account')) {

                    $table->integer('bank_account')->unsigned()->nullable();
                }
                if (!Schema::hasColumn('short_providers', 'headline')) {

                    $table->string('headline')->nullable();
                }
                if (!Schema::hasColumn('short_providers', 'short_file_id')) {

                    $table->integer('short_file_id')->nullable()->unsigned();
                }
                if (!Schema::hasColumn('short_providers', 'status')) {

                    $table->tinyInteger('status')->nullable();
                }
                if (!Schema::hasColumn('short_providers', 'bank_type_id')) {

                    $table->integer('bank_type_id')->nullable()->unsigned();
                }

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
