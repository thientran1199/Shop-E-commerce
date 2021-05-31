<?php
	$cart = session()->has('cart') ? session('cart') : null;
?>

<div class="modal fade cart-modal mini-cart" id="cart-modal-ex" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog " role="document">
        <!--Content-->

        <div class="modal-content mini-cart">
            <!--Header-->
            <div class="modal-header ">

                <h4 class="modal-title font-weight-bold dark-grey-text" id="myModalLabel">Your cart</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            @if($cart == null)
                <p style="margin-left: 20%;margin-top: 5px">Chưa có sản phẩm nào trong giỏ</p>
            @else
            <div class="modal-body">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart->getListCartItem() as $cartItem)
                        <tr>
                            <th scope="row"><img src="{{asset('images/product/'.$cartItem->getProduct()->images[0]->name)}}" style="width: 100px"></th>
                            <td><a href="{{url('/product/detail/'.$cartItem->getProduct()->id)}}">{{$cartItem->getProduct()->name}}</a></td>
                            <td>{{number_format(($cartItem->getProduct()->promotion_price!=0)?$cartItem->getProduct()->promotion_price:$cartItem->getProduct()->price)}}đ</td>
                            <td><input type="number"  onclick="reload()" class="quantity{{$cartItem->getProduct()->id}}" onkeyup="quantityCart({{$cartItem->getProduct()->id}})" max="{{$cartItem->getProduct()->quantity_in_stock}}" min="0" value="{{$cartItem->getQuantity()}}" onchange="updateCartItem({{$cartItem->getProduct()->id}})" style="width: 50px"></td>
                            {{-- <td>{{$cartItem->getQuantity()}}</td> --}}
                            <td>
                                <a href="javascript: deleteCartItem({{$cartItem->getProduct()->id}});">
                                    <i class="fas fa-eraser"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot >
                        <tr class="total-selected " >
                            <th>Tổng tiền :</th>
                            <th>{{number_format($cart->getGrandTotal())}}đ</th>
                        </tr>
                    </tfoot>

                    <input type="hidden" class="total-quantity-hidden" value="{{$cart->getTotalQuantity()}}">

                </table>



            </div>

            <!--Footer-->
            <div class="modal-footer">
                @endif
                <a href="{{ url('/cart')}}"><button class="btn btn-success btn-rounded btn-sm">Views</button></a>
                @if($cart!=null)
                <a   href="javascript: updateCartItem({{$cartItem->getProduct()->id}})"><button class="btn btn-warning btn-rounded btn-sm">Update</button></a>
                <a href="{{ url('/order')}}"><button class="btn btn-primary btn-rounded btn-sm">Checkout</button></a>
                @endif
                {{-- <button type="button" class="btn btn-grey btn-rounded btn-sm" data-dismiss="modal">Close</button> --}}
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
