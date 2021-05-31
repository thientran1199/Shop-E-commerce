@extends('frontend.master')
@section('title')
    <title>Product</title>
@endsection
@section('content')
<?php
    $cart = session()->has('cart') ? session('cart') : null;
?>
<div class="row">
    <!-- danh muc -->
        {{-- @include('frontend.menu') --}}
    <!-- end danh muc -->
    <div class="col">
        <div class="page-header">
                <h3>Sản phẩm
                    <?php
                        $key= request()->get('key');
                        $id = request()->get('category');
                        if($id!=null) {
                        $db = DB::table('category')->where('id',$id)->first();
                    ?>
                           <small>> {{$db->name}}</small>
                    <?php }?>
                        <small> {{(isset($key))?'> Tìm kiếm':''}}</small>
                </h3>
                <hr>
        </div>
        <div class="container">
            <!-- lựa chọn nâng cao như giá, sắp tên -->
            @include('frontend.advanced_options')
        </div>
        <hr>
        <div class="mb-4">
            <p>Hiển thị {{$listProduct->count()}} sản phẩm (tổng số {{$listProduct->total()}} sản phẩm) {{(isset($key))?('cho từ khóa : "'.$key.'"'):''}}</p>

        </div>
        <div class="row">
            @foreach($listProduct as $item)
            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4">
                <!--Card-->
                <div class="card card-ecommerce">

                    <!--Card image-->
                    <div class="view overlay">
                        <img src="{{asset('images/product/'.$item->images[0]->name)}}"  class="img-fluid" alt="ảnh{{ $item->name}}">
                        <a href="{{url('/product/detail/'.$item->id)}}">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <!--Card image-->

                    <!--Card content-->
                    <div class="card-body">
                        <!--Category & Title-->
                    <?php
                        $productsSell = DB::table('product')->join('order_item','product.id','=','order_item.product_id')->join('order','order.id','=','order_item.order_id')->where('order.status','Đã nhận hàng')->get();
                        $listLatest = DB::table('product')->orderBy('created_at','desc')->where('enabled',1)->limit(12)->get();
                    ?>
                        <h5 class="card-title mb-1"><strong><a href="{{url('/product/detail/'.$item->id)}}" class="dark-grey-text">{{ $item->name}}</a></strong></h5>
                        @if(isset($productsSell)  )
                        <span class="badge badge-danger mb-2">bestseller</span>
                        @endif
                        @if ($item->promotion_price!=0)
                        <span class="badge badge-success mb-2 ml-2">SALE</span>
                        @endif
                        @if ($listLatest ==true)
                        <span class="badge badge-info mb-2 ml-2">new</span>
                        @endif
                        <!-- Rating -->
                        <ul class="rating">
                            <li><i class="fas fa-star blue-text"></i></li>
                            <li><i class="fas fa-star blue-text"></i></li>
                            <li><i class="fas fa-star blue-text"></i></li>
                            <li><i class="fas fa-star blue-text"></i></li>
                            <li><i class="fas fa-star grey-text"></i></li>
                        </ul>

                        <!--Card footer-->
                        <div class="card-footer pb-0">
                            <div class="row mb-0">
                                <h5 class="mb-0 pb-0 mt-1 font-weight-bold">
                                    @if($item->promotion_price!=0)
                                    <span class="red-text">
                                        <strong>{{$item->promotion_price}}VNĐ</strong>
                                    </span>

                                    <span class="grey-text"><small><s>{{$item->price}} VNĐ</s></small></span>
                                    @else
                                    <span class="red-text">
                                        <strong>{{$item->price}}VNĐ</strong>
                                    </span>
                                    @endif
                                </h5>

                                <span class="float-right">
                                @if($item->quantity_in_stock>0)
                                    @if($cart!=null&&array_key_exists($item->id,$cart->getListCartItem()))
                                    <a class="add-cart{{$item->id}}" href="javascript:void(0);" data-toggle="tooltip"   data-placement="top" title="Đã thêm vào giỏ" ><i class="fas fa-check ml-3"></i></a>
                                    @else
                                    <a class="add-cart{{$item->id}}" href="javascript: addCartItem({{$item->id}});" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-shopping-cart ml-3"></i></a>
                                    @endif
                                @else
                                {{-- <a   title="Out Stock"><i class="far fa-frown"></a> --}}
                                    <a title="Out Stock" data-toggle="tooltip" data-placement="top" ><i class="far fa-frown"></i> </a>
                                @endif
                                </span>
                            </div>
                        </div>

                    </div>
                    <!--Card content-->

                </div>
                <!--Card-->

            </div>
            <!--Grid column-->

            @endforeach
        </div>
        {{$listProduct->withQueryString()->links()}}
    </div>
</div>


@endsection
