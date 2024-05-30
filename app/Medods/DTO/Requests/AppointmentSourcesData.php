<?php

namespace App\Medods\DTO\Requests;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

class AppointmentSourcesData extends Data
{
    public int $offset;
    #[Min(0), Max(100)]
    public int $limit;


    public static function messages(): array
    {
        return [
            'limit.required' => ':attribute обязательный параметр',
            'limit.min' => ':attribute не может быть отрицательным',
            'limit.max' => ':attribute не может быть больше 100',

            'offset.required' => ':attribute обязательный параметр',
        ];
    }
}
