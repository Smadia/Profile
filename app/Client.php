<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'logo', 'name', 'desc', 'created_at', 'updated_at'
    ];

    /**
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getPortofolios($query = false)
    {
        $data = $this->hasMany(Portofolio::class, 'client_id');

        return $query ? $data : $data->get();
    }
}
