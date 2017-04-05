<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuRole extends Model
{
    protected $table = 'menu_role';

    protected $primaryKey = 'menu_role_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'menu_id'
    ];

    public function belongsToMenu()
    {
        return $this->belongsTo('App\Models\Menu', 'menu_id');
    }

}
