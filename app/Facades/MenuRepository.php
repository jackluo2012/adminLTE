<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the Menu repository facade class
 */
class MenuRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'MenuRepository';
    }
}
