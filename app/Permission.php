<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property varchar $key key
 * @property varchar $table_name table name
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 * @property \Illuminate\Database\Eloquent\Collection $role belongsToMany
 */
class Permission extends Model
{

    /**
     * Database table name
     */
    protected $table = 'permissions';

    /**
     * Mass assignable columns
     */
    protected $fillable = ['key',
        'table_name'];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }


}
