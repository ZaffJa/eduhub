<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusOpeningDateClosingDateToInstitutionScholarships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('institution_scholarships', function (Blueprint $table) {
            $table->integer('status')->default(0);
            $table->date('opening')->nullable();
            $table->date('closing')->nullable();
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
            $table->dropColumn(['status','opening','closing']);
        });
    }
}
