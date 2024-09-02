<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EsimUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'mobile', 'address', 'state', 'city', 'postal_code', 
        'country_id','company','created_at','order_id'
    ];
}
