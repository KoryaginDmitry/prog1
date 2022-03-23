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
            $table->foreignId('user_id');
            $table->integer('salary')->nullable($value = true)->default(0);
            $table->integer('hourlyPayment')->nullable($value = true)->default(0);
            $table->integer('percent')->nullable($value = true)->default(0);
            $table->boolean('tips')->nullable($value = true)->default(false);
            $table->boolean('taxi')->nullable($value = true)->default(false);
            $table->boolean('rub')->nullable($value = true)->default(false);
            $table->boolean('other')->nullable($value = true)->default(false);
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
