<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'created_at', 'code', 'description', 'type', 'package_id', 'quantity', 'package', 'esim_type',
        'validity', 'price', 'data', 'currency', 'manual_installation', 'qrcode_installation', 'installation_guides', 
        'user_id', 'status_id'
    ];
   

    protected $casts = [
        'installation_guides' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(EsimUser::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function sims()
    {
        return $this->hasMany(Sims::class);
    }
}