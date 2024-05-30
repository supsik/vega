<?php

namespace App\Medods\Exceptions;

use Exception;

class MedodsException extends Exception
{
    public function __construct(array $error)
    {
        parent::__construct($error['message'], $error['code']);
    }
}
