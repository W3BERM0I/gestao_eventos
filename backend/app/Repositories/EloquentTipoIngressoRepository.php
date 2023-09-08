<?php

namespace App\Repositories;

use App\Models\TipoIngresso;

class EloquentTipoIngressoRepository
{
    public function create(int $evento_id, array $tipoIngressos): void
    {
        foreach($tipoIngressos as $tipoIngresso)
        {
            TipoIngresso::create([
                'nome' => $tipoIngresso['nome'],
                'descricao' => $tipoIngresso['descricao'],
                'qtd_ingressos' => $tipoIngresso['qtd'],
                'valor' => $tipoIngresso['valor'],
                'evento_id' => $evento_id,
            ]);
        }
    }

    public function adicionaUmIngresso(int $tipo_ingresso_id): void
    {
        $tipoIngresso = TipoIngresso::where('id', $tipo_ingresso_id)->first();
        $tipoIngresso->vendidos++;
        $tipoIngresso->save();
    }

    public function all()
    {
        return TipoIngresso::all();
    }

    public function tiposIngressosPorEvento(int $idEvento)
    {
        
    }
}
