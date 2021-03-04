<?php

namespace App\Services;

use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed parse(string $json)
 * @method static string serialize(Array $data)
 * @method static string[] getAbilities(String $lvl)
 *
 * @see App\Services
 */
class TokenFacade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'tokenService';
    }
}
