<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\EloquentUserRepository;
use App\Repositories\EloquentEventoRepository;
use App\Repositories\EloquentEventoUserRepository;
use App\Repositories\EloquentIngressosRepository;
use App\Repositories\EloquentTipoIngressoRepository;
use Exception;

class EventoController extends Controller
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
            'nome' => 'required|string',
            'qtd_ingressos' => 'required|integer',
            'data' => 'required|string',
            'localizacao' => 'required|string',
            'maps_id' => 'required|string',
            'admins_email' => 'required',
            'ingressos' => 'required',
        ];

        $messages = [
            'nome.required' => 'O campo de nome é obrigatório.',
            'qtd_ingressos.required' => 'O campo de nome é obrigatório.',
            'data.required' => 'O campo de nome é obrigatório.',
            'localizacao.required' => 'O campo de nome é obrigatório.',
            'maps_id.required' => 'O campo de nome é obrigatório.',
            'admins_email.required' => 'O campo de nome é obrigatório.',
            'ingressos.required' => 'O campo de nome é obrigatório.',
        ];
        
        $request->validate($rules, $messages);

        try{
            DB::beginTransaction();
            $evento = $this->eventoRepository->create($request->all());
            $this->tipoIngressoRepository->create($evento->id, $request->ingressos);
            $admins_id = $this->userRepository->verifiedAllAdmin($request->admins_email);
            if($admins_id)
                $this->eventoUserRepository->create($evento->id, $admins_id);
            else {
                DB::rollBack();
                return response()->json("None of the users provided can be administrators", 409);
            }

            DB::commit();
            return response()->json('Event created', 201);
        } catch(Exception $e) {
            info('error', [$e]);
            DB::rollBack();
        }
    }
}
