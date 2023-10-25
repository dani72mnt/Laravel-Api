<?php

namespace App\Repositories;

use App\Models\City;

class CityRepository extends Repository
{
    public function model(){

        return City::class;

    }

}
