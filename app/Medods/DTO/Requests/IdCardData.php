<?php

namespace App\Medods\DTO\Requests;


use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Data;

class IdCardData extends Data
{
    #[In('passport')]
    public string $type;
    public ?string $series;
    public ?string $number;
    public ?string $issuedBy;
    public ?string $issueDate;

    public static function messages(): array
    {
        return [
            'type.required' => ':attribute обязательный параметр',
            'series.required' => ':attribute обязательный параметр',
            'number.required' => ':attribute обязательный параметр',
            'issuedBy.required' => ':attribute обязательный параметр',
            'issueDate.required' => ':attribute обязательный параметр',

        ];
    }
}
