<div class="table-responsive">

    <?php
        $cart = session()->has('cart') ? session('cart') : null;
    ?>
    @if($cart==null)
        <p class="text-center">Chưa có sản phẩm nào trong giỏ hàng</p>
    @else
    <table class="table product-table">

        <!-- Table head -->
        <thead class="mdb-color lighten-5">
          <tr>
            <th class="font-weight-bold">
                <strong>Image</strong>
              </th>
            <th class="font-weight-bold">
              <strong>Product</strong>
            </th>
            {{-- <th class="font-weight-bold">
              <strong>Color</strong>
            </th> --}}
            <th></th>
            <th class="font-weight-bold">
              <strong>Price</strong>
            </th>
            <th class="font-weight-bold">
              <strong>QTY</strong>
            </th>
            <th class="font-weight-bold">
              <strong>Amount</strong>
            </th>
            <th></th>
          </tr>
        </thead>
        <!-- /.Table head -->

        <!-- Table body -->
        <tbody>
        @foreach ($cart->getListCartItem() as $cartItem)
        <tr>
            <th scope="row">
              <img src="{{asset('images/product/'.$cartItem->getProduct()->images[0]->name)}}"  style="width: 100px" alt="" class="img-fluid z-depth-0">
            </th>
            <td>
              <h5 class="mt-3">
                <strong>{{$cartItem->getProduct()->name}}</strong>
              </h5>
              <?php
               $category = DB::table('product')->join('category_id','category.id');

              ?>
              @if (isset($cartItem->category)&&$cartItem->category->id==$item->id)
              <p class="text-muted">{{$item->name}}</p>
              @endif

            </td>

            <td>{{number_format(($cartItem->getProduct()->promotion_price!=0)?$cartItem->getProduct()->promotion_price:$cartItem->getProduct()->price)}}</td>
            <td></td>
            <td>
                <input type="number" class="quantity{{$cartItem->getProduct()->id}}" onkeyup="quantityCartList({{$cartItem->getProduct()->id }})" max="{{$cartItem->getProduct()->quantity_in_stock}}" min="0" value="{{$cartItem->getQuantity()}}" onchange="updateCartList({{$cartItem->getProduct()->id}})" style="width: 80px;" required>
                <p><i>Có sẵn {{$cartItem->getProduct()->quantity_in_stock}}</i></p>
            </td>
            <td class="font-weight-bold">
              <strong>{{number_format($cartItem->getSubTotal())}}đ</strong>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top"
                title="update item"><a href="javascript: updateCartList({{$cartItem->getProduct()->id}})"><i class="fas fa-check"></i></a>
              </button>
              <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top"
                title="Remove item"><a href="javascript: deleteCartList({{$cartItem->getProduct()->id}}"><i class="fas fa-times"></i></a>
              </button>
            </td>
          </tr>
          <!-- /.First row -->



        @endforeach

        </tbody>
        <!-- /.Table body -->
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td>
                  <h4 class="mt-2">
                    <strong>Total<small>{{$cart->getTotalQuantity()}} </small>sản phẩm) : </strong>
                  </h4>
                </td>
                <td class="text-right">
                  <h4 class="mt-2">
                    <strong>{{ number_format($cart->getGrandTotal())}}</strong>
                  </h4>
                </td>
                {{-- <td colspan="3" class="text-right">
                  <button type="button" class="btn btn-primary btn-rounded">Complete purchase
                    <i class="fas fa-angle-right right"></i>
                  </button>
                </td> --}}
              </tr>
        </tfoot>

      </table>
      @endif
</div>
