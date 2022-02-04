<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnecdoteEvaluationDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anecdote_evaluation_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('anecdote_evaluation_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->string('location');
            $table->dateTime('time');
            $table->text('incident');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('anecdote_evaluation_details', function (Blueprint $table) {
            $table->index('anecdote_evaluation_id');
            $table->index('student_id');
            $table->foreign('anecdote_evaluation_id')->references('id')->on('anecdote_evaluations');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('anecdote_evaluation_details');
    }
}
