<?php

namespace App\Enums;

enum NivelAcesso: string
{
    case COMUN = "cg001";
    case COLABORADOR = "cg002";
    case DIRETOR = "cg003";
}