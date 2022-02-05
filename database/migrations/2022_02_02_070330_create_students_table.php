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
            $table->enum('gender', \Illuminate\Support\Facades\Config::get('constants.gender'));
            $table->string('nik');
            $table->string('birthplace')->nullable();
            $table->date('birthdate')->nullable();
            $table->enum('religion', \Illuminate\Support\Facades\Config::get('constants.religion'))->nullable();
            $table->text('disabled')->nullable();
            $table->text('address')->nullable();
            $table->string('neighbourhood')->nullable();
            $table->string('hamlet')->nullable();
            $table->string('village')->nullable();
            $table->string('urban_village')->nullable();
            $table->string('district')->nullable();
            $table->string('regency')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('telephone')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->boolean('is_kps')->default(false);
            $table->boolean('is_pip')->default(false);
            $table->string('nationality')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('distance_home_to_school')->nullable();
            $table->string('time_go_to_school')->nullable();
            $table->string('period');
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
