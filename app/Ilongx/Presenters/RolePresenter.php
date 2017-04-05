<?php
namespace Ilongx\Presenters;

class RolePresenter
{

    public function showTreeSelect($data, $select_role_ids = array())
    {
        $html = '';
        foreach ($data as $role) {
            if(in_array($role->role_id, $select_role_ids)) {
                $html .= '<option value="'. $role->role_id .'" selected>'. $role->role_name .'</option>';
            } else {
                $html .= '<option value="'. $role->role_id .'">'. $role->role_name .'</option>';
            }
        }
        return $html;
    }
}