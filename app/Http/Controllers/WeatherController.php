<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function show($city)
    {
        return $this->weatherService->getWeather($city);
    }
}
