<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ="product";
	public function category(){
		return $this->belongsTo(Category::class,'category_id','id');
	}
	public function images(){
		return $this->hasMany(Image::class,'product_id','id');
	}
	public function order_items(){
		return $this->hasMany(OrderItem::class,'product_id','id');
	}
}
