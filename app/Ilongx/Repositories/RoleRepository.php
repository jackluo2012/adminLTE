<?php
namespace Ilongx\Repositories;

use App\Facades\PermissionRoleRepository;
use App\Models\Role;

class RoleRepository extends CommonRepository
{
    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function getAll($columns = ['*'])
    {
        return $this->all($columns);
    }

    /**
     * 新增角色
     *
     * @param array $data
     */
    public function createRole(array $data)
    {
        $attributes = array_except($data, ['permissions']);
        $new_role = $this->create($attributes);
        if(!empty($data['permissions'])) {
            PermissionRoleRepository::createPermissionRole($data['permissions'], $new_role->role_id);
        }
    }

    /**
     * 修改角色
     *
     * @param array $data
     * @param $role_id
     * @param string $text
     */
    public function updateRole(array $data, $role_id, $text = "role_id")
    {
        $attributes = array_except($data, ['permissions']);
        $this->update($attributes, $role_id, $text);
        PermissionRoleRepository::deleteForRoleId($role_id);
        if(!empty($data['permissions'])) {
            PermissionRoleRepository::createPermissionRole($data['permissions'], $role_id);
        }
    }



}