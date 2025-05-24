<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [
        'id',
    ];

    public function appliance(): BelongsTo  
    {
        return $this->belongsTo(Appliance::class);
    }
}
