<?php

namespace App\Medods\DTO\Requests;


use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

class AddressData extends Data
{
    public string $index;
    public string $country;
    public string $region;
    public string $area;
    public string $city;
    public string $street;
    public string $house;
    public string $flat;

    public static function messages(): array
    {
        return [
            'clinicId.required' => ':attribute обязательный параметр',
            'country.required' => ':attribute обязательный параметр',
            'region.required' => ':attribute обязательный параметр',
            'area.required' => ':attribute обязательный параметр',
            'city.required' => ':attribute обязательный параметр',
            'street.required' => ':attribute обязательный параметр',
            'house.required' => ':attribute обязательный параметр',
            'flat.required' => ':attribute обязательный параметр',
        ];
    }
}
