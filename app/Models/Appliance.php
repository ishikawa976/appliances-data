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
        'status'
    ];

    protected function getCategoryAttribute() {
        $category = Category::find($this->category_id);
        return $category->name;
    }

    protected function getMakerNameAttribute() {
        $maker = Maker::find($this->maker_id);
        return $maker->maker_name;
    }

    protected function getStatusAttribute() {
        return $this->disposal ? '廃棄済' : '所有' ;
    }

    public function categorys() {
        return $this->belongsTo(Category::class);
    }

    public function makers() {
        return $this->belongsTo(Maker::class);
    }

    public function shops() {
        return $this->belongsTo(Shop::class);
    }
};
