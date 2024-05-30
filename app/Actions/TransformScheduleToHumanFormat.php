<?php

declare(strict_types=1);

namespace App\Actions;

final class TransformScheduleToHumanFormat
{
    public function run(array $data)
    {
        return array_values(
            array_filter(
                array_map(function ($date, $times) {
                    if (empty($times[array_key_first($times)])) {
                        return null;
                    }
                    return [
                        'date' => $date,
                        'times' => array_chunk($times[array_key_first($times)], 10)
                    ];
                }, array_keys($data), $data)
            )
        );
    }
}
