<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password',
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
}
