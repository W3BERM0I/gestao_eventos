<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Enums\NivelAcesso;

class AuthController extends Controller
{

    public function sendToken(Request $request)
    {

        $request->validate(['email' => 'required']);

        if(!User::firstWhere('username', $request->email)) 
        {
            $user = new User();
            $user->email = $request->email;
            $user->cargo = Cargos::COMUN->value;
            $user->save();
        }

        return 'cheguei';
    }


    public function login(Request $request)
    {
        // Verifique seus critérios de autenticação aqui
        // Por exemplo, você pode verificar o endereço de IP, o dispositivo ou qualquer outra coisa.

        // Obtenha ou crie um usuário com base nos critérios de autenticação
        $user = User::firstOrCreate([
            'email' => $request->email
        ]);

        // Crie um token de autenticação para o usuário
        $token = $user->createToken('api-token')->plainTextToken;
        $user->email_verified_at = now();
        $user->remember_Token = $token;
        $user->save();

        // Retorne o token como resposta
        return response()->json(['token' => $token]);
    }
}
