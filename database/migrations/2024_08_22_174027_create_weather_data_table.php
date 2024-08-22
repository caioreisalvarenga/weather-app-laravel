<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherDataTable extends Migration
{
    public function up()
    {
        Schema::create('weather_data', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->decimal('temperature', 5, 2);
            $table->decimal('feels_like', 5, 2);
            $table->decimal('temp_min', 5, 2);
            $table->decimal('temp_max', 5, 2);
            $table->integer('pressure');
            $table->integer('humidity');
            $table->integer('visibility');
            $table->decimal('wind_speed', 5, 2);
            $table->integer('wind_deg');
            $table->decimal('rain_1h', 5, 2)->nullable();
            $table->integer('clouds_all');
            $table->integer('weather_id');
            $table->string('weather_main');
            $table->string('weather_description');
            $table->string('weather_icon');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weather_data');
    }
};
