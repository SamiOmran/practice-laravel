<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherIndexRequest;
use App\Http\Resources\WeatherDetailsResource;
use App\Services\WeatherServices;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WeatherIndexRequest $request, WeatherServices $service): JsonResource
    {
        $data = $service->getWeatherDetails($request);

        return new WeatherDetailsResource($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
