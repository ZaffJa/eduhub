<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionContacts2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('institution_contacts')){
            Schema::create('institution_contacts', function (Blueprint $table){
                $table->increments('id');
                $table->integer('institution_id')->unsigned();
                $table->integer('contact_type_id')->unsigned();
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::table('institution_contacts', function ($table){
                $table->foreign('contact_type_id')
                      ->references('id')->on('contact_types')
                      ->onDelete('cascade')
                      ->onUpdate('restrict');

                $table->foreign('institution_id')
                      ->references('id')->on('institutions')
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
        Schema::dropIfExists('institution_contacts');
    }
}
