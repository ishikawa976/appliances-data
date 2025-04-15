<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
//use App\Models\Appliance;

class Maker extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];

    public function appliance(): HasMany
    {
        return $this->hasMany(Appliance::class);
    }
}
