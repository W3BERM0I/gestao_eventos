<?php

namespace App\Models;

use App\Models\Evento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoIngresso extends Model
{
    use HasFactory;

    protected $table = "tipo_ingressos";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'descricao',
        'qtd_ingressos',
        'valor',
        'vendidos',
        'evento_id'
    ];

    public function evento() {
        return $this->belongsTo(Evento::class);
    }
}
