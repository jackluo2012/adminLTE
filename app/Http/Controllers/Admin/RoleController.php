<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\RoleStoreForm;
use App\Http\Requests\Admin\RoleUpdateForm;
use Illuminate\Http\Request;
use Ilongx\Repositories\MenuRepository;
use Ilongx\Repositories\PermissionRoleRepository;
use Ilongx\Repositories\RoleRepository;

class RoleController extends Controller
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * 列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->roleRepository->paginate(20);
        return view('admin.role.index', compact('list'));
    }

    /**
     * 新增页面
     *
     * @param PermissionRepository $permissionRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(MenuRepository $menuRepository )
    {
        //$permission_list = $permissionRepository->getAll(['permission_id', 'permission_name']);
        //获取 节点列表
        $menu_list = $menuRepository->getAll(['menu_id', 'menu_name']);

        return view('admin.role.create', compact('menu_list'));
    }

    /**
     * 修改页面
     *
     * @param $id
     * @param PermissionRepository $permissionRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, MenuRepository $menuRepository)
    {
        $role = $this->roleRepository->findOrFail($id);
        $menu_list = $menuRepository->getAll(['menu_id', 'menu_name']);
        $select_permissions = $role->hasManyPermissionRole->toArray();
        $select_permission_ids = [];
        if($select_permissions) {
            $select_permission_ids = array_column($select_permissions, 'permission_id');
        }
        
        return view('admin.role.edit', compact('role', 'menu_list', 'select_permission_ids'));
    }

    /**
     * 新增操作
     *
     * @param RoleStoreForm $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleStoreForm $request)
    {
        $data = $request->only(['role_name', 'desc', 'permissions']);
        $data = array_filter($data, 'delEmpty');
        $this->roleRepository->createRole($data);
        return redirect()->route('admin.role.index')->with('success', '角色添加成功');
    }

    /**
     * 更新操作
     *
     * @param RoleUpdateForm $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleUpdateForm $request)
    {
        $data = $request->only(['role_name', 'desc', 'permissions']);
        $this->roleRepository->updateRole($data, $request->role_id, 'role_id');
        return redirect()->route('admin.role.index')->with('success', '角色修改成功');
    }

    /**
     * 删除操作
     *
     * @param Request $request
     * @param PermissionRoleRepository $permissionRoleRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, PermissionRoleRepository $permissionRoleRepository)
    {
        $role = $this->roleRepository->findOrFail($request->id);
        $role->delete();
        $permissionRoleRepository->deleteForRoleId($request->id);
        return responseJson(2, '删除成功', ['id' => $request->id]);
    }
}