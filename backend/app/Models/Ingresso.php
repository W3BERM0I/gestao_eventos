<?php

namespace App\Models;

use App\Models\User;
use App\Models\TipoIngresso;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Ingresso extends Model
{
    use HasFactory;

    protected $table = "ingressos";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'quitado',
        'user_id',
        'tipo_ingresso_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tipoIngresso() {
        return $this->belongsTo(TipoIngresso::class);
    }
}
