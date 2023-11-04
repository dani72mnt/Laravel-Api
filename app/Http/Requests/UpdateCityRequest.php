<?php

namespace App\Http\Requests;

use App\DataTransferObjects\City\UpdateDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:70',
            'province_id' => 'required|integer|exists:provinces,id',
        ];
    }

    public function toDTO(): UpdateDTO
    {
        return new UpdateDTO([
            'name' => $this->name,
            'province_id' => $this->province_id,
        ]);
    }
}
