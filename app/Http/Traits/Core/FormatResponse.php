<?php

namespace App\Http\Traits\Core;

use Illuminate\Http\JsonResponse;


trait FormatResponse {

    public $MESSAGE_ERROR_VALIDATION = 'Error en la validacion de los datos';
    
    public function success(string $message, array $data, int $statusCode){

        $response = [            
            'status'  => 'success',
            'message' => $message,
            'data' => $data    
        ];

        return new JsonResponse($response, $statusCode);
    }

    public function error(string $message, array $details, int $statusCode){

        $response = [            
            'status'  => 'error',
            'message' => $message,
            'data' => $details
        ];

        return new JsonResponse($response, $statusCode);
    }

}