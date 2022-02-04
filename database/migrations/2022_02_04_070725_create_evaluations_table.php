<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('evaluation_type', ['SKALA', 'HASIL KARYA']);
            $table->text('basic_competencies');
            $table->enum('achievements', ['BB', 'MB', 'BSH', 'BSB']);
            $table->integer('period_setting_id')->unsigned();
            $table->integer('evaluation_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('period_setting_id')->references('id')->on('period_settings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('evaluations');
    }
}
