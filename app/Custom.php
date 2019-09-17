<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custom extends Model
{
    const TEXT = 'text';

    const JSON = 'json';

    const FILE = 'file';

    const IMAGE = 'image';

    const NUMBER = 'number';

    const HTML = 'html';

    const URL = 'url';

    const ALL = [
        self::TEXT, self::JSON, self::FILE, self::IMAGE, self::NUMBER, self::HTML, self::URL
    ];

    protected $primaryKey = 'key';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'key', 'value', 'type'
    ];
}
