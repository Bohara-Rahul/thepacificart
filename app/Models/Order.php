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
        'payment_mode',
        'payment_id',
        'session_id',
        'email_sent',
        'is_paid',
    ];

    public function items() 
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
