<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColToInstitutions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('institutions', function (Blueprint $table) {
            $table->string('public_relations_department_email')->nullable();
            $table->string('student_enrollment_department_email')->nullable();
            $table->string('corporate_communications_department_email')->nullable();
            $table->string('marketing_department_email')->nullable();
            $table->string('email')->nullable();
            $table->string('remarks')->nullable();
            $table->string('examination_board')->nullable();
             $table->string('contact_no')->nullable();
            $table->string('fax_no')->nullable();
            $table->integer('file_id')->unsigned()->nullable();
        });

        Schema::table('institutions', function (Blueprint $table) {
            $table->foreign('file_id')
                    ->references('id')->on('files')
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
        Schema::table('institutions', function (Blueprint $table) {

            Schema::table('institutions', function (Blueprint $table) {
                $table->dropForeign(['file_id']);
            });

            $table->dropColumn(['public_relations_department_email',
                                'student_enrollment_department_email',
                                'corporate_communications_department_email',
                                'marketing_department_email',
                                'email',
                                'remarks',
                                'examination_board',
                                'fax_no',
                                'file_id',
                            ]);
        });


    }
}
