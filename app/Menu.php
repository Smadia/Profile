<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    const ADMIN = 'admin';

    const GUEST = 'guest';

    protected $fillable = [
        'name', 'route', 'desc', 'created_at', 'updated_at'
    ];

    /**
     * mendapatkan user yang bisa mengakses menu ini
     *
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getUsers($query = true)
    {
        $data = $this->belongsToMany(
            User::class,
            'users_menus',
            'menu_id',
            'user_id'
        )->withTimestamps();

        return $query ? $data : $data->get();
    }

    /**
     * cek apakah memiliki user
     *
     * @return bool
     */
    public function hasUsers()
    {
        return $this->getUsers()
            ->count() > 0;
    }

    /**
     * mendapatkan data roles
     *
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getRoles($query = true)
    {
        $data = $this->belongsToMany(
            Role::class,
            'roles_menu',
            'menu_id',
            'role_id'
        )->withTimestamps();

        return $query ? $data : $data->get();
    }

    /**
     * cek apakah memiliki role
     *
     * @return int
     */
    public function hasRoles()
    {
        return $this->getRoles()
            ->count();
    }

    /**
     * mendapatkan head
     *
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getHeads($query = true)
    {
        $data = $this->belongsToMany(
            Head::class,
            'menus_heads',
            'menu_id',
            'head_id'
        )->withTimestamps();

        return $query ? $data : $data->get();
    }

    /**
     * cek apakah memiliki head
     *
     * @return bool
     */
    public function hasHeads()
    {
        return $this->getHeads()
            ->count() > 0;
    }

    /**
     * mendapatkan menu admin
     *
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function admin($query = true)
    {
        $data = Menu::query()
            ->where('for', self::ADMIN);

        return $query ? $data : $data->get();
    }

    /**
     * mendapatkan menu guest
     *
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function guest($query = true)
    {
        $data = Menu::query()
            ->where('for', self::GUEST);

        return $query ? $data : $data->get();
    }
}
