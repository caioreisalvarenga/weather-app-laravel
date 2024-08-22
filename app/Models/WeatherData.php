<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherData extends Model
{
    protected $fillable = [
        'city', 'temperature', 'feels_like', 'temp_min', 'temp_max',
        'pressure', 'humidity', 'visibility', 'wind_speed', 'wind_deg',
        'rain_1h', 'clouds_all', 'weather_id', 'weather_main',
        'weather_description', 'weather_icon'
    ];
}
