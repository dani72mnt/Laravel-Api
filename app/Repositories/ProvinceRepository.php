<?php

namespace App\Repositories;

use App\Models\Province;

class ProvinceRepository extends Repository
{
    public function model(){

        return Province::class;

    }

}
