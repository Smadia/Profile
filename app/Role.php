<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property varchar $name name
 * @property varchar $display_name display name
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 * @property \Illuminate\Database\Eloquent\Collection $permission belongsToMany
 * @property \Illuminate\Database\Eloquent\Collection $user hasMany
 * @property \Illuminate\Database\Eloquent\Collection $userAddition belongsToMany
 */
class Role extends Model
{

    /**
     * Database table name
     */
    protected $table = 'roles';

    /**
     * Mass assignable columns
     */
    protected $fillable = ['name',
        'display_name'];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * permissions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }

    /**
     * users
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }

    /**
     * users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userAdditions()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }


}
