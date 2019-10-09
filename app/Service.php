<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property varchar $name name
 * @property text $image image
 * @property text $description description
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 * @property \Illuminate\Database\Eloquent\Collection $portofolioss belongsToMany
 * @property \Illuminate\Database\Eloquent\Collection $productss belongsToMany
 */
class Service extends Model
{

    /**
     * Database table name
     */
    protected $table = 'services';

    /**
     * Mass assignable columns
     */
    protected $fillable = ['name',
        'image',
        'description'];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * portofolios
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function portofolios()
    {
        return $this->belongsToMany(Portofolio::class, 'portofolios_services');
    }

    /**
     * productsses
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_services');
    }

}
