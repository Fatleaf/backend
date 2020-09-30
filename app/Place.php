<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'place';

    protected $fillable = [
        'email', 'location', 'file', 'place_name', 'description'
    ];
}
