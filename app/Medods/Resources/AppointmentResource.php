<?php

namespace App\Medods\Resources;

use App\Medods\DTO\Requests\AppointmentCreateData;
use App\Medods\DTO\Requests\AppointmentListData;
use App\Medods\DTO\Requests\AppointmentSourcesData;
use App\Medods\DTO\Requests\AppointmentTypesData;
use App\Medods\DTO\Requests\AppointmentUpdateData;
use App\Medods\Exceptions\MedodsException;
use JsonException;

class AppointmentResource extends AbstractResource
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws MedodsException
     * @throws JsonException
     */
    public function list(array $params): array
    {
        $this->validateParams(AppointmentListData::class, $params);

        return $this->adapter->handle('get', 'appointments', $params);
    }

    /**
     * @throws MedodsException|JsonException
     */
    public function find(int $id)
    {
        $url = 'appointments'.'/'.$id;

        return $this->adapter->handle('get', $url);
    }

    /**
     * @throws MedodsException|JsonException
     */
    public function create(array $params)
    {
        $this->validateParams(AppointmentCreateData::class, $params);

        return $this->adapter->handle('post', 'appointments', $params);
    }

    /**
     * @throws MedodsException|JsonException
     */
    public function update(int $id, array $params)
    {
        $this->validateParams(AppointmentUpdateData::class, $params);

        $url = 'appointments'.'/'.$id;

        return $this->adapter->handle('patch', $url, $params);
    }

    /**
     * @throws MedodsException
     * @throws JsonException
     */
    public function types(array $params): array
    {
        $this->validateParams(AppointmentTypesData::class, $params);

        return $this->adapter->handle('get', 'appointments/types', $params);
    }

    public function sources(array $params): array
    {
        $this->validateParams(AppointmentSourcesData::class, $params);

        return $this->adapter->handle('get', 'appointments/sources', $params);
    }
}
