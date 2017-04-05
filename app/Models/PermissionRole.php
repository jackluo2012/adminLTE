<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = 'permission_role';

    protected $primaryKey = 'permission_role_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'permission_id'
    ];

    public function belongsToRole()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

}
