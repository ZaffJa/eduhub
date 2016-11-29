<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPersonalityTypeIdFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('files')) {
            Schema::table('files', function ($table) {
                $table->integer('personality_type_id')->unsigned()->nullable();

                $table->foreign('personality_type_id')
                        ->references('id')->on('personality_types')
                        ->onDelete('set null')
                        ->onUpdate('cascade');
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
        Schema::table('files', function ($table){
            $table->dropForeign(['personality_type_id']);
            $table->dropColumn(['personality_type_id']);
        });
    }
}
