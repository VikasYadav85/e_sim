<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopupOrders extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id', 'quantity', 'type', 'description', 'esim_type', 'validity', 'package',
        'data', 'price','ids','created_at', 'code', 'currency', 'manual_installation',
        'qrcode_installation', 'installation_guide_en'
    ];

    protected $dates = ['created_at'];
}
