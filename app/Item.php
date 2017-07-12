<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
      'name', 'ref_code', 'category_id', 'supplier_id', 'decription', 'quantity', 'price'
    ];
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }
}
