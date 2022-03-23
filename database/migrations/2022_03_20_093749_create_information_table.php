<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('salary')->nullable($value = true);
            $table->integer('countHours')->nullable($value = true);
            $table->integer('hourlySalary')->nullable($value = true);
            $table->integer('percent')->nullable($value = true);
            $table->integer('kassa')->nullable($value = true);
            $table->integer('tips')->nullable($value = true);
            $table->integer('taxi')->nullable($value = true);
            $table->integer('rub')->nullable($value = true);
            $table->integer('other')->nullable($value = true);
            $table->date('dateInfo');
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
        Schema::dropIfExists('information');
    }
}
