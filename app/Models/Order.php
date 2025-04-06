<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'guest_email',
        'shipping_name',
        'shipping_address',
        'shipping_city',
        'shipping_zip',
        'shipping_country',
        'status',
        'total',
    ];

    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}
