<?php

namespace App\Repositories;

use App\Models\User;
use App\Enums\NivelAcesso;
use Illuminate\Database\Eloquent\Collection;

class EloquentUserRepository
{
    public function all()
    {
        return User::all();
    }

    public function allAdmin()
    {
        $users = User::whereNot('nivel_acesso', NivelAcesso::COMUN->name)->get();
        return $users;
    }

    public function verifiedAllAdmin(array $users)
    {
        $admins_id = [];

        foreach($users as $user_email)
        {
            $user = User::where('email', $user_email)->first();
            if($user->nivel_acesso !== NivelAcesso::COMUN->name) 
                array_push($admins_id, $user->id); 
        }
        
        return $admins_id;
    }
}
