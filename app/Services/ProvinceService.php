<?php

namespace App\Services;

use App\Models\Province;
use App\Repositories\ProvinceRepository;

class ProvinceService
{
    private $province;

    public function __construct(ProvinceRepository $province)
    {
        $this->province = $province;
    }

    public function store(array $params): mixed
    {
        return $this->province->store($params);
    }

    function update(Province $province, array $params) : ?Province
    {
        return $this->province->update($province, $params);
    }

}
