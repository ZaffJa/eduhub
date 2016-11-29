<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHrdfFeeExamLearningLocationInclusiveShortCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('short_courses')){
            Schema::table('short_courses', function (Blueprint $table){

                if (Schema::hasColumn('short_courses', 'hrdf_scheme')) {

                    Schema::table('short_courses',function ($table){
                        $table->dropColumn('hrdf_scheme');
                    });
                }

                if (Schema::hasColumn('short_courses', 'fee')) {

                    Schema::table('short_courses',function ($table){
                        $table->dropColumn('fee');
                    });
                }

                if (Schema::hasColumn('short_courses', 'exam_fee')) {

                    Schema::table('short_courses',function ($table){
                        $table->dropColumn('exam_fee');
                    });
                }

                if (Schema::hasColumn('short_courses', 'learning_outcome')) {

                    Schema::table('short_courses',function ($table){
                        $table->dropColumn('learning_outcome');
                    });
                }

                if (Schema::hasColumn('short_courses', 'location')) {

                    Schema::table('short_courses',function ($table){
                        $table->dropColumn('location');
                    });
                }

                if (Schema::hasColumn('short_courses', 'inclusive')) {

                    Schema::table('short_courses',function ($table){
                        $table->dropColumn('inclusive');
                    });
                }

                $table->integer('hrdf_scheme')->nullable();
                $table->double('fee', 15, 8)->nullable();
                $table->double('exam_fee',15,8 )->nullable();
                $table->string('learning_outcome')->nullable();
                $table->string('location');
                $table->string('inclusive')->nullable();
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
        if(Schema::hasTable('short_courses')){
            Schema::table('short_courses',function ($table){
                $table->dropColumn(['hrdf_scheme','fee','exam_fee','learning_outcome','location','inclusive']);
            });
        }
    }
}
