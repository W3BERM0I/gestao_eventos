<?php

namespace App\Exceptions;

use Exception;

class TokenException extends Exception
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
}
