<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'image', 'name', 'desc', 'created_at', 'updated_at', 'demo'
    ];

    /**
     * mengambil data service
     *
     * @param bool $query
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function getServices($query = true)
    {
        $data = $this->belongsToMany(
            Service::class,
            'products_services',
            'product_id',
            'service_id'
        )->withTimestamps();

        return $query ? $data : $data->get();
    }

    /**
     * cek apakah memiliki service
     *
     * @return bool
     */
    public function hasServices(Service $service = null)
    {
        if (!empty($service)){
            return $this->getServices()
                ->where('id', $service->id)
                ->count() > 0;
        }

        return $this->getServices()
                ->count() > 0;
    }

    /**
     * @param bool $query
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getUsers($query = true)
    {
        $data = $this->belongsToMany(
            User::class,
            'users_products',
            'product_id',
            'user_id'
        )->withTimestamps();

        return $query ? $data : $data->get();
    }
}
