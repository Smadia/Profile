<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $portofolio_id portofolio id
 * @property varchar $name name
 * @property text $image image
 * @property varchar $jobtitle jobtitle
 * @property text $content content
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 * @property Portofolio $portofolio belongsTo
 */
class Testimonial extends Model
{

    /**
     * Database table name
     */
    protected $table = 'testimonials';

    /**
     * Mass assignable columns
     */
    protected $fillable = ['portofolio_id',
        'name',
        'image',
        'jobtitle',
        'content'];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * portofolio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function portofolio()
    {
        return $this->belongsTo(Portofolio::class, 'portofolio_id');
    }


}
