<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Company;
//use App\Models\Appliance;

class Shop extends Model
{
    protected $guarded =[
        'id',
    ];

    protected $appends = [
        'full_name',
    ];

    protected function getFullNameAttribute() {
        $company = Company::find($this->company_id);
        return $company->name.' '.$this->shop_name;
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function appliances(): HasMany
    {
        return $this->hasMany(Appliance::class);
    }
}
