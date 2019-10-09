<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $user_id user id
 * @property varchar $title title
 * @property varchar $slug slug
 * @property text $image image
 * @property text $content content
 * @property text $tags tags
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 * @property User $user belongsTo
 */
class News extends Model
{

    /**
     * Database table name
     */
    protected $table = 'news';

    /**
     * Mass assignable columns
     */
    protected $fillable = ['user_id',
        'title',
        'slug',
        'image',
        'content',
        'tags'];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
