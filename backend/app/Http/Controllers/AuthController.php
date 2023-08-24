<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\TokenException;
use App\Models\User;
use App\Enums\NivelAcesso;
use App\Enums\CacheKeys;
use App\Enums\CacheNaming;
use App\Utils\Token;
use App\Utils\CustomCache;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function sendToken(Request $request)
    {

        $rules = [
            'email' => 'required|email', 
        ];

        $messages = [
            'email.required' => 'O campo de email é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de email válido.',
        ];

        $request->validate($rules, $messages);


        Token::sendToken($request->email);

        return response()->json('Token gerado', 200);
    }


    public function login(Request $request)
    {

        $rules = [
             'email' => 'required|email', 
             'token' => 'required|string'
         ];
                
        $messages = [
             'email.required' => 'O campo de email é obrigatório.',
             'email.email' => 'Por favor, insira um endereço de email válido.',
             'token.required' => 'Por favor informe o token de acesso'
         ];
                
        $request->validate($rules, $messages);

        try {
        $tokenValidetad = Token::validateToken($request->email, $request->token);
        } catch(TokenException $e) {
            return response()->json(['msgError' => $e->getMensagem()], 401);
        }

        info('validate token: ', [$tokenValidetad]);

        if($tokenValidetad->verified) {
            // Obtenha ou crie um usuário com base nos critérios de autenticação
            $user = User::firstOrCreate([
                'email' => $request->email
            ]);

            // Crie um token de autenticação para o usuário
            $token = $user->createToken('api-token')->plainTextToken;

            // Retorne o token como resposta
            return response()->json(['token' => $token]);
        }

        return response()->json(["error" => "Token incorreto"], 401);
    }

    public function teste(Request $request)
    {
        $user = Auth::User();
        return response()->json($user, 200);
    }
}
