<?php

namespace App\Utils;


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
            throw new Exception('acesso bloqueado');

        // gera o token
        $token = self::generateToken();

        // salvando o token no cache
        CustomCache::put(CacheKeys::FLOW_TOKEN->append($email), [
            CacheNaming::TOKEN->value => $token,
            CacheNaming::ATTEMPTS->value => 0,
            CacheNaming::RESENDS->value => 0,
        ], self::TOKEN_CACHE_TTL);


        //send email
        info('token: ' . $token);
    }  

    
    public static function validateToken(String $email, int $token): Boolean
    {
        $user = [];

        if(CustomCache::has(CacheKeys::FLOW_TOKEN->append($email))) {
            $tokenUser = (Object) CustomCache::get(CacheKeys::FLOW_TOKEN->append($email));
        } else {
            return throw new Exception('token do usuario não encontrado');
        }

        if($token != $tokenUser->token) {
            $tokenUser->attempts++;

            if($tokenUser->attempts > self::MAX_ATTEMPTS) {
                CustomCache::delete(CacheKeys::FLOW_TOKEN->append($email));

                CustomCache::put(CacheKeys::FLOW_BLOCK->append($email), true, self::TOKEN_CACHE_TTL_LONG);

                return throw new Exception('Tentativas excedidas');
            }

            CustomCache::update(CacheKeys::FLOW_TOKEN->append($email), $tokenUser);

            return throw new Exception('Token incorreto');
        }

        if(CustomCache::has(CacheKeys::FLOW_TITLE->append($email))) {
            $user = (Object) CustomCache::get(CacheKeys::FLOW_TITLE->append($email));
        } else {
            return throw new Exception('Usuario não encontrado');
        }

        $user->verified = true;

        CustomCache::update(CacheKeys::FLOW_TITLE->append($email), $user);
        CustomCache::delete(CacheKeys::FLOW_TOKEN->append($email));

        return true;
    }

        /**
     * Checks if user is blocked from sending new tokens, 
     */
    private static function isTokenBlocked(string $email): void
    {
        $tokenBlocked = CustomCache::has(CacheKeys::FLOW_BLOCK->append($email));
        return $tokenBlocked ? true : false;
    }



}