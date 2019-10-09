<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property varchar $name name
 * @property varchar $email email
 * @property text $message message
 * @property varchar $ip ip
 * @property tinyint $read read
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 */
class Message extends Model
{

    /**
     * Database table name
     */
    protected $table = 'messages';

    /**
     * Mass assignable columns
     */
    protected $fillable = ['name',
        'email',
        'message',
        'info',
        'read'];

    /**
     * Date time columns.
     */
    protected $dates = [];


}
