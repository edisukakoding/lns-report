<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnecdotEvaluationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anecdote_evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_room_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('anecdote_evaluations', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('class_room_id')->references('id')->on('class_rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('anecdot_evaluations');
    }
}
