<?php

namespace App\Medods\DTO\Requests;


use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

class ScheduleRawData extends Data
{
    public string $startData;

    public string $endDate;

    #[Min(0)]
    public int $clinicId;

    public array $userIds;

    #[In('arbitrary', 'ordered')]
    public array $availabilityForOnlineRecording;

    public static function messages(): array
    {
        return [
            'startData.required' => ':attribute обязательный параметр',

            'endDate.required' => ':attribute обязательный параметр',

            'clinicId.required' => ':attribute обязательный параметр',
            'clinicId.min' => ':attribute не может быть отрицательным',

            'userIds.required' => ':attribute обязательный параметр',

            'availabilityForOnlineRecording.required' => ':attribute обязательный параметр',
        ];
    }
}
