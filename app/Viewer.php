<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{
    protected $fillable = [
        'ip', 'info', 'url'
    ];
}
