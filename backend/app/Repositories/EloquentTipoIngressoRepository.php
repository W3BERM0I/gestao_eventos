<?php

namespace App\Repositories;

use App\Exceptions\IngressoException;
use App\Models\TipoIngresso;

class EloquentTipoIngressoRepository
{
    public function findById(int $id)
    {
        return TipoIngresso::where('id', $id)->first();
    }

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

    public function adicionaIngressos(int $tipo_ingresso_id, int $qtd): void
    {
        if($qtd < 1) throw new IngressoException("Numero de ingressos invalido");

        $tipoIngresso = $this->findById($tipo_ingresso_id);
        $tipoIngresso->vendidos += $qtd;
        if($tipoIngresso->vendidos > $tipoIngresso->qtd_ingressos) throw new IngressoException("Ingressos Esgotados");

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
