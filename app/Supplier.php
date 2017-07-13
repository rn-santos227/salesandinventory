<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
//    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
        $this->attributes['active'] = $value == 'Active' ? 1 : 0;
    }
    
    public function getActiveAttribute() {
        return $this->attributes['active'] ? 'Active' : 'Inactive';
    }
}
