<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttainmentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attainments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_room_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();
            $table->index('class_room_id');
            $table->index('user_id');
            $table->foreign('class_room_id')->references('id')->on('class_rooms');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attainments');
    }
}
