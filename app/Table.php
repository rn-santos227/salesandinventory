<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
    	'status','name','ref_code','description','status','receipt_id'
    ];

    public function receipt()
    {
        return $this->belongsTo('App\Receipt');
    }
}
