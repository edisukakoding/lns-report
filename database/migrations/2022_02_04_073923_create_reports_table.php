<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->bigInteger('teacher_id')->unsigned();
            $table->text('aspect');
            $table->text('value');
            $table->softDeletes();
            $table->index('student_id');
            $table->index('teacher_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('teacher_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reports');
    }
}
