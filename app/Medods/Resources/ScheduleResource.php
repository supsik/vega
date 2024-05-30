<?php

namespace App\Medods\Resources;

use App\Medods\DTO\Requests\ClientCreateData;
use App\Medods\DTO\Requests\ClientListData;
use App\Medods\DTO\Requests\ClientUpdateData;
use App\Medods\Exceptions\MedodsException;
use JsonException;
use Illuminate\Support\Facades\Cache;

class ScheduleResource extends AbstractResource
{
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @throws MedodsException
     * @throws JsonException
     */
    public function raw(array $params)
    {
//         $this->validateParams(ClientCreateData::class, $params);

        return $this->adapter->handle('post', 'schedule', $params);
    }

    /**
     * @throws MedodsException
     * @throws JsonException
     */
    public function points(array $params)
    {
//        $this->validateParams(ClientCreateData::class, $params);

        $doctor = request()->route('doctor');

        if ($doctor)
        {
            $key = "schedule_{$doctor->id}_{$params['clinicId']}";

            if(!Cache::has($key))
            {
                $value = $this->recitationTime($this->adapter->handle('post', 'schedule/recording_points', $params));
                Cache::store('file')->put($key, $value);
            }

            return Cache::store('file')->get($key);
        }

        return $this->recitationTime($this->adapter->handle('post', 'schedule/recording_points', $params));
    }

    public function recitationTime($schedule)
    {
        foreach ($schedule as $sheduleIndex => $value)
        {
            foreach ($value as $groupIndex => $group)
            {
                $schedule[$sheduleIndex][$groupIndex] = array_filter(
                    $group,
                    fn($item) => !(strtotime($item) < time() && strtotime($sheduleIndex) == strtotime(date('Y-m-d')))
                );

                if (!$schedule[$sheduleIndex][$groupIndex])
                    unset($schedule[$sheduleIndex]);

            }
        }
        return $schedule;
    }

}
