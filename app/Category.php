<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'ref_code', 'name', 'description',
    ];

    public function setActiveAttribute($value) {
        $this->attributes['active'] = $value == 'Active' ? 1 : 0;
    }
    
    public function getActiveAttribute() {
        return $this->attributes['active'] ? 'Active' : 'Inactive';
    }
}
