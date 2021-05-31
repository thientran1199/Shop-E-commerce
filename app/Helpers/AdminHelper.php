<?php

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;

function count_item_product(){
    return $product_cnt = Product::where('status','=',1)->count();
}
function count_item_order(){
    return $order_cnt = Order::where('status','=','Đã nhận hàng')->count();
}
function count_item_order_wait(){
    return $order_cnt = Order::all()->count();
}
function count_item_review(){
    return $review_cnt = Review::all()->count();
}
function count_item_customer(){
    return $customer = Customer::all()->count();
}
function count_item_sale(){
   
    return $sale = Product::where('promotion_price','!=',0 )->count();
}
?>
