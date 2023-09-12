<?php

namespace App\Utils;

use App\Exceptions\TokenException;

use App\Enums\CacheKeys;
use App\Enums\CacheNaming;
use App\Utils\CustomCache;


class Token {

    const MAX_RESENDS = 3;
    const MAX_ATTEMPTS = 3;

    const TOKEN_CACHE_TTL = 15 * 60; // 15 minutes

    const TOKEN_CACHE_TTL_LONG = 60 * 60; // 1 horas


    private static function generateToken(): string
    {
        return str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    }

    public static function sendToken(String $email): void
    {
        // verificar se ja tem um fluxo em andamento e se tiver excluirá
        if(CustomCache::has(CacheKeys::FLOW_TOKEN->append($email)))
            CustomCache::delete(CacheKeys::FLOW_TOKEN->append($email));

        // verificar se o email esta bloqueado
        if(self::isTokenBlocked($email))
            throw new TokenException("Por favor, Tente novamente mais tarde");

        // gera o token
        $token = self::generateToken();

        // salvando o token no cache
        CustomCache::put(CacheKeys::FLOW_TOKEN->append($email), [
            CacheNaming::TOKEN->value => $token,
            CacheNaming::ATTEMPTS->value => 0,
            CacheNaming::RESENDS->value => 0,
            CacheNaming::VERIFIED->value => False
        ], self::TOKEN_CACHE_TTL);

        //send email
        info('token: ' . $token);
    }  

    
    public static function validateToken(String $email, int $token)
    {
        $user = [];

        if(CustomCache::has(CacheKeys::FLOW_TOKEN->append($email)))
            $tokenUser = (Object) CustomCache::get(CacheKeys::FLOW_TOKEN->append($email));
        else
            throw new TokenException("Token Expirado");
        
        if($tokenUser->verificado) return $tokenUser;

        if($token != $tokenUser->token) {
            $tokenUser->attempts++;

            if($tokenUser->attempts > self::MAX_ATTEMPTS) {
                CustomCache::delete(CacheKeys::FLOW_TOKEN->append($email));

                CustomCache::put(CacheKeys::FLOW_BLOCK->append($email), true, self::TOKEN_CACHE_TTL_LONG);

                throw new TokenException("Tentativas excedidas");
            }

            CustomCache::update(CacheKeys::FLOW_TOKEN->append($email), $tokenUser);

            throw new TokenException("Token incorreto");
        }

        if(CustomCache::has(CacheKeys::FLOW_TOKEN->append($email)))
            $user = (Object) CustomCache::get(CacheKeys::FLOW_TOKEN->append($email));
        else
            throw new TokenException("Usuario não encontrado");

        $user->verified = true;

        CustomCache::update(CacheKeys::FLOW_TOKEN->append($email), $user);

        return $user;
    }

    /**
     * Checks if user is blocked from sending new tokens, 
     */
    private static function isTokenBlocked(string $email): Bool
    {
        $tokenBlocked = CustomCache::has(CacheKeys::FLOW_BLOCK->append($email));
        return $tokenBlocked ? true : false;
    }
}