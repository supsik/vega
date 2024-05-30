<?php

namespace App\Labquest\Exceptions;

use Exception;

class LabquestException extends Exception
{
    public function __construct(array $error)
    {
        parent::__construct($error['message'], $error['code']);
    }

}
