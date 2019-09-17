<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * mendapatkan log
     *
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getLogs($query = true)
    {
        $data = $this->hasMany(Log::class, 'user_id');

        return $query ? $data : $data->get();
    }

    /**
     * cek apakah punya log
     *
     * @param bool $query
     * @return bool
     */
    public function hasLogs($query = true)
    {
        return $this->getLogs()
            ->count() > 0;
    }

    /**
     * mendapatkan postingan
     *
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getPosts($query = true)
    {
        $data = $this->hasMany(Post::class, 'user_id');

        return $query ? $data : $data->get();
    }

    /**
     * cek apakah memiliki post
     *
     * @return bool
     */
    public function hasPosts()
    {
        return $this->getPosts()
            ->count() > 0;
    }

    /**
     * mendapatkan hak akses
     *
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getRoles($query = true)
    {
        $data = $this->belongsToMany(
            Role::class,
            'users_roles',
            'user_id',
            'role_id'
        )->withTimestamps();

        return $query ? $data : $data->get();
    }

    /**
     * cek apakah user mempunyai role
     *
     * @param Role|null $role
     * @return bool
     */
    public function hasRole(Role $role = null)
    {
        if (!empty($role)){
            return $this->getRoles()
                ->where('id', $role->id)
                ->count() > 0;
        }

        return $this->getRoles()
            ->count() > 0;
    }

    /**
     * cek apakah user memiliki banyak role
     *
     * @param Collection $roles
     * @return bool
     */
    public function hasRoles(Collection $roles)
    {
        foreach ($roles as $role){
            if (!$this->hasRole($role)){
                return false;
            }
        }

        return true;
    }

    /**
     * mengambil menu
     *
     * @param bool $query
     * @return Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getMenus($query = true)
    {
        $data = $this->belongsToMany(
            Menu::class,
            'users_menus',
            'user_id',
            'menu_id'
        )->withTimestamps();

        return $query ? $data : $data->get();
    }

    /**
     * cek apakah user memiliki menu tertentu
     *
     * @param Menu $menu
     * @return bool
     */
    public function hasMenu(Menu $menu)
    {
        $has = $this->getRoles()
            ->whereHas('getMenus', function ($query) use ($menu) {
                return $query->where('id', $menu->id);
            })->count() > 0;

        if ($has){
            $has = $this->getMenus()
                ->where('id', $menu->id)
                ->count() > 0;
        }

        return $has;
    }
}
