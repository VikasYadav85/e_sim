<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ESIMPlan extends Model
{
    use HasFactory;

    public function eSIMPlanCountries()
    {
        return $this->hasMany(ESIMPlanCountry::class)->with('country');
    }
  
}
