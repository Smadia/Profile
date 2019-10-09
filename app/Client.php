<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property varchar $name name
 * @property text $image image
 * @property text $description description
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 * @property \Illuminate\Database\Eloquent\Collection $portofolio hasMany
 */
class Client extends Model
{

    /**
     * Database table name
     */
    protected $table = 'clients';

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function portofolios()
    {
        return $this->hasMany(Portofolio::class, 'client_id');
    }


}
