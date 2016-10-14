<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditShortFilesFileableIdFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('short_files')){
            Schema::table('short_files', function ($table){
                // $table->dropForeign('short_files_ibfk_2');
                $table->foreign('fileable_id')
                        ->references('id')->on('short_providers')
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
        if(Schema::hasTable('short_files')){
            Schema::table('short_files', function ($table){
                $table->dropForeign(['fileable_id']);
                $table->foreign('fileable_id')
                        ->references('id')->on('institutions')
                        ->onDelete('cascade')
                        ->onUpdate('restrict');
            });
        }
    }
}
