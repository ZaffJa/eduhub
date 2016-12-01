<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('school_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->nullable()->unsigned();
            $table->decimal('latitude',10,6);
            $table->decimal('longtitude',10,6);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('school_locations', function ($table) {
            $table->foreign('school_id')
                    ->references('id')->on('schools')
                    ->onDelete('set null')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_locations');
    }
}
