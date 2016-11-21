<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColFileableIdOnIntitutionScholarships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('institution_scholarships', function (Blueprint $table) {
            $table->dropForeign(['fileable_id']);
        });

        Schema::table('institution_scholarships', function (Blueprint $table) {
            $table->integer('fileable_id')->unsigned()->change();
        });

        Schema::table('institution_scholarships', function (Blueprint $table) {
            $table->foreign('fileable_id')
                    ->references('id')->on('institutions')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('institution_scholarships', function (Blueprint $table) {
            $table->dropForeign(['fileable_id']);
        });

        Schema::table('institution_scholarships', function (Blueprint $table) {
            $table->foreign('fileable_id')
                    ->references('id')->on('organisations')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
        });
    }
}
