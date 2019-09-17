<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'image', 'name', 'desc', 'created_at', 'updated_at'
    ];

    /**
     * mendapatkan portofolio dari suatu service
     * 
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getPortofolios($query = true)
    {
        $data = $this->belongsToMany(
            Portofolio::class,
            'portofolios_services',
            'service_id',
            'portofolio_id'
        )->withTimestamps();
        
        return $query ? $data : $data->get();
    }

    /**
     * mendapatkan product dari suatu service
     *
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getProducts($query = true)
    {
        $data = $this->belongsToMany(
            Product::class,
            'products_services',
            'service_id',
            'product_id'
        )->withTimestamps();

        return $query ? $data : $data->get();
    }
}
