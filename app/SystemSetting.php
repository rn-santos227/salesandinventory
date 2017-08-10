<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    protected $fillable = [
    	'tax_rate', 'non_vat','vatable','system_name','system_mode'
    ];

    // public function setTaxRateAttribute($value) {
    // 	// sets value into decimal
    //     //$this->attributes['tax_rate'] = $value/100;
    // }
    // public function getTaxRateAttribute($value) {
    // 	// sets value into decimal
    //     //$this->attributes['tax_rate'] = $value*100;
    // }

    public function setNonVatAttribute($value)
    {
        $this->attributes['non_vat'] = (boolean)($value);
    }
}
