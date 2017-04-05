<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * 后台登陆
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('admin.login.index');
    }

    /**
     * 登陆动作
     *
     * @param Request $request
     * @return mixed
     */
    public function doLogin(Request $request)
    {
        $this->validate($request,[
            'username' => 'required|max:255',
            'password' => 'required|max:255'
        ]);
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->has('remember'))){
            return redirect()->intended('admin/');
        }
        return redirect()->back()->withErrors(['login_fail'=>'用户名或密码错误']);
    }

    /**
     * 后台登出
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        if(Auth::check()) {
            Auth::logout();
        }
        return redirect()->route('admin.login');
    }
}