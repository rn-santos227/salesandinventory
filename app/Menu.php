<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name', 'ref_code', 'description', 'category', 'price', 'active',
    ];

    
    public function setActiveAttribute($value) {
        $this->attributes['active'] = $value == 'Active' ? 1 : 0;
    }
    
    public function getActiveAttribute() {
        return $this->attributes['active'] ? 'Active' : 'Inactive';
    }
}
