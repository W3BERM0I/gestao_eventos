<?php

namespace App\Repositories;

use App\Models\User;
use App\Enums\NivelAcesso;

class EloquentUserRepository
{
    public function all()
    {
        return User::all();
    }

    public function allAdmin()
    {
        $users = User::whereNot('nivel_acesso', NivelAcesso::COMUN->value)->get();
        return $users;
    }
}
