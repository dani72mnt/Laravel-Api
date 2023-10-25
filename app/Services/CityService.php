<?php

namespace App\Services;

use App\Models\City;
use App\Repositories\CityRepository;

class CityService
{
    private $city;

    public function __construct(CityRepository $city)
    {
        $this->city = $city;
    }

    public function store(array $params): mixed
    {
        return $this->city->store($params);
    }

    function update(City $city, array $params) : ?City
    {
        return $this->city->update($city, $params);
    }

}
