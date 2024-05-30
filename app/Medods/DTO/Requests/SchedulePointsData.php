<?php

namespace App\Medods\DTO\Requests;


use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

class SchedulePointsData extends Data
{
    public string $startData;

    public string $endDate;

    #[Min(0)]
    public int $clinicId;

    public bool $allowAppointmentIntersection;

    public array $userParams;

    public static function messages(): array
    {
        return [
            'startData.required' => ':attribute обязательный параметр',

            'endDate.required' => ':attribute обязательный параметр',

            'clinicId.required' => ':attribute обязательный параметр',
            'clinicId.min' => ':attribute не может быть отрицательным',

            'allowAppointmentIntersection.required' => ':attribute обязательный параметр',

            'userParams.required' => ':attribute обязательный параметр',
        ];
    }
}
