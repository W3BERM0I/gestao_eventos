<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Evento;

class EventosUser extends Model
{
    use HasFactory;

    protected $table = "eventos_users";

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'evento_id',
        'user_id',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function evento()
    {
        return $this->hasMany(Evento::class);
    }
}
