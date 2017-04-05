<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the AdminUserRole repository facade class
 */
class AdminUserRoleRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AdminUserRoleRepository';
    }
}
