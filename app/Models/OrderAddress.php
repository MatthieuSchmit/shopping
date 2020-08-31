<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model {

    protected $fillable = [
        'name', 'first_name', 'pro', 'civility', 'company', 'address', 'address_bis', 'bp', 'postal', 'city', 'phone', 'country_id', 'facturation',
    ];

    public function country() {
        return $this->belongsTo(Country::class);
    }

}
