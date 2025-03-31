<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    protected $guarded =[
        'id',
    ];

    public function company() {
        return $this->belongTo(Company::class);
    }
}
