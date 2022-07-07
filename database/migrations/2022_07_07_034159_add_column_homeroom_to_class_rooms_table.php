<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnHomeroomToClassRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('class_rooms', static function (Blueprint $table) {
            $table->integer('homeroom')->unsigned()->nullable();
            $table->foreign('homeroom')->references('id')->on('personals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('class_rooms', static function (Blueprint $table) {
            $table->dropColumn('homeroom');
        });
    }
}
