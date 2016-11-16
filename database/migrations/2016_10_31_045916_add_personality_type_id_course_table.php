<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPersonalityTypeIdCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('courses')) {
            Schema::table('courses', function ($table){
                $table->integer('personality_type_id')->unsigned()->nullable();
            });

            Schema::table('courses', function ( $table) {
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
        Schema::table('courses', function ($table){
            $table->dropForeign(['personality_type_id']);
            $table->dropColumn(['personality_type_id']);
        });
    }
}
