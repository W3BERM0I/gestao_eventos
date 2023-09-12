<?php

namespace App\Exceptions;

use Exception;

class IngressoException extends Exception
{
    private string $mensagem;

    public function __construct($message, $code = 0, \Throwable $previous = null)
    {
        $this->mensagem = $message;
        parent::__construct($message, $code, $previous);
    }

    public function getMensagem()
    {
        return $this->mensagem;
    }

    public function response()
    {
        return response()->json(['msgError' => $this->getMensagem()], 409);
    }
}
