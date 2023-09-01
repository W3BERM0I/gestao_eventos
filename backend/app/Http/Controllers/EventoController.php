<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\EloquentEventoRepository;

class EventoController extends Controller
{
    public function __construct(private EloquentEventoRepository $eventoRepository)
    {
    }

    public function create(Request $request)
    {
        $authUser = Auth::user();

        $rules = [
            'nome' => 'required|string',
            'qtd_ingressos' => 'required|integer',
            'data' => 'required|string',
            'localizacao' => 'required|string',
            'maps_id' => 'required|string',
        ];

        $messages = [
            'nome.required' => 'O campo de nome é obrigatório.',
            'qtd_ingressos.required' => 'O campo de nome é obrigatório.',
            'data.required' => 'O campo de nome é obrigatório.',
            'localizacao.required' => 'O campo de nome é obrigatório.',
            'maps_id.required' => 'O campo de nome é obrigatório.',
        ];

        $request->validate($rules, $messages);

        $this->eventoRepository->create($request);
    }
}
