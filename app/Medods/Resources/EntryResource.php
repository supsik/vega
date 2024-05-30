<?php

namespace App\Medods\Resources;

use App\Medods\DTO\Requests\EntriesListData;
use App\Medods\Exceptions\MedodsException;
use JsonException;

class EntryResource extends AbstractResource
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
        $this->validateParams(EntriesListData::class, $params);

        return $this->adapter->handle('get', 'entries', $params);
    }

    /**
     * @throws MedodsException|JsonException
     */
    public function find(int $id)
    {
        $url = 'entries'.'/'.$id;

        return $this->adapter->handle('get', $url);
    }

    public function pdf(int $id)
    {
        $url = 'entries'.'/'.$id.'/'.'pdf';

        return $this->adapter->handle('get', $url, ['pdf' => true]);
    }
}
