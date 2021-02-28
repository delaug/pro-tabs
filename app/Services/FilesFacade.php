<?php

namespace App\Services;

use Illuminate\Support\Facades\Facade;

class FilesFacade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'filesService';
    }
}
