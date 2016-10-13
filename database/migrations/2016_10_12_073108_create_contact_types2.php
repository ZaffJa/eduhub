<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTypes2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('contact_types')) {
            
            Schema::create('contact_types', function (Blueprint $table) {
                $table->increments('id');
                $table->string('public_relations_department_email')->nullable();
                $table->string('student_enrollment_department_email')->nullable();
                $table->string('corporate_communications_department_email')->nullable();
                $table->string('marketing_department_email')->nullable();
                $table->string('email')->nullable();
                $table->string('remarks')->nullable();
                $table->string('examination_board')->nullable();
                $table->timestamps();
                $table->softDeletes();
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
        Schema::dropIfExists('contact_types');
    }
}
