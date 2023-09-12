<?php

namespace App\Http\Controllers;

use App\Exceptions\IngressoException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\EloquentUserRepository;
use App\Repositories\EloquentEventoRepository;
use App\Repositories\EloquentIngressosRepository;
use App\Repositories\EloquentEventoUserRepository;
use App\Repositories\EloquentTipoIngressoRepository;
use Exception;

class IngressoController extends Controller
{
    public function __construct(
        private EloquentEventoRepository $eventoRepository,
        private EloquentEventoUserRepository $eventoUserRepository,
        private EloquentIngressosRepository $ingressosRepository,
        private EloquentUserRepository $userRepository,
        private EloquentTipoIngressoRepository $tipoIngressoRepository
    ){ }
    
    public function create(Request $request)
    {
        
        $rules = [
            'ingressos.*.tipo_ingresso_id' => 'required|integer',
            'ingressos.*.qtd' => 'required|integer',
        ];
        
        $messages = [
            'ingressos.*.tipo_ingresso_id.integer' => 'O campo de evento_id é um numero Inteiro.',
            'ingressos.*.qtd.integer' => 'O campo de quantidade é um numero Inteiro.',
            'ingressos.*.tipo_ingresso_id.required' => 'O campo de nome é obrigatório.',
            'ingressos.*.qtd.required' => 'O campo de quantidade é obrigatório.',
        ];
        
        $request->validate($rules, $messages);

        $authUser = (Auth::user())->id;

        DB::beginTransaction();
        try {
            foreach($request->ingressos as $ingressos)
            {
                info("ingresso: ", [$ingressos]);
                $this->tipoIngressoRepository->adicionaIngressos($ingressos['tipo_ingresso_id'], $ingressos['qtd']);
                $this->ingressosRepository->create($ingressos['tipo_ingresso_id'], $authUser, $ingressos['qtd']);
            }
        } catch(IngressoException $e) {
            info("error: ", [$e]);
            DB::rollBack();
            return $e->response();
        }

        DB::commit();

        return response()->json('created', 201);
    }
}
