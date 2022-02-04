<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttainmentDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attainment_details', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('attainment_id')->unsigned();
            $table->increments('student_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->text('image');
            $table->timestamps();
            $table->softDeletes();
            $table->index('attainment_id');
            $table->index('student_id');
            $table->foreign('attainment_id')->references('id')->on('attainments');
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
        Schema::drop('attainment_details');
    }
}
