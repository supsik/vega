<?php

namespace App\Medods\Resources;

use App\Medods\Exceptions\MedodsException;
use App\Medods\MedodsAdapter;
use Illuminate\Validation\ValidationException;
use TypeError;

abstract class AbstractResource
{
    protected MedodsAdapter $adapter;

    public function __construct()
    {
        $this->adapter = new MedodsAdapter();
    }

    /**
     * @param string $dtoClass
     * @param array $params
     * @return void
     * @throws MedodsException
     */
    protected function validateParams(string $dtoClass, array $params): void
    {
        try {
            $dtoClass::validate($params);
        } catch (TypeError $e) {
            $error = [
                'reason' => 'Type error',
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            ];
            throw new MedodsException($error);
        } catch (ValidationException $e) {
            $error = [
                'reason' => 'Invalid request parameter',
                'code' => 422,
                'message' => $e->getMessage(),
            ];
            throw new MedodsException($error);
        }
    }
}
