<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'portofolio_id', 'client_id', 'image', 'name', 'jobtitle', 'content',
        'helper', 'created_at', 'updated_at'
    ];

    /**
     * @param bool $query
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function getPortofolio($query = true)
    {
        $data = $this->belongsTo(Portofolio::class, 'portofolio_id');

        return $query ? $data : $data->first();
    }
}
