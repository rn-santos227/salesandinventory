<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Supplier extends Model
{
    use Searchable;

    protected $fillable = [
        //input fields
        'name', 'ref_code', 'email', 'address', 'contact', 'description','active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
    
    public function setActiveAttribute($value) {
        //sets value into boolean binary
        $this->attributes['active'] = $value == 'Active' ? 1 : 0;
    }
    
    public function getActiveAttribute() {
        //gets value from boolean binary into active and inactive
        return $this->attributes['active'] ? 'Active' : 'Inactive';
    }
}
