<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Category extends Model
{
	use Searchable;

    protected $fillable = [
        'ref_code', 'name', 'description', 'active',
    ];

    public function setActiveAttribute($value) {
        $this->attributes['active'] = $value == 'Active' ? 1 : 0;
    }
    
    public function getActiveAttribute() {
        return $this->attributes['active'] ? 'Active' : 'Inactive';
    }
}
