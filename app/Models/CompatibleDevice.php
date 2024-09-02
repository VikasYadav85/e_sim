<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompatibleDevice extends Model
{
    use HasFactory;

    protected $fillable = [
        'model', 'os', 'brand', 'name'
         
    ];
}
