<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem
{
    use HasFactory;
    private $product;
	private $priceSell;
	private $quantity;
	private $subTotal;
    

	public function __construct($product,$priceSell,$quantity,$subTotal){
		$this->product = $product;
		$this->priceSell = $priceSell;
		$this->quantity = $quantity;
		$this->subTotal = $subTotal;
	}
	/*get,set product*/
	public function getProduct(){
		return $this->product;
	}
	public function setProduct($product){
		$this->product = $product;
	}
	/*get/set giá bán tại thời điểm*/
	public function getPriceSell(){
		return $this->priceSell;
	}
	public function setPriceSell($priceSell){
		$this->priceSell = $priceSell;
	}
	/*get,set số lượng product*/
	public function getQuantity(){
		return $this->quantity;
	}
	public function setQuantity($quantity){
		$this->quantity = $quantity;
	}
	/*get,set giá trị subtotal*/
	public function getSubTotal(){
		return $this->subTotal;
	}
	public function setSubTotal($subTotal){
		$this->subTotal = $subTotal;
	}
}
