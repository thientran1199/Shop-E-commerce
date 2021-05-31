@extends('frontend.master')
@section('title')
	<title>Home</title>
@endsection
@section('content')
@include('frontend.danhmuc')
<?php
	$cart = session()->has('cart') ? session('cart') : null;
?>
<!-- Grid row -->
<div class="row ">

    <!-- Content -->
    <div class="col-lg-12">



        <!--Section: Products-->
        <section>

            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-12">

                    <!-- Grid row -->
                    <div class="row">
                        @foreach($product as $item)
                        <!--Grid column-->
                        <div class="col-lg-4 col-md-12 mb-4 " height="400px" >

                            <!--Card-->
                            <div class="card card-ecommerce" >

                                <!--Card image-->
                                <div class="view overlay">
                                    <img src="{{asset('images/product/'.$item->images[0]->name)}}" class="img-fluid" alt=" ">
                                    <a href="{{url('/product/detail/'.$item->id)}}">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Category & Title-->

                                    <h5 class="card-title mb-1"><strong><a href="{{url('/product/detail/'.$item->id)}}" class="dark-grey-text">{{$item->name}}</a></strong></h5>
                                  @if ($item->promotion_price!=0)
                                  <span class="badge badge-success mb-2 ml-2">SALE</span>
                                  @endif
                                  @if ($listLatest ==true)
                                  <span class="badge badge-info mb-2 ml-2">new</span>
                                  @endif
                                  {{-- @if ()
                                  <span class="badge grey mb-2">best rated</span>
                                  @endif --}}
                                    <span class="badge badge-danger mb-2">bestseller</span>
                                    <!-- Rating -->
                                    <ul class="rating">
                                        <li><i class="fas fa-star blue-text"></i></li>
                                        <li><i class="fas fa-star blue-text"></i></li>
                                        <li><i class="fas fa-star blue-text"></i></li>
                                        <li><i class="fas fa-star blue-text"></i></li>
                                        <li><i class="fas fa-star blue-text"></i></li>
                                    </ul>

                                    <!--Card footer-->
                                    <div class="card-footer pb-0">
                                        <div class="row mb-0">
                                            @if($item->promotion_price!=0)
                                            <span class="red-text">
                                                <strong>{{$item->promotion_price}}VNĐ</strong>
                                            </span>

                                            <span class="grey-text"><small><s>{{$item->price}} VNĐ</s></small></span>
                                            <span class="float-right">
                                                <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-shopping-cart ml-3"></i></a>
                                            </span>
                                            @else
                                            <span class="red-text">
                                                <strong>{{$item->price}}VNĐ</strong>
                                            </span>
                                            <span class="float-right">
                                                @if($item->quantity_in_stock>0)
                                                    @if($cart!=null&&array_key_exists($item->id,$cart->getListCartItem()))
                                                    <a class="add-cart{{$item->id}}" href="javascript:void(0);" data-toggle="tooltip"   data-placement="top" title="Đã thêm vào giỏ" ><i class="fas fa-check ml-3"></i></a>
                                                    @else
                                                    <a class="add-cart{{$item->id}}" href="javascript: addCartItem({{$item->id}});"  onclick="reload()" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-shopping-cart ml-3"></i></a>
                                                    @endif
                                                @else
                                                    <span class="btn btn-warning"><i class="far fa-frown"></i> Sản phẩm đã bán hết</span>
                                                @endif
                                            </span>
                                            @endif
                                            {{-- <span class="grey-text"><small><s>{{$item->price}} VNĐ</s></small></span> --}}
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
                    <!--Grid row-->




                </div>
                {{ $product->links() }}
            </div>
            <!--Grid row-->

        </section>
        <!--Section: Products-->

       

    </div>
    <!-- /.Content -->

</div>
<!-- Grid row -->


@endsection
