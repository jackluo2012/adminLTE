<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the MenuRole repository facade class
 */
class MenuRoleRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'MenuRoleRepository';
    }
}
