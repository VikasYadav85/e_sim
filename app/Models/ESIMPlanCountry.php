<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ESIMPlanCountry extends Model
{
    use HasFactory;
    
    public function country()
    {

        return $this->belongsTo(Country::class);
    }

      
    // public function eSIMPlanCountries()
    // {
    //     return $this->belongsTo(ESIMPlanCountry::class);
    // }
    // public function countries(){
    //     $this->hasMany('e_s_i_m_plan_id', 'country_id');
    // }
}
