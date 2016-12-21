<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasColumn('schools','stream')) {
            Schema::table('schools', function ($table){
                $table->dropColumn('stream');
            });
        }

        Schema::table('schools', function (Blueprint $table) {
            $table->integer('rank')->nullable()->unsigned()->change();
            $table->integer('stream_type_id')->unsigned()->nullable()->after('fax');

            $table->foreign('stream_type_id')
                ->references('id')->on('school_streams')
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
        if(Schema::hasColumn('schools','stream_type_id')) {
            Schema::table('schools', function ($table){
                $table->dropForeign(['stream_type_id']);
                $table->dropColumn('stream_type_id');
            });
        }

        Schema::table('schools', function (Blueprint $table) {
            $table->text('stream')->nullable()->after('fax');
            $table->integer('rank')->unique()->nullable()->unsigned()->change();
        });
    }
}
