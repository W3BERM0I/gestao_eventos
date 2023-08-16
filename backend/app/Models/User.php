<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\NivelAcesso;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";

    // protected $attributes = [
    //     'nivel_acesso' => NivelAcesso::COMUN->value,
    // ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'nivel_acesso',
        //'password',
    ];

    public function ingresso()
    {
        return $this->hasMany(Ingresso::class);
    }

    public function eventoUser()
    {
        return $this->hasMany(EventoUser::class);
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        //'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        //'password' => 'hashed',
    ];

    public function ingressos() {
        return $this->hasMany('App\Models\Event');
    }
}
