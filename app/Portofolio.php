<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $client_id client id
 * @property varchar $name name
 * @property text $image image
 * @property text $description description
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 * @property Client $client belongsTo
 * @property \Illuminate\Database\Eloquent\Collection $sservice belongsToMany
 * @property \Illuminate\Database\Eloquent\Collection $testimonial hasMany
 */
class Portofolio extends Model
{

    /**
     * Database table name
     */
    protected $table = 'portofolios';

    /**
     * Mass assignable columns
     */
    protected $fillable = ['client_id',
        'name',
        'image',
        'description'];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    /**
     * services
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'portofolios_services');
    }

    /**
     * testimonials
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'portofolio_id');
    }


}
