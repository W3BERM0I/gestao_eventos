<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\CustomCache;
use App\Utils\Token;
use App\Enums\CacheKeys;
use App\Enums\CacheNaming;
use App\Enums\NivelAcesso;
use App\Models\User;



class SignUpController extends Controller
{

    // Essa constante é usada para definir o tempo que o dado vai ficar salvo no cache
    const USER_DATA_CACHE_TTL = 30 * 60;

    public function createUser(Request $request)
    {
        $rules = [
            'email' => 'required|email', 
        ];

        $messages = [
            'email.required' => 'O campo de email é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de email válido.',
        ];

        $request->validate($rules, $messages);

        
        if(User::firstWhere('email', $request->email))
            return response('email ja foi cadastrado', 409);

        $user = new User();
        $user->email = $request->email;
        $user->save();

        return response('email cadastrado', 201);
    }

    public function verified_email(Request $request)
    {
        $rules = [
            'email' => 'required|email', 
            //'name' => 'required|string'
        ];

        $messages = [
            'email.required' => 'O campo de email é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de email válido.',
            //'name.required' => 'O campo nome é obrigatório.',
            //'name.string' => 'O campo nome deve ser uma string.',
        ];

        $request->validate($rules, $messages);

        info("teste", [$request]);

        #verifica se o email já esta cadastrado no banco
        if(User::firstWhere('email', $request->email))
            return response('email ja foi cadastrado', 409);

        $usuario = [];

        if(CustomCache::has(CacheKeys::FLOW_TITLE->append($request->email))) {
            $usuario = (object) CustomCache::get(CacheKeys::FLOW_TITLE->append($request->email));
        } else {

            //colocando usuario no cache
            CustomCache::put(CacheKeys::FLOW_TITLE->append($request->email), [
                CacheNaming::NAME->value => $request->name, 
                CacheNaming::EMAIL->value => $request->email,
                //CacheNaming::TOKEN->value = $token; 
                CacheNaming::VERIFIED->value => false 
            ], self::USER_DATA_CACHE_TTL);
        }

        Token::sendToken($request->email);        

        return response('Token was sent successfully', 200);
    }

    public function validateToken(Request $request)
    {
        $rules = [
            'email' => 'required|email', 
            'token' => 'required|string',
        ];

        $messages = [
            'email.required' => 'O campo de email é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de email válido.',
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
        ];

        $request->validate($rules, $messages);
        
        
        try {
            Token::validateToken();        
        } catch(Exception $e) {
            info('exception: ', [$e]);
            return response('not valited', 403);
        }

        $userCache = (object) CustomCache::get(CacheKeys::FLOW_TITLE->append($request->email));

        if(!User::firstWhere('email', $request->email)) {
            $user = new User();
            $user->email = $userCache->email;
            $user->nome = $userCache->name;
            $user->nivel_acesso = NivelAcesso::COMUN->value;
            $user->save();
        } else {
            return response('email ja foi cadastrado', 409);
        }

        return response('usuario criado', 201);
    }
}
