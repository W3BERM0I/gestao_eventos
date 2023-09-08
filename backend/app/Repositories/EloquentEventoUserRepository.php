<?php

namespace App\Repositories;

use App\Models\EventosUser;
use App\Enums\NivelAcesso;
use Illuminate\Http\Request;

class EloquentEventoUserRepository
{
    public function create(int $evento_id, array $evento_admins)
    {
        foreach($evento_admins as $admin)
        {
            EventosUser::create([
                'evento_id' => $evento_id,
                'user_id' => $admin
            ]);
        }
    }
}