<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaportDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raport_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('raport_id')->unsigned();
            $table->text('type');
            $table->text('description');
            $table->enum('result', ['A', 'B', 'C']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('raport_id')->references('id')->on('raports');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('raport_details');
    }
}
