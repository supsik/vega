<?php

namespace App\Medods;

use Illuminate\Http\Client\Response;

class MedodsResponse
{
    private int $statusCode;
    private $body;

    public function __construct(Response $response)
    {
        $this->statusCode = $response->status();

        $this->body = $response->body();
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getContent(): string
    {
        return $this->body;
    }

    public function toArray(int $depth = 512, int $flags = 0): mixed
    {
        return json_decode($this->getContent(), true, $depth, $flags);
    }

    public function toPdf(): string
    {
        return $this->getContent();
    }
}
