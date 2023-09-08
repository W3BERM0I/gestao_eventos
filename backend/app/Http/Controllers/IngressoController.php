<?php

namespace App\Http\Controllers;

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
            'tipo_ingresso_id' => 'required|integer',
        ];

        $messages = [
            'tipo_ingresso_id.integer' => 'O campo de evento_id é um numero Inteiro.',
            'tipo_ingresso_id.required' => 'O campo de nome é obrigatório.',
        ];
        
        $request->validate($rules, $messages);

        $authUser = Auth::user();
        //$authUser = 9;

        DB::beginTransaction();
        try {
            $this->tipoIngressoRepository->adicionaUmIngresso($request->tipo_ingresso_id);
            $this->ingressosRepository->create($request->tipo_ingresso_id, $authUser->id);
        } catch(Exception $e){
            info("error: ", [$e]);
            DB::rollBack();
            return response()->json('Please, Try again later', 409);
        }

        DB::commit();

        return response()->json('created', 201);
    }
}
