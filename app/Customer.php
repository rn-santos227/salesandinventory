<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'ref_code', 'email', 'address','contact', 'description','active',
    ];
    
    protected $hidden = [
    ];
    
    public function setActiveAttribute($value) {
        $this->attributes['active'] = $value == 'Active' ? 1 : 0;
    }
    
    public function getActiveAttribute() {
        return $this->attributes['active'] ? 'Active' : 'Inactive';
    }

}
