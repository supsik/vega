<?php

namespace App\Medods\DTO\Requests;


use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

class AppointmentUpdateData extends Data
{
    #[Min(0)]
    public ?int $clinicId;

    #[Min(0)]
    public ?int $clientId;

    public ?ClientCreateData $client;

    #[Min(0)]
    public ?int $userId;

    public ?bool $allowIntersection;

    #[Min(0)]
    public ?int $duration;

    public ?string $date;

    public ?string $time;

    public ?string $note;

    public ?string $clientComment;

    #[Min(0)]
    public ?int $appointmentTypeId;

    #[Min(0)]
    public ?int $appointmentSourceId;

    public ?array $entryTypeIds;


    public static function messages(): array
    {
        return [
            'clinicId.min' => ':attribute не может быть отрицательным',

            'clientId.min' => ':attribute не может быть отрицательным',

            'userId.min' => ':attribute не может быть отрицательным',

            'duration.min' => ':attribute не может быть отрицательным',

            'appointmentTypeId.min' => ':attribute не может быть отрицательным',

            'appointmentSourceId.min' => ':attribute не может быть отрицательным',

        ];
    }
}
