<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function packageCountry(){
    	return $this->hasMany(PackageCountry::class, 'operator_id', 'operator_id');
    }
}
