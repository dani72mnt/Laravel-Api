<?php

namespace App\Services;

use App\Models\City;
use App\Repositories\CityRepository;
use App\DataTransferObjects\City\StoreDTO;
use App\DataTransferObjects\City\UpdateDTO;

class CityService
{
    private $city;

    public function __construct(CityRepository $city)
    {
        $this->city = $city;
    }

    public function store(StoreDTO $storeDTO): City
    {
        $data = [
            'name' => $storeDTO->name,
            'province_id' => $storeDTO->province_id
        ];
        return $this->city->store($data);
    }

    function update(City $city, UpdateDTO $updateDTO) : ?City
    {
        $data = [
            'name' => $updateDTO->name,
            'province_id' => $updateDTO->province_id
        ];
        return $this->city->update($city, $data);
    }

}
