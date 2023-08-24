<?php

namespace App\Exceptions;

use Exception;

class TentativasExcedidasException extends Exception
{
    public function render()
    {
        return response()->json([
            'error' => 'Tentativas excedidas, por favor tente novamente mais tarde',
        ], 422);
    }
}
