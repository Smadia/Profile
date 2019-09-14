<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'head_id', 'image', 'title', 'content', 'metas', 'tags', 'commenting', 'claps', 'likes', 'dislikes',
        'views', 'created_at', 'updated_at'
    ];

    /**
     * mendapatkan pemilik
     *
     * @param bool $query
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function getUser($query = true)
    {
        $data = $this->belongsTo(User::class, 'user_id');

        return $query ? $data : $data->first();
    }

    /**
     * mendapatkan head
     *
     * @param bool $query
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function getHead($query = true)
    {
        $data = $this->belongsTo(Head::class, 'head_id');

        return $query ? $data : $data->first();
    }

    /**
     * mendapatkan komentar
     *
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getComments($query = true)
    {
        $data = $this->hasMany(Comment::class, 'post_id');

        return $query ? $data : $data->get();
    }

    /**
     * cek apakah memiliki komentar
     *
     * @return bool
     */
    public function hasComments()
    {
        return $this->getComments()
        ->count() > 0;
    }
}
