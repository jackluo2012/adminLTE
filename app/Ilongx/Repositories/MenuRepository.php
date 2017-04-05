<?php
namespace Ilongx\Repositories;

use App\Facades\MenuRoleRepository;
use App\Models\Menu;

class MenuRepository extends CommonRepository
{
    public function __construct(Menu $menu)
    {
        $this->model = $menu;
    }

    /**
     * 获取菜单树形结构
     * @param int $parent_id
     * @return mixed
     */
    public function menuForTree($parent_id = 0)
    {
        $menus = $this->where('parent_id', '=', $parent_id)->orderBy('sort_order', 'ASC')->get();
        if($menus->first()) {
            foreach ($menus as $k => $menu) {
                $child = $this->menuForTree($menu->menu_id);
                if($child->first()) {
                    $menus[$k]['child'] = $this->menuForTree($menu->menu_id);
                }
            }
        }
        return $menus;
    }

    /**
     * 更新菜单排序
     *
     * @param array $menus
     * @param int $parent_id
     */
    public function updateSortParent($menus = array(), $parent_id = 0)
    {
        $sort = 1;
        if(!empty($menus)) {
            foreach ($menus as $menu) {
                $attribute['sort_order'] = $sort;
                $attribute['parent_id'] = $parent_id;
                $this->update($attribute, $menu['id'], 'menu_id');
                if(!empty($menu['children'])) {
                    $this->updateSortParent($menu['children'], $menu['id']);
                }
                $sort++;
            }
        }
    }

    /**
     * 检查是否存在子集
     *
     * @param $menu_id
     * @return mixed
     */
    public function checkMenuHasChild($menu_id)
    {
        return $this->findBy('parent_id', $menu_id);
    }

    /**
     * create menu
     * @param array $data
     */
    public function createMenu(array $data)
    {
        $attributes = array_except($data, 'roles');
        $new_menus = $this->create($attributes);
        if(!empty($data['roles'])) {
            MenuRoleRepository::createMenuRole($data['roles'], $new_menus->menu_id);
        }
    }

    /**
     * update menu
     *
     * @param array $data
     * @param $id
     * @param string $text
     */
    public function updateMenu(array $data, $id, $text = 'menu_id')
    {
        $attributes = array_except($data, 'roles');
        $this->update($attributes, $id, $text);
        MenuRoleRepository::deleteForMenuId($id);
        if(!empty($data['roles'])) {
            MenuRoleRepository::createMenuRole($data['roles'], $id);
        }
    }
    /**
     *  获取菜单列表
     * @param array $columns
     * @return mixed
     */
    public function getAll($columns = ['*'])
    {
        return $this->all($columns);
    }

    /**
     * 根据路由 获取 ID
     * @param $route
     * @return string
     */
    public function getIdForRoute($route)
    {
        $menu = $this->findBy('uri', $route);
        $menu_id = !empty($menu) ? $menu->menu_id : '0';
        return $menu_id;
    }
}