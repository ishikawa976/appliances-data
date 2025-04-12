<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use App\Models\Maker;
use App\Models\Shop;

class Appliance extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $appends = [
        'category',
        'maker_name',
        //'shop_name',
        //'shop_url',
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

     /*protected function getShopNameAttribute() {
        $shop = Shop::find($this->shop_id);
        $name = $shop->full_name;
        $status = $shop->status;
        if($status==='閉店'){
            return $name.'('.$status.')';
        } else {
            return $name;
        }
    }*/
    
    /* protected function getShopUrlAttribute() {
        $shop = Shop::find($this->shop_id);
        return $shop->url;
     }*/

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function maker() {
        return $this->belongsTo(Maker::class);
    }

    public function shop() {
        return $this->belongsTo(Shop::class);
    }
};
