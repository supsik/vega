<?php

namespace App\Medods;

use App\Medods\Exceptions\MedodsException;
use Firebase\JWT\JWT;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use JsonException;

class MedodsAdapter
{
    const MEDODS_API_VERSION = 'v2';

    private PendingRequest $client;

    public function __construct()
    {
        $baseUri = env('MEDODS_API_ROOT').'/'.self::MEDODS_API_VERSION.'/';

        $this->client = Http::baseUrl($baseUri)
            ->withHeaders([
                'Authorization' => "Bearer {$this->generateToken()}",
                'Accept' => 'application/json',
            ]);
    }

    private function generateToken(): string
    {
        $header = [
            'alg' => 'HS512',
            'typ' => 'JWT'
        ];

        $payload = [
            'iss' => env('MEDODS_IDENTITY'),
            'iat' => time(),
            'exp' => time() + 60 // время истечения токена через 60 секунд
        ];

        return JWT::encode($payload, env('MEDODS_SECRET_KEY'), 'HS512', null, $header);
    }

    /**
     * @throws MedodsException|JsonException
     */
    public function handle(string $httpMethod, string $url, array $options = [])
    {
        $error = [];

        try {
            $response = $this->$httpMethod($url, $options);

            if (isset($options['pdf'])) {
                $data = $response->toPdf();
            } else {
                $data = $response->toArray();
            }

            $status = $response->getStatusCode();

            if ($status !== 200) {
                $error = $this->generateError($response->getContent(), $status);
            }
        } catch (ServerException $e) {
            $response = $e->getResponse();

            $data = json_decode((string)$response->getBody(), true, 512, JSON_THROW_ON_ERROR);

            $error = $this->generateError($data, $e->getCode());
        }

        if ($error) {
            throw new MedodsException($error);
        }


        return $data;
    }

    public function get(string $url, array $options = []): MedodsResponse
    {
        return $this->request('get', $url, $options);
    }

    public function post(string $url, array $options = []): MedodsResponse
    {
        return $this->request('post', $url, $options);
    }

    public function patch(string $url, array $options = []): MedodsResponse
    {
        return $this->request('patch', $url, $options);
    }

    private function request(string $method, $uri = '', array $options = []): MedodsResponse
    {
        $method = strtolower($method);

        $response = $this->client->$method($uri, $options);

        return new MedodsResponse($response);
    }

    public function generateError(string $message, int $status): array
    {
        return [
            'message' => $message,
            'code' => $status
        ];
    }
}
