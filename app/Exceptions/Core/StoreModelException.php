<?php

namespace App\Exceptions\Core;

use Exception;

class StoreModelException extends Exception
{
    public function __construct($message = 'Error al intentar guardar el modelo.')
    {
        parent::__construct($message);
    }
}
