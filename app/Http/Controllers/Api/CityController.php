<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Services\CityService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Repositories\CityRepository;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CityController extends Controller
{
    private $city;

    public function __construct(CityRepository $city)
    {
        $this->city = $city;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $cities = $this->city->all()->load('province');

        return CityResource::collection($cities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request, CityService $cityService): CityResource
    {
        $params = $request->validated();
        $city = $cityService->store($params);

        return CityResource::make($city);
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city): CityResource
    {
        $city->load('province');

        return CityResource::make($city);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, CityService $cityService, City $city): CityResource
    {
        $params = $request->validated();
        $city = $cityService->update($city, $params)->load('province');

        return CityResource::make($city);
    }
}
