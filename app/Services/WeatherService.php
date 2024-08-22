<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

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

            return $weatherData;

        } catch (\Exception $e) {
            return [
                'error' => 'Ocorreu um erro ao obter os dados meteorológicos.',
                'code' => 500
            ];
        }
    }
}
