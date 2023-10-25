<?php

namespace App\Http\Controllers\Api;

use App\Models\Province;
use App\Services\ProvinceService;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinceResource;
use App\Repositories\ProvinceRepository;
use App\Http\Requests\StoreProvinceRequest;
use App\Http\Requests\UpdateProvinceRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProvinceController extends Controller
{
    private $province;

    public function __construct(Province $province)
    {
        $this->province = $province;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $provinces = $this->province->all();

        return ProvinceResource::collection($provinces);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProvinceRequest $request, ProvinceService $province): ProvinceResource
    {
        $params = $request->validated();
        $province = Province::create($params);

        return ProvinceResource::make($province);
    }

    /**
     * Display the specified resource.
     */
    public function show(Province $province): ProvinceResource
    {
        return ProvinceResource::make($province);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProvinceRequest $request, ProvinceService $provinceService, Province $province): ProvinceResource
    {
        $params = $request->validated();
        $province = $provinceService->update($province, $params);

        return ProvinceResource::make($province);
    }
}
