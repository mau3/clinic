<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dateofPublish');
            $table->string('title',50);
            $table->string('description',700);
            $table->char('picture',100)->nullable();
            $table->timestamps();

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
        Schema::drop('news');
    }
}
