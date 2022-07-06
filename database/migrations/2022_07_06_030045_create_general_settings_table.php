<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('general_settings', static function (Blueprint $table) {
            $table->increments('id');
            $table->string('paud_name');
            $table->longText('paud_address')->default('-')->nullable();
            $table->string('paud_phone_number')->default('-')->nullable();
            $table->string('paud_fax')->default('-')->nullable();
            $table->string('paud_telephone')->default('-')->nullable();
            $table->string('paud_email')->default('-')->nullable();
            $table->string('paud_website')->default('-')->nullable();
            $table->integer('head_of_paud')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('head_of_paud')->references('id')->on('personals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('general_settings');
    }
}
