<?php

namespace App\DataTransferObjects\City;

use Illuminate\Http\UploadedFile;
use Spatie\DataTransferObject\DataTransferObject;

class UpdateDTO extends DataTransferObject
{
    public string $name;
    public int $province_id;

    public function toDTO(): UpdateDTO
    {
        return new UpdateDTO(
            name: $this->name,
            province_id: $this->province_id
        );
    }
}
