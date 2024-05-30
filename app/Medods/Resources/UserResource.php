<?php

namespace App\Medods\Resources;

use App\Medods\DTO\Requests\UserListData;
use App\Medods\DTO\Requests\UserSpecialtiesData;
use App\Medods\Exceptions\MedodsException;
use JsonException;

class UserResource extends AbstractResource
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
         $this->validateParams(UserListData::class, $params);

        return $this->adapter->handle('get', 'users', $params);
    }


    /**
     * @throws MedodsException|JsonException
     */
    public function find(int $id)
    {
        $url = 'users' . '/' . $id;

        return $this->adapter->handle('get', $url);
    }

    /**
     * @throws MedodsException|JsonException
     */
    public function specialties(array $params)
    {
        $this->validateParams(UserSpecialtiesData::class, $params);

        return $this->adapter->handle('get', 'users/specialties', $params);
    }
}
