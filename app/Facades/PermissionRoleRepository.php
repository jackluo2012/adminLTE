<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the PermissionRole repository facade class
 */
class PermissionRoleRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PermissionRoleRepository';
    }
}
