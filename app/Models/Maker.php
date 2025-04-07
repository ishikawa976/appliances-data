<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Appliance;

class Maker extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];

    public function appliance() {
        return $this->hasMany(Appliance::class);
    }
}
