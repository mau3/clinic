<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionHasStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_has_staff', function(Blueprint $table) {
            $table->unsignedInteger('position_id');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('staff');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
