<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'amount', 'currency', 'status', 'payment_id', 'payer_id', 'payer_email'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
