<?php

namespace App\Medods\Resources;

use App\Medods\DTO\Requests\ClientCreateData;
use App\Medods\DTO\Requests\ClientListData;
use App\Medods\DTO\Requests\ClientUpdateData;
use App\Medods\Exceptions\MedodsException;
use JsonException;

class ClientResource extends AbstractResource
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
         $this->validateParams(ClientListData::class, $params);

        return $this->adapter->handle('get', 'clients', $params);
    }

    /**
     * @throws MedodsException
     * @throws JsonException
     */
    public function create(array $params)
    {
         $this->validateParams(ClientCreateData::class, $params);

        try{
            $data = $this->adapter->handle('post', 'clients', $params);

        }catch(MedodsException $e)
        {
            throw $e;
        }
        return $data;
    }

    public function update(int $id, array $params)
    {
        $this->validateParams(ClientUpdateData::class, $params);

        $url = 'clients' . '/' . $id;

        return $this->adapter->handle('patch', $url, $params);
    }


    /**
     * @throws MedodsException|JsonException
     */
    public function find(int $id)
    {
        $url = 'clients' . '/' . $id;

        return $this->adapter->handle('get', $url);
    }
}
