<?php

namespace App\Enums;

enum CacheNaming: string
{
    case NAME = "nome";
    case EMAIL = "email";
    case VERIFIED = "verificado";
    case TOKEN = "token";
    case ATTEMPTS = 'attempts';
    case RESENDS = 'resends';
}
