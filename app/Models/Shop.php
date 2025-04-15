<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Company;
use App\Models\Appliance;

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

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function appliances() {
        return $this->hasMany(Appliance::class);
    }
}
