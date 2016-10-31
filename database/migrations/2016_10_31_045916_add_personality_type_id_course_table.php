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
                $table->integer('personality_type_id')->unsigned();
            });

            Schema::table('courses', function (Blueprint $table) {
            $table->foreign('personality_type_id')
                    ->references('id')->on('personality_types')
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
        if(Schema::hasColumn('courses','personality_type_id')) {
            Schema::table('course', function ($table){
                $table->dropColumn(['personality_type_id']);
            });
        }
    }
}
