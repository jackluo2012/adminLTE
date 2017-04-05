<?php
namespace Ilongx\Repositories;

use App\Models\AdminUserRole;

class AdminUserRoleRepository extends CommonRepository
{
    public function __construct(AdminUserRole $adminUserRole)
    {
        $this->model = $adminUserRole;
    }

    /**
     * 新增用户对应角色
     *
     * @param array $data
     * @param $id
     * @return bool
     */
    public function createAdminUserRole(array $data, $id)
    {
        if(empty($id)) {
            return false;
        }
        foreach ($data as $role_id) {
            $attribute['role_id'] = $role_id;
            $attribute['admin_user_id'] = $id;
            $this->create($attribute);
        }
        return true;
    }

    /**
     * 删除用户对应角色
     *
     * @param $id
     * @return mixed
     */
    public function deleteForAdminUserId($id)
    {
        return $this->where('admin_user_id', '=', $id)->delete();
    }

}