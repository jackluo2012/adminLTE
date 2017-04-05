<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminUserForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|unique:admin_users',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required'     => '用户名不能为空',
            'username.unique'       => '用户名已存在',
            'password.required'     => '密码不能为空'

        ];
    }
}
