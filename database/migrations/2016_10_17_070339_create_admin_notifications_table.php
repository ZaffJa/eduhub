<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message')->nullable();
            $table->tinyInteger('action')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->boolean('click')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
        Schema::table('admin_notifications', function (Blueprint $table) {
            $table->foreign('user_id')
                    ->references('id')->on('users')
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
        Schema::dropIfExists('admin_notifications');
    }
}
