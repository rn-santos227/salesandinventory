<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    protected $fillable = [
      'name', 'ref_code', 'category_id', 'supplier_id', 'description', 'quantity', 'cost','price', 'active', 'image'
    ];
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    public function setActiveAttribute($value) {
        $this->attributes['active'] = $value == 'Active' ? 1 : 0;
    }
    
    public function getActiveAttribute() {
        return $this->attributes['active'] ? 'Active' : 'Inactive';
    } 

    public function getImageAttribute() {
        return '/images/smalls/' . $this->attributes['image'];
    }

    public function getImageFile() {
        return $this->attributes['image'];
    }

}
