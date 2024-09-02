<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoverageNetwork extends Model
{
    use HasFactory;

    public function coverageNetworkTypes()
    {
        return $this->hasMany(CoverageNetworkType::class, 'coverage_network_id');
    }
}
