<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
