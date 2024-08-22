<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function show(Request $request)
    {
        $request->validate([
            'city' => 'required|string',
        ]);

        $city = $request->input('city');
        $weatherData = $this->weatherService->getWeather($city);

        return response()->json($weatherData);
    }
    
}
