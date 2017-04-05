<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    protected $primaryKey = 'menu_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_name', 'parent_id', 'icon', 'uri', 'status'
    ];

    public function hasManyMenuRole()
    {
        return $this->hasMany('App\Models\MenuRole', 'menu_id');
    }
}
