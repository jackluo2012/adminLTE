<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreAdminUserForm;
use App\Http\Requests\Admin\UpdateAdminUserForm;
use Illuminate\Http\Request;
use Ilongx\Repositories\AdminUserRepository;
use Ilongx\Repositories\AdminUserRoleRepository;
use Ilongx\Repositories\RoleRepository;

class AdminUserController extends Controller
{
    private $adminUserRepository;

    public function __construct(AdminUserRepository $adminUserRepository)
    {
        $this->adminUserRepository = $adminUserRepository;
    }

    /**
     * 列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->adminUserRepository->paginate(20);
        return view('admin.admin_user.index', compact('list'));
    }

    /**
     * 新增页面
     *
     * @param RoleRepository $roleRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(RoleRepository $roleRepository)
    {
        $role_list = $roleRepository->getAll(['role_id', 'role_name']);
        return view('admin.admin_user.create', compact('role_list'));
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
        $admin_user = $this->adminUserRepository->findOrFail($id);
        $role_list = $roleRepository->getAll(['role_id', 'role_name']);
        $select_roles = $admin_user->hasManyAdminUserRole->toArray();
        $select_role_ids = [];
        if($select_roles) {
            $select_role_ids = array_column($select_roles, 'role_id');
        }
        return view('admin.admin_user.edit', compact('admin_user', 'role_list', 'select_role_ids'));
    }

    /**
     * 新增操作
     *
     * @param StoreAdminUserForm $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAdminUserForm $request)
    {
        $data = $request->only(['username', 'password', 'roles']);
        if(!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $data = array_filter($data, 'delEmpty');
        $this->adminUserRepository->createAdminUser($data);
        return redirect()->route('admin.adminUser.index')->with('success', '管理员添加成功');
    }

    /**
     * 修改操作
     *
     * @param UpdateAdminUserForm $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAdminUserForm $request)
    {
        $data = $request->only(['username', 'password', 'roles']);
        if(!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $data = array_filter($data, 'delEmpty');
        $this->adminUserRepository->updateAdminUser($data, $request->id, 'id');
        return redirect()->route('admin.adminUser.index')->with('success', '管理员修改成功');
    }

    /**
     * 删除操作
     *
     * @param Request $request
     * @param AdminUserRoleRepository $adminUserRoleRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, AdminUserRoleRepository $adminUserRoleRepository)
    {
        $admin_user = $this->adminUserRepository->findOrFail($request->id);
        if($admin_user->is_super_admin) {
            return responseJson(0, '超级管理员不可删除');
        }
        $admin_user->delete();
        $adminUserRoleRepository->deleteForAdminUserId($request->id);
        return responseJson(2, '删除成功', ['id' => $request->id]);
    }
}