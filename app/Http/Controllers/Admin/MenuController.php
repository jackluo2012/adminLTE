<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\MenuStoreForm;
use App\Http\Requests\Admin\MenuUpdateForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ilongx\Repositories\MenuRepository;
use Ilongx\Repositories\RoleRepository;

class MenuController extends Controller
{
    private $menuRepository;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    /**
     * 菜单列表
     *
     * @param RoleRepository $roleRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(RoleRepository $roleRepository)
    {
        $list = $this->menuRepository->menuForTree();
        $role_list = $roleRepository->getAll(['role_id', 'role_name']);
        return view('admin.menu.index', compact('list', 'role_list'));
    }

    /**
     * 新增页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * 修改页面
     *
     * @param $id
     * @param RoleRepository $roleRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, RoleRepository $roleRepository)
    {
        $list = $this->menuRepository->menuForTree();
        $menu = $this->menuRepository->findOrFail($id);
        $role_list = $roleRepository->getAll(['role_id', 'role_name']);
        $select_roles = $menu->hasManyMenuRole->toArray();
        $select_role_ids = [];
        if($select_roles) {
            $select_role_ids = array_column($select_roles, 'role_id');
        }
        return view('admin.menu.edit', compact('list', 'menu', 'role_list', 'select_role_ids'));
    }

    /**
     * 新增操作
     *
     * @param MenuStoreForm $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MenuStoreForm $request)
    {
        $data = $request->only(['parent_id', 'menu_name', 'icon', 'uri', 'roles','show']);
        $data = array_filter($data, 'delEmpty');
        $this->menuRepository->createMenu($data);
        return redirect()->route('admin.menu.index')->with('success', '菜单添加成功');
    }

    /**
     * 更新操作
     *
     * @param MenuUpdateForm $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MenuUpdateForm $request)
    {
        $data = $request->only(['parent_id', 'menu_name', 'icon', 'uri', 'roles','show']);
        $this->menuRepository->updateMenu($data, $request->menu_id, 'menu_id');
        return redirect()->route('admin.menu.index')->with('success', '菜单修改成功');
    }

    /**
     * 删除操作
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $menu = $this->menuRepository->findOrFail($request->id);
        if($this->menuRepository->checkMenuHasChild($request->id)) {
            return responseJson(0, '删除失败,该菜单下还存在子菜单', ['id' => $request->id]);
        }
        $menu->delete();
        return responseJson(2, '删除成功', ['id' => $request->id]);
    }

    /**
     * 更新菜单排序
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxUpdateSortParent(Request $request)
    {
        $this->menuRepository->updateSortParent($request->list);
        return responseJson(2, '保存成功');
    }
}
