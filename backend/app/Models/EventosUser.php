<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventosUser extends Model
{
    use HasFactory;

    protected $table = "eventos_users";

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function evento()
    {
        return $this->hasMany(Evento::class);
    }
}
