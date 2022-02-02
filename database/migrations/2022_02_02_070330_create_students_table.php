<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_room_id')->unsigned();
            $table->string('name');
            $table->enum('gender', ['Pria', 'Wanita']);
            $table->string('nik');
            $table->string('birthplace');
            $table->date('birthdate');
            $table->enum('religion', ['ISLAM', 'KRISTEN', 'KATOLIK', 'BUDHA', 'HINDU', 'KONG HU CU']);
            $table->text('disabled');
            $table->text('address');
            $table->string('neighbourhood');
            $table->string('hamlet');
            $table->string('village');
            $table->string('urban_village');
            $table->string('district');
            $table->string('regency');
            $table->string('postal_code');
            $table->string('telephone');
            $table->string('phone');
            $table->string('email');
            $table->boolean('is_kps');
            $table->boolean('is_pip');
            $table->string('nationality');
            $table->integer('height');
            $table->integer('weight');
            $table->string('distance_home_to_school');
            $table->text('time_go_to_school');
            $table->index('class_room_id');
            $table->foreign('class_room_id')->references('id')->on('class_rooms')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
