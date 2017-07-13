<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'ref_code', 'name', 'description',
    ];

    public function setActiveAttribute($value)
    {
    	$status = ($this->attributes['active']) ? 'active' : 'false';
    }
}
