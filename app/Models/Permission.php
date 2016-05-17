<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use HackerspaceCRM\Menus\Menu;

class Permission extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'permissions';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'lable'];

    /**
     * Relation between a Permission and the Role.
     *
     * @return Roles
     */
    public function roles()
    {
    	return $this->belongsToMany(Role::class);
    }

    /**
     * Relation between a Permission and Menus.
     *
     * @return Menus
     */
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

}
