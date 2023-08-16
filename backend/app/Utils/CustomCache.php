<?php

namespace App\Utils;

use App\Exceptions\CacheNotFound;
use Illuminate\Support\Facades\Cache as FacadesCache;
use Illuminate\Support\Facades\Redis;

/**
 * This class is responsible to make cache operations
 */
class CustomCache
{
    /**
     * This method is used to know if the requested cache key exists
     * @param string $key The cache key
     * @return bool
     */
    public static function has(string $key): bool
    {
        return FacadesCache::has($key);
    }

    /**
     * This method is used to get a cache value
     * @param string $key The cache key
     * @param mixed $default By default is null, the value that you want to be 
     * returned by default if the cache doesn't exist
     * @return null|mixed
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return FacadesCache::get($key, $default);
    }

    /**
     * This method is used to put a value in cache
     * @param string $key The cache key
     * @param mixed $value The value to be stored
     * @param int $ttl Time in seconds that the cache will be valid
     * @return mixed The cache value
     */
    public static function put(string $key, mixed $value, int $ttl = 300): mixed
    {
        FacadesCache::put($key, $value, $ttl);
        return self::get($key);
    }

    /**
     * This method is used to put a value in cache
     * @param string $key The cache key
     * @param mixed $value The value to be stored
     * @param int $ttl Time in seconds that the cache will be valid, by default will use the remaining time of the cache that will be updated
     * @return mixed The cache value
     * @throws CacheNotFound If the cache key does not exist
     */
    public static function update(string $key, mixed $value, int $ttl = null): mixed
    {
        if (! self::has($key)) throw new CacheNotFound("The cache with the key '{$key}' does not exists and can not be updated.");

        $ttl = $ttl ? 
            $ttl : 
            Redis::connection('cache')->ttl(config('cache.prefix') . ':' . $key);

        return self::put($key, $value, $ttl);
    }

     /**
     * This method is used to delete a value in cache
     * @param string $key The cache key
     * @return void
     */
    public static function delete(string $key): void
    {
        FacadesCache::delete($key);
    }
}
