<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sim extends Model
{
    use HasFactory;
    protected $fillable = [
    	'order_id', 'esims_id', 'esims_created_at', 'iccid', 'lpa', 'imsis', 'matching_id', 'qrcode', 'qrcode_url', 'voucher_code', 'airalo_code', 'apn_type', 'apn_value', 'is_roaming', 'confirmation_code'
    ];

    protected $dates = ['created_at'];

    public function simable(){
    	return $this->hasOne(Simable::class, 'esims_id')->with('user');
    }
}
 