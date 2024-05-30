<?php

namespace App\Labquest;

use App\Labquest\Exceptions\LabquestException;

class LabquestApi
{
    const LABQUEST_HOST = 'lis.labquest.ru';
    const LABQUEST_PORT = 9902;

    protected $client;

    public function __construct()
    {
        $sender = env('ALPHA_LAB_SENDER');
        $password = env('ALPHA_LAB_PASSWORD');

        $encoded = base64_encode($sender . ':' . $password);

        $this->client = \Http::withHeaders([
            'Authorization' =>  "Basic {$encoded}",
        ]);
    }

    public function url(string $path)
    {
        return 'https://' . self::LABQUEST_HOST . ':' . self::LABQUEST_PORT . '/' . $path . '?format=json';
    }

    /**
     * @throws LabquestException
     */
    public function dictionaries()
    {

        $res = $this->client
            ->post($this->url('query-dictionaries'), [
                'MessageType' => 'query-dictionaries-version',
            ]);

        if ($res->json('messageType') === 'error') {
            throw new LabquestException([
                'code' => $res->status(),
                'message' => $res->json('error')
            ]);
        }

        return $res->json();
    }
}
