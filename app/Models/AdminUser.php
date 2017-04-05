<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class AdminUser extends Authenticatable
{
    protected $table = 'admin_users';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function hasManyAdminUserRole()
    {
        return $this->hasMany('App\Models\AdminUserRole', 'admin_user_id');
    }
    /**
     * 根据 Role 获取 权限集合
     */
    public function hasManyPermissionRole($rules)
    {
        return DB::table('permission_role')->select('permission_id')->whereIn('role_id',$rules)->get();
    }
}
