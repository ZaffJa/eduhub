<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSchoolTypeIdToSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->integer('school_type_id')->unsigned()->nullable()->after('code');

            $table->foreign('school_type_id')
                ->references('id')->on('school_types')
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
        Schema::table('schools', function (Blueprint $table) {

            if(Schema::hasColumn('schools','stream_type_id')) {
                $table->dropForeign(['school_type_id']);
                $table->dropColumn('school_type_id');
            }
        });
    }
}
