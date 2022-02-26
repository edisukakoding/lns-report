<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class CreateAspectSettingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspect_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('category', Config::get('constants.aspect_categories'));
            $table->enum('subcategory', Config::get('constants.aspect_subcategories'))->nullable();
            $table->text('point');
            $table->integer('index');
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
        Schema::drop('aspect_settings');
    }
}
