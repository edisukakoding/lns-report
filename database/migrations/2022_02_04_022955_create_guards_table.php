<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->string('type');
            $table->string('name');
            $table->integer('birthyear')->nullable();
            $table->string('graduates')->nullable();
            $table->string('job')->nullable();
            $table->integer('income')->nullable();
            $table->text('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index('student_id');
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
        Schema::drop('guards');
    }
}
