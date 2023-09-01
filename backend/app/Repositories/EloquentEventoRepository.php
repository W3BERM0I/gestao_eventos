<?php

namespace App\Repositories;

use App\Models\Evento;
use App\Enums\NivelAcesso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EloquentEventoRepository
{
    public function all()
    {
        return Evento::all();
    }

    public function create(Request $request): Evento
    {
        $nome = $request->nome;
        $qtd_ingressos = $request->qtd_ingressos;
        $data = $request->data;
        $localizacao = $request->localizacao;
        $maps_id = $request->maps_id;

        DB::beginTransaction();
        $evento = Evento::create([
            'nome' => $nome,
            'qtd_ingressos' => $qtd_ingressos,
            'data' => $data,
            'localizacao' => $localizacao,
            'maps_id' => $maps_id,
        ]);
        DB::commit();

        return $evento;
    }
}
