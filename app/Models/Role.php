<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'role_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_name', 'desc'
    ];

    public function hasManyPermissionRole()
    {
        return $this->hasMany('App\Models\PermissionRole', 'role_id');
    }

}
