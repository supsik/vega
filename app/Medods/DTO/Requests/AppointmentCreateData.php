<?php

namespace App\Medods\DTO\Requests;


use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

class AppointmentCreateData extends Data
{
    #[Min(0)]
    public int $clinicId;

    #[Min(0)]
    public ?int $clientId;

    public ?ClientCreateData $client;

    #[Min(0)]
    public int $userId;

    public ?bool $allowIntersection;

    #[Min(0)]
    public int $duration;

    public string $date;

    public string $time;

    public ?string $note;

    public ?string $clientComment;

    #[Min(0)]
    public int $appointmentTypeId;

    #[Min(0)]
    public int $appointmentSourceId;

    public ?array $entryTypeIds;

    public static function messages(): array
    {
        return [
            'clinicId.required' => ':attribute обязательный параметр',
            'clinicId.min' => ':attribute не может быть отрицательным',

            'clientId.min' => ':attribute не может быть отрицательным',

            'userId.required' => ':attribute обязательный параметр',
            'userId.min' => ':attribute не может быть отрицательным',

            'duration.required' => ':attribute обязательный параметр',
            'duration.min' => ':attribute не может быть отрицательным',

            'date.required' => ':attribute обязательный параметр',

            'time.required' => ':attribute обязательный параметр',

            'appointmentTypeId.required' => ':attribute обязательный параметр',
            'appointmentTypeId.min' => ':attribute не может быть отрицательным',

            'appointmentSourceId.required' => ':attribute обязательный параметр',
            'appointmentSourceId.min' => ':attribute не может быть отрицательным',

            'entryTypeIds.required' => ':attribute обязательный параметр',
        ];
    }
}
