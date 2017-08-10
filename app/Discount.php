<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Discount extends Model
{
    use Searchable;
    protected $fillable = [
        // input fields
      'name', 'ref_code',  'rate', 'description', 'active'
    ];

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
