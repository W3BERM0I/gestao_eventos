<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = "eventos";


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'qtd_ingressos',
        'data',
        'localizacao',
        'maps_id'
    ];


    public function ingressos() {
        return $this->hasMany(Ingressos::class);
    }

    public function eventosUser() {
        return $this->hasMany(EventoUser::class);
    }
}
