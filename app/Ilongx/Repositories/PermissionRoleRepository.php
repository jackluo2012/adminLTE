<?php
namespace Ilongx\Repositories;

use App\Models\PermissionRole;

class PermissionRoleRepository extends CommonRepository
{
    public function __construct(PermissionRole $permissionRole)
    {
        $this->model = $permissionRole;
    }

    /**
     * 新增角色对应权限
     *
     * @param array $data
     * @param $role_id
     * @return bool
     */
    public function createPermissionRole(array $data, $role_id)
    {
        if(empty($role_id)) {
            return false;
        }
        foreach ($data as $permission_id) {
            $attribute['permission_id'] = $permission_id;
            $attribute['role_id'] = $role_id;
            $this->create($attribute);
        }
        return true;
    }

    /**
     * 删除角色对应权限
     *
     * @param $role_id
     * @return mixed
     */
    public function deleteForRoleId($role_id)
    {
        return $this->where('role_id', '=', $role_id)->delete();
    }

    public function getPermissionRole($role_ids = array())
    {
        $permission_roles = $this->whereIn('role_id', $role_ids)->get()->toArray();
        $permission_ids = array_column($permission_roles, 'permission_id');
        return $permission_ids;
    }

}