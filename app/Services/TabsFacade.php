<?php

namespace App\Services;

use Illuminate\Support\Facades\Facade;

class TabsFacade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'tabsService';
    }
}
