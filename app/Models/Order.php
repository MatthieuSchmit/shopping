<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $fillable = [
        'reference', 'shipping', 'payment', 'state_id', 'user_id', 'purchase_order', 'pick', 'total', 'tax',
        'invoice_id', 'invoice_number'
    ];

    public function addresses() {
        return $this->hasMany(OrderAddress::class);
    }

    public function products() {
        return $this->hasMany(OrderProduct::class);
    }

    public function state() {
        return $this->belongsTo(State::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function payment_infos() {
        return $this->hasOne(Payment::class);
    }

    public function getPaymentTextAttribute($value) {
        $texts = [
            'carte' => 'Carte bancaire',
            'virement' => 'Virement',
            'cheque' => 'Chèque',
            'mandat' => 'Mandat administratif',
        ];
        return $texts[$this->payment];
    }

    public function getTotalOrderAttribute() {
        return $this->total + $this->shipping;
    }

    public function getTvaAttribute() {
        return $this->tax > 0 ? $this->total / (1 + $this->tax) * $this->tax : 0;
    }

    public function getHtAttribute() {
        return $this->total / (1 + $this->tax);
    }

}
