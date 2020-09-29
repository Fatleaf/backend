<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class animals extends Model
{
    protected $fillable = [
        'title', 'img_url', 'sub_title','content'
    ];

}
