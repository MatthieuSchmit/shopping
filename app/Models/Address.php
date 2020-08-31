<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

    protected $fillable = ['pro', 'civility', 'first_name', 'last_name', 'company', 'address', 'address_bis', 'bp',
        'postal', 'city', 'phone', 'country_id'
    ];

    public function country() {
        return $this->belongsTo(Country::class);
    }

}
