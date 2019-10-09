<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $name name
@property text $image image
@property text $description description
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property \Illuminate\Database\Eloquent\Collection $sservice belongsToMany

 */
class Product extends Model
{

    /**
    * Database table name
    */
    protected $table = 'products';

    /**
    * Mass assignable columns
    */
    protected $fillable=['name',
'image',
'description'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * sservices
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function services()
    {
        return $this->belongsToMany(Service::class,'products_services');
    }



}
