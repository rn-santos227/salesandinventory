<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
      'name', 'qty','cost', 'price', 'subtotal', 'receipt_id', 'ref_code', 'status',
    ];

    public function receipt()
    {
        return $this->belongsTo('App\Receipt', 'receipt_id', 'receipt_id');
    }
}
