<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id', 'user_id', 'name', 'email', 'content', 'created_at', 'updated_at'
    ];

    /**
     * mendapatkan post dari suatu komentar
     *
     * @param bool $query
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function getPost($query = true)
    {
        $data = $this->belongsTo(Post::class, 'post_id');

        return $query ? $data : $data->first();
    }
}
