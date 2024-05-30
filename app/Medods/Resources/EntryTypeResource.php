<?php

namespace App\Medods\Resources;

use App\Medods\DTO\Requests\ClientCreateData;
use App\Medods\DTO\Requests\ClientListData;
use App\Medods\DTO\Requests\ClientUpdateData;
use App\Medods\DTO\Requests\EntryTypeCategoriesData;
use App\Medods\DTO\Requests\EntryTypeListData;
use App\Medods\Exceptions\MedodsException;
use JsonException;

class EntryTypeResource extends AbstractResource
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
         $this->validateParams(EntryTypeListData::class, $params);

        return $this->adapter->handle('get', 'entry_types', $params);
    }


    /**
     * @throws MedodsException|JsonException
     */
    public function find(int $id)
    {
        $url = 'entry_types' . '/' . $id;

        return $this->adapter->handle('get', $url);
    }

    /**
     * @throws MedodsException|JsonException
     */
    public function categories(array $params)
    {
        $this->validateParams(EntryTypeCategoriesData::class, $params);

        return $this->adapter->handle('get', 'entry_types/categories', $params);
    }
}
