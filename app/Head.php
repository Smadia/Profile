<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Head extends Model
{
    protected $fillable = [
        'image', 'name', 'desc', 'metas', 'subheading', 'posting', 'created_at', 'updated_at'
    ];

    /**
     * mendapatkan subheads
     *
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getSubheads($query = true)
    {
        $data = $this->belongsToMany(
            Head::class,
            'subheads',
            'parent_id',
            'child_id'
        )->withTimestamps();

        return $query ? $data : $data->get();
    }

    /**
     * cek apakah mempunyai subheads
     *
     * @return bool
     */
    public function hasSubheads()
    {
        return $this->getSubheads()
            ->count() > 0;
    }

    /**
     * mendapatkan menu dari suatu head
     *
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getMenus($query = true)
    {
        $data = $this->belongsToMany(
            Menu::class,
            'menus_heads',
            'head_id',
            'menu_id'
        )->withTimestamps();

        return $query ? $data : $data->get();
    }

    /**
     * cek apakah head memiliki menu
     *
     * @return bool
     */
    public function hasMenus()
    {
        return $this->getMenus()
            ->count() > 0;
    }

    /**
     * mendapatkan post tertentu dari head tertentu
     *
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getPosts($query = true)
    {
        $data = $this->hasMany(Post::class, 'head_id');

        return $query ? $data : $data->get();
    }

    /**
     * cek apakah head memiliki posts
     *
     * @return bool
     */
    public function hasPosts()
    {
        return $this->getPosts()
        ->count() > 0;
    }
}
