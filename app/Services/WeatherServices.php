<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Http;

class WeatherServices
{
    /**
     * Summary of getWeatherDetails
     */
    public function getWeatherDetails(FormRequest $request): array
    {
        $openWeatherKey = config('services.open_weather.key');
        $lat = $request->get('lat') ?? 32.22755101;
        $lon = $request->get('lon') ?? 35.22062553;
        $query = [
            'lat' => $lat,
            'lon' => $lon,
            'appid' => $openWeatherKey,
        ];
        $api = 'https://api.openweathermap.org/data/2.5/onecall';

        $response = Http::get($api, $query);

        return $response->json();
    }
}
