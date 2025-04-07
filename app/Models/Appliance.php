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
        'shop_name'
    ];

    protected function getCategoryAttribute() {
        $category = Category::find($this->category_id);
        return $category->name;
    }

    protected function getMakerNameAttribute() {
        $maker = Maker::find($this->maker_id);
        return $maker->maker_name;
    }

    protected function getShopNameAttribute() {
        $shop = Shop::find($this->shop_id);
        return $shop->full_name;
    }

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
