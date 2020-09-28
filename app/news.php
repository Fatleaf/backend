<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $fillable = [
        'id', 'title', 'url','sub_title','content'
    ];
}
