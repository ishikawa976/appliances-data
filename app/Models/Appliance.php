<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use App\Models\Maker;
use App\Models\Shop;
use App\Models\Company;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Record;
class Appliance extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $appends = [
        'category',
        'maker_name',
        'shop_name',
        'shop_url',
        'status'
    ];

    protected function getCategoryAttribute() {
        $category = Category::find($this->category_id);
        return $category->name;
    }

    protected function getMakerNameAttribute() {
        $maker = Maker::find($this->maker_id);
        return $maker->name;
    }

    protected function getStatusAttribute() {
        return $this->disposal ? '廃棄済' : '所有' ;
    }

     protected function getShopNameAttribute() {
        if($this->shop_id !== null) {
            $shop = Shop::find($this->shop_id);
            //$shopName = $shop->shop_name;
            $status = $shop->status;
            $company = Company::find($shop->company_id);
            //$companyName = $company->name;
            $fullName = $company->name.' '. $shop->shop_name;

            if($status==='閉店'){
                return  $fullName.'('.$status.')';
            } else {
                return  $fullName;
            }
        } else {
            return "";
        }
    }
    
    protected function getShopUrlAttribute() {
        if($this->shop_id !== null) {
        $shop = Shop::find($this->shop_id);
        return $shop->url;
        } else {
            return "";
        }
     }

    public function category(): BelongsTo  
    {
        return $this->belongsTo(Category::class);
    }

    public function maker(): BelongsTo 
    {
        return $this->belongsTo(Maker::class);
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function records(): HasMany  
    {
        return $this->hasMany(Record::class);
    }

};
