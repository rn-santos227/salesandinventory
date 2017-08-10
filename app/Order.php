<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Order extends Model
{
    protected $fillable = [
      'menu','name','ref_code', 'qty','cost', 'price', 'subtotal', 'receipt_id', 'status'
    ];

    public function receipt()
    {
        return $this->belongsTo('App\Receipt');
    }
}
