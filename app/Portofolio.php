<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $fillable = [
        'client_id', 'image', 'name', 'desc', 'created_at', 'updated_at', 'demo'
    ];

    /**
     * mendapatkan data partner
     *
     * @param bool $query
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function getClient($query = true)
    {
        $data = $this->belongsTo(Client::class, 'client_id');

        return $query ? $data : $data->first();
    }

    /**
     * cek apakah memiliki partner
     *
     * @return bool
     */
    public function hasClient()
    {
        return $this->getClient()
            ->count() > 0;
    }

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
            'portofolios_services',
            'portofolio_id',
            'service_id'
        )->withTimestamps();

        return $query ? $data : $data->get();
    }

    /**
     * cek apakah memiliki service
     *
     * @param Service $service
     * @return bool
     */
    public function hasService(Service $service)
    {
        return $this->getServices()
            ->where('id', $service->id)
            ->count() > 0;
    }
}
