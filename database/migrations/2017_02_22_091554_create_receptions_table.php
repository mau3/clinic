<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('time');
            $table->string('someInformation',500);
            $table->timestamps();

            $table->unsignedInteger('patients_user_id');
            $table->foreign('patients_user_id')->references('user_id')->on('patients');

            $table->unsignedInteger('staff_user_id');
            $table->foreign('staff_user_id')->references('user_id')->on('staff');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('receptions');
    }
}
