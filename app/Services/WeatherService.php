<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\WeatherData;

class WeatherService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('OPENWEATHER_API_KEY');
    }

    public function getWeather($city)
    {
        try {
            $response = Http::withOptions(['verify' => false])->get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric'
            ]);

            $weatherData = $response->json();

            if ($response->failed()) {
                return [
                    'error' => $weatherData['message'] ?? 'Erro ao obter dados meteorológicos.',
                    'code' => $weatherData['cod'] ?? 500
                ];
            }

            WeatherData::updateOrCreate(
                ['city' => $weatherData['name']],
                [
                    'temperature' => $weatherData['main']['temp'],
                    'feels_like' => $weatherData['main']['feels_like'],
                    'temp_min' => $weatherData['main']['temp_min'],
                    'temp_max' => $weatherData['main']['temp_max'],
                    'pressure' => $weatherData['main']['pressure'],
                    'humidity' => $weatherData['main']['humidity'],
                    'visibility' => $weatherData['visibility'],
                    'wind_speed' => $weatherData['wind']['speed'],
                    'wind_deg' => $weatherData['wind']['deg'],
                    'rain_1h' => $weatherData['rain']['1h'] ?? null,
                    'clouds_all' => $weatherData['clouds']['all'],
                    'weather_id' => $weatherData['weather'][0]['id'],
                    'weather_main' => $weatherData['weather'][0]['main'],
                    'weather_description' => $weatherData['weather'][0]['description'],
                    'weather_icon' => $weatherData['weather'][0]['icon']
                ]
            );

            return $weatherData;

        } catch (\Exception $e) {
            return [
                'error' => 'Ocorreu um erro ao obter os dados meteorológicos.',
                'code' => 500
            ];
        }
    }
}