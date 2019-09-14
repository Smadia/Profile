<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'user_id', 'ip', 'activity', 'created_at', 'updated_at'
    ];

    /**
     * cek apakah memiliki user
     *
     * @param bool $query
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function getUser($query = true)
    {
        $data = $this->belongsTo(User::class, 'user_id');

        return $query ? $data : $data->first();
    }
}
