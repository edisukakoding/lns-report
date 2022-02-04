<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnecdotEvaluationDetailsTable extends Migration
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
            $table->integer('anecdote_evaluation_id');
            $table->string('location');
            $table->dateTime('time');
            $table->integer('student_id')->unsigned();
            $table->text('incident');
            $table->softDeletes();
            $table->index('student_id');
            $table->foreign('student_id')->references('id')->on('students.id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('anecdot_evaluation_details');
    }
}
