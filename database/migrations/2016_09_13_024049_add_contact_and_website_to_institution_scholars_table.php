<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContactAndWebsiteToInstitutionScholarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('institution_scholarships', function (Blueprint $table) {
            $table->string('contact',20);
            $table->text('website',65);
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
          $table->dropColumn('contact');
          $table->dropColumn('website');
        });
    }
}
