<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('instagram', 255)->nullable();
            $table->string('youtube', 255)->nullable();
            $table->string('whatsapp', 15)->nullable();
            $table->string('tiktok', 255)->nullable();
            $table->text('location')->nullable();
            $table->text('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
