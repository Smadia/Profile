<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'created_at', 'updated_at'
    ];

    /**
     * mendapatkan pengguna
     * 
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getUsers($query = true)
    {
        $data = $this->belongsToMany(
            User::class,
            'users_roles',
            'role_id',
            'user_id'
        )->withTimestamps();
        
        return $query ? $data : $data->get();
    }

    /**
     * cek apakah meimiliki user
     * 
     * @return bool
     */
    public function hasUsers()
    {
        return $this->getUsers()
            ->count() > 0;
    }

    /**
     * mendapatkan menu
     *
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getMenus($query = true)
    {
        $data = $this->belongsToMany(
            Menu::class,
            'roles_menu',
            'role_id',
            'menu_id'
        )->withTimestamps();

        return $query ? $data : $data->get();
    }

    /**
     * cek apakah memiliki menu
     *
     * @param bool $query
     * @return bool
     */
    public function hasMenus($query = true)
    {
        return $this->getMenus()
            ->count() > 0;
    }
}
