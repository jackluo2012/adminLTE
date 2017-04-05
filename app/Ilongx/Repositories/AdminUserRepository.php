<?php
namespace Ilongx\Repositories;

use App\Facades\AdminUserRoleRepository;
use App\Models\AdminUser;

class AdminUserRepository extends CommonRepository
{
    public function __construct(AdminUser $adminUser)
    {
        $this->model = $adminUser;
    }

    /**
     * 新增用户
     *
     * @param array $data
     */
    public function createAdminUser(array $data)
    {
        $attributes = array_except($data, ['roles']);
        $new_admin_user = $this->create($attributes);
        if(!empty($data['roles'])) {
            AdminUserRoleRepository::createAdminUserRole($data['roles'], $new_admin_user->id);
        }
    }

    /**
     * 修改用户
     *
     * @param array $data
     * @param $id
     * @param string $text
     */
    public function updateAdminUser(array $data, $id, $text = "id")
    {
        $attributes = array_except($data, ['roles']);
        $this->update($attributes, $id, $text);
        AdminUserRoleRepository::deleteForAdminUserId($id);
        if(!empty($data['roles'])) {
            AdminUserRoleRepository::createAdminUserRole($data['roles'], $id);
        }
    }

}