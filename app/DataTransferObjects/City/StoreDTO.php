<?php

namespace App\DataTransferObjects\City;

use Illuminate\Http\UploadedFile;
use Spatie\DataTransferObject\DataTransferObject;

class StoreDTO extends DataTransferObject
{
    public string $name;
    public int $province_id;

    public function toDTO(): StoreDTO
    {
        return new StoreDTO(
            name: $this->name,
            province_id: $this->province_id
        );
    }
}
