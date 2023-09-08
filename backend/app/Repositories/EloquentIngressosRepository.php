<?php

namespace App\Repositories;

use App\Models\Ingresso as ModelIngresso;
use App\Enums\NivelAcesso;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EloquentIngressosRepository
{
    public function create(int $tipo_ingresso_id, int $user_id)
    {
        ModelIngresso::create([
            'tipo_ingresso_id' => $tipo_ingresso_id,
            'user_id' => $user_id,
        ]);
    }
}