<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeskripsiToPersonalityTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personality_types', function (Blueprint $table) {

            $table->text('deskripsi')->nullable()->after('description');
            $table->string('jenis')->nullable()->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personality_types', function (Blueprint $table) {

            $table->dropColumn(['deskripsi','jenis']);
        });
    }
}
