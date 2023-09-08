<?php

namespace App\Repositories;

use App\Models\Evento;
use App\Enums\NivelAcesso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class EloquentEventoRepository
{
    public function all()
    {
        return Evento::all();
    }

    public function findById(int $id)
    {
        return Evento::where('id', $id)->first();
    }

    public function create(array $request): Evento
    {
        try {
            $nome = $request['nome'];
            $data = Carbon::createFromFormat('d-m-Y H:i:s', $request['data']);
            $localizacao = $request['localizacao'];
            $maps_id = $request['maps_id'];

            $evento = Evento::create([
                'nome' => $nome,
                'data' => $data,
                'localizacao' => $localizacao,
                'maps_id' => $maps_id,
            ]);

            return $evento;
        } catch (Exception $e) {
            info('error: ', [$e]);
        }
    }
}
