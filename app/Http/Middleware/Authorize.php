<?php

namespace App\Http\Middleware;

use App\Facades\MenuRepository;
use App\Facades\PermissionRoleRepository;
use Closure;
use Illuminate\Support\Facades\Route;

class Authorize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //检查用户是否是超级管理员
        if(auth()->user()->is_super_admin) {
            return $next($request);
        }
        //获取当前的访问路径  admin.index
        $route_name = Route::currentRouteName();
        //获取菜单的ID
        $permission_id = MenuRepository::getIdForRoute($route_name);
        //获取当前用户的所有角色 一个用户可能有几个角色
        $admin_user_roles = auth()->user()->hasManyAdminUserRole->toArray();
        //拿到所有的 角色 -> ID
        $role_ids = array_column($admin_user_roles, 'role_id');

        if(!empty($role_ids)) {
            // 获取所有角色对应的 -> 权限
            $permission_ids = PermissionRoleRepository::getPermissionRole($role_ids);
            //检查当前路由的权限 -> 是否在自己的权限里面
            if(in_array($permission_id, $permission_ids)) {
                return $next($request);
            }
        }
        if(!$request->ajax()) {
            return abort(503);
        } else {
            return responseJson('0', '没有权限执行此操作');
        }
    }
}
