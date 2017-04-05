<?php
namespace Ilongx\Repositories;

use App\Models\MenuRole;

class MenuRoleRepository extends CommonRepository
{
    public function __construct(MenuRole $menuRole)
    {
        $this->model = $menuRole;
    }

    /**
     * 新增菜单权限
     * @param array $data
     * @param $menu_id
     * @return bool
     */
    public function createMenuRole(array $data, $menu_id)
    {
        if(empty($menu_id)) {
            return false;
        }
        foreach ($data as $role_id) {
            $attribute['menu_id'] = $menu_id;
            $attribute['role_id'] = $role_id;
            $this->create($attribute);
        }
        return true;
    }

    /**
     * 删除角色对应权限
     *
     * @param $menu_id
     * @return mixed
     */
    public function deleteForMenuId($menu_id)
    {
        return $this->where('menu_id', '=', $menu_id)->delete();
    }



}