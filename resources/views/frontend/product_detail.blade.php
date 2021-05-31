@extends('frontend.master')
@section('title')
	<title>{{$product_detail->name}}</title>
@endsection
@section('content')
<?php
	$cart = session()->has('cart') ? session('cart') : null;
    $number_sell1 = 0;
    foreach ($product_detail->order_items as $key => $value) {
        $number_sell1 +=$value->quantity;
    }
?>
<section id="productDetails" class="pb-5">

    <!--News card-->
    <div class="card mt-5 hoverable">
        <div style="margin-top: 5px; margin-right: 5px;"><small style="float: right;"><i class="fas fa-shopping-cart text-success"></i> Đã bán : {{$number_sell1}} | <i class="fas fa-eye"></i> Lượt xem : {{$product_detail->views}} </small></div>

        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="row mx-2">
                    <!--Carousel Wrapper-->
                    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails mb-5 pb-4" data-ride="carousel">

                        <!--Slides-->
                        {{-- @foreach($product_detail->images as $key => $image) --}}
                        <div class="carousel-inner text-center text-md-left" role="listbox">

                            @foreach($product_detail->images as $key => $image)
                            @if($key == 0)
                            <div class="carousel-item active">
                                <img src="{{asset('/images/product/'.$image->name)}}" alt="First slide" class="img-fluid">
                            </div>
                            @else
                            <div class="carousel-item ">
                                <img src="{{asset('/images/product/'.$image->name)}}" alt="First slide" class="img-fluid">
                            </div>

                            @endif
                            @endforeach

                        </div>


                        <!--Thumbnails-->
                        <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!--/.Thumbnails-->

                    </div>
                    <!--/.Carousel Wrapper-->
                </div>

                <!--Grid row-->
                <div class="row mb-4">

                    <div class="col-md-12">

                        <div id="mdb-lightbox-ui"></div>

                        <div class="mdb-lightbox no-margin" data-pswp-uid="1">
                            @foreach($product_detail->images as $key => $image)
                            <!--Grid column-->
                            <figure class="col-md-4">
                                <!--Large image-->
                                <a href="{{asset('/images/product/'.$product_detail->images[0]->name)}}" data-size="1600x1067">

                                    <!-- Thumbnail-->
                                    <img src="{{asset('/images/product/'.$image->name)}}" class="img-fluid">

                                </a>
                            </figure>
                            <!--Grid column-->
                            @endforeach


                        </div>
                    </div>
                </div>
                <!--Grid row-->
            </div>
            <div class="col-lg-5 mr-3 text-center text-md-left">
                <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">
                    <strong>{{$product_detail->name}}</strong>
                </h2>
                @if ($product_detail->promotion_price!=0)
                    <span class="badge badge-success mb-2 ml-2">SALE</span>
                @endif
                @if ($listLatest ==true)
                <span class="badge badge-info mb-2 ml-2">new</span>
                @endif
                <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
                    @if ($product_detail->promotion_price != 0)
                    <span class="red-text font-weight-bold">
                        <strong>{{$product_detail->promotion_price}} VND</strong>
                    </span>
                    <span class="grey-text">
                        <small>
                            <s>{{$product_detail->price}} VND</s>
                        </small>
                    </span>
                    @else
                    <span class="red-text font-weight-bold">
                        <strong>{{$product_detail->price}} VND</strong>
                    </span>
                    @endif

                </h3>

                <p class="ml-xl-0 ml-4">{{$product_detail->description}}
                </p>
                <p class="ml-xl-0 ml-4">
                    <strong>Category: </strong>{{$product_detail->category->name}}</p>
                <p class="ml-xl-0 ml-4">
                    <strong>Brand: </strong>{{$product_detail->brand}}</p>
                <p class="ml-xl-0 ml-4">
                    <strong>Origin: </strong>{{$product_detail->origin}}</p>
                <p class="ml-xl-0 ml-4">
                    <strong>Availability: </strong>There are {{$product_detail->quantity_in_stock}} products left in stock</p>

                <!-- Add to Cart -->
                <section class="color">
                    <div class="mt-5">
                        <p class="grey-text"><strong>Quantity: </strong></p>

                            <input type="number" max="{{$product_detail->quantity_in_stock}}" min="1" value="1">


                        <div class="row mt-3 mb-4">
                            <div class="col-md-12 text-center text-md-left text-md-right">
                                <a href="javascript: addCartItem({{ $product_detail->id }});">
                                    <button  onclick="reload()" class="btn btn-primary btn-rounded waves-effect waves-light add-cart{{$product_detail->id}}">

                                        <i class="fas fa-cart-plus mr-2"   aria-hidden="true"></i> Add to cart</button>
                                    </a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.Add to Cart -->
            </div>
        </div>
    </div>
    <!--News card-->

</section>
<section id="reviews" class="pb-5 mt-4 ml-md-5">

    <hr>
    <h4 class="h4-responsive dark-grey-text font-weight-bold my-5 text-center">
        <strong>Product Reviews</strong>
    </h4>
    <hr class="mb-5">

    <!--Main wrapper-->
    <div class="comments-list text-center text-md-left">

        @if(count($listReview)==0)
            <i>Chưa có đánh giá nào</i>
        @else
        <!--Third row-->
        <div class="row mb-5">
            @foreach($listReview as $item)
            <!--Image column-->
            <div class="col-sm-2 col-12 mb-3">
                <img src="{{asset('avt.jpg')}}" alt="sample image" class="avatar rounded-circle z-depth-1-half">
            </div>
            <!--/.Image column-->
            <!--Content column-->
            <div class="col-sm-10 col-12">
                <a>
                    <h5 class="user-name font-weight-bold">{{$item->order_item->order->customer->person->full_name}}</h5>
                </a>

                <!-- Rating -->
                <ul class="rating">
                    @for($i=1;$i<=$item->rate;$i++)
                    <span class="fas fa-star star-rating"></span>
                    @endfor
                </ul>
                <div class="card-data">
                    <ul class="list-unstyled mb-1">
                        <li class="comment-date font-small grey-text">
                            <i class="far fa-clock-o"></i> {{$item->updated_at}}</li>
                    </ul>
                </div>
                <p class="dark-grey-text article">{{($item->comment!='')?$item->comment:'(trống)'}}</p>
            </div>
            @endforeach

            <!--/.Content column-->
        </div>
        <!--/.Third row-->
        @endif
    </div>
    <!--/.Main wrapper-->
</section>

<section id="products" class="pb-5 mt-4">

    <hr>
    <h4 class="h4-responsive dark-grey-text font-weight-bold my-5 text-center">
        <strong>Related Products</strong>
    </h4>
    <hr class="mb-5">

    <p class="text-center w-responsive mx-auto mb-5 dark-grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate
        esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam.</p>

    <!--Carousel Wrapper-->
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

        <!--Controls-->
        <div class="controls-top">
            <a class="btn-floating primary-color waves-effect waves-light" href="#multi-item-example" data-slide="prev">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a class="btn-floating primary-color waves-effect waves-light" href="#multi-item-example" data-slide="next">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>
        <!--Controls-->

        <!--Indicators-->
        <ol class="carousel-indicators">
            <li class="primary-color" data-target="#multi-item-example" data-slide-to="0"></li>
            <li class="primary-color" data-target="#multi-item-example" data-slide-to="1"></li>
            <li class="primary-color active" data-target="#multi-item-example" data-slide-to="2"></li>
        </ol>
        <!--Indicators-->

        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            {{-- @foreach ($product as $item) --}}
            <?php  $product = DB::table('product')->get();?>

            <!--First slide-->
            <div class="carousel-item">

                <div class="col-md-4 mb-4">

                    <!--Card-->
                    <div class="card card-ecommerce">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="{{asset('images/product/1622344880ProductId6ImageId0.png')}}" class="img-fluid" alt="">
                            <a>
                                <div class="mask rgba-white-slight waves-effect waves-light"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <!--Category & Title-->

                            <h5 class="card-title mb-1">
                                <strong>
                                    <a href="" class="dark-grey-text">Sony TV-675i</a>
                                </strong>
                            </h5>
                            <span class="badge badge-danger mb-2">bestseller</span>


                            <!--Card footer-->
                            <div class="card-footer pb-0">
                                <div class="row mb-0">
                                    <span class="float-left">
                                        <strong>1439$</strong>
                                    </span>
                                    <span class="float-right">

                                        <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Cart">
                                            <i class="fas fa-shopping-cart ml-3"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>

                <div class="col-md-4 clearfix d-none d-md-block mb-4">

                     <!--Card-->
                     <div class="card card-ecommerce">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="{{asset('images/product/1621312728ProductId1ImageId0.png')}}" class="img-fluid" alt="">
                            <a>
                                <div class="mask rgba-white-slight waves-effect waves-light"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <!--Category & Title-->

                            <h5 class="card-title mb-1">
                                <strong>
                                    <a href="" class="dark-grey-text">Ipad Pro</a>
                                </strong>
                            </h5>
                            <span class="badge badge-danger mb-2">bestseller</span>


                            <!--Card footer-->
                            <div class="card-footer pb-0">
                                <div class="row mb-0">
                                    <span class="float-left">
                                        <strong>1439$</strong>
                                    </span>
                                    <span class="float-right">

                                        <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Cart">
                                            <i class="fas fa-shopping-cart ml-3"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>

                <div class="col-md-4 clearfix d-none d-md-block mb-4">

                     <!--Card-->
                     <div class="card card-ecommerce">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="{{asset('images/product/1622344988ProductId7ImageId0.png')}}" class="img-fluid" alt="">
                            <a>
                                <div class="mask rgba-white-slight waves-effect waves-light"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <!--Category & Title-->

                            <h5 class="card-title mb-1">
                                <strong>
                                    <a href="" class="dark-grey-text">TV Sony</a>
                                </strong>
                            </h5>
                            <span class="badge badge-danger mb-2">bestseller</span>


                            <!--Card footer-->
                            <div class="card-footer pb-0">
                                <div class="row mb-0">
                                    <span class="float-left">
                                        <strong>1439$</strong>
                                    </span>
                                    <span class="float-right">

                                        <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Cart">
                                            <i class="fas fa-shopping-cart ml-3"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>

            </div>
            <!--First slide-->

            <!--Second slide-->
            <div class="carousel-item">

                <div class="col-md-4 mb-4">

                    <!--Card-->
                    <div class="card card-ecommerce">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="{{asset('images/product/1622345382ProductId9ImageId1.png')}}" class="img-fluid" alt="">
                            <a>
                                <div class="mask rgba-white-slight waves-effect waves-light"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <!--Category & Title-->

                            <h5 class="card-title mb-1">
                                <strong>
                                    <a href="" class="dark-grey-text">Iphone</a>
                                </strong>
                            </h5>
                            <span class="badge badge-danger mb-2">bestseller</span>


                            <!--Card footer-->
                            <div class="card-footer pb-0">
                                <div class="row mb-0">
                                    <span class="float-left">
                                        <strong>1439$</strong>
                                    </span>
                                    <span class="float-right">

                                        <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Cart">
                                            <i class="fas fa-shopping-cart ml-3"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>

                <div class="col-md-4 clearfix d-none d-md-block mb-4">

                     <!--Card-->
                     <div class="card card-ecommerce">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="{{asset('images/product/1622344008ProductId4ImageId0.png')}}" class="img-fluid" alt="">
                            <a>
                                <div class="mask rgba-white-slight waves-effect waves-light"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <!--Category & Title-->

                            <h5 class="card-title mb-1">
                                <strong>
                                    <a href="" class="dark-grey-text">Canon</a>
                                </strong>
                            </h5>
                            <span class="badge badge-danger mb-2">bestseller</span>


                            <!--Card footer-->
                            <div class="card-footer pb-0">
                                <div class="row mb-0">
                                    <span class="float-left">
                                        <strong>1439$</strong>
                                    </span>
                                    <span class="float-right">

                                        <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Cart">
                                            <i class="fas fa-shopping-cart ml-3"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>

                <div class="col-md-4 clearfix d-none d-md-block mb-4">

                     <!--Card-->
                     <div class="card card-ecommerce">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="{{asset('images/product/1622341781ProductId3ImageId2.png')}}" class="img-fluid" alt="">
                            <a>
                                <div class="mask rgba-white-slight waves-effect waves-light"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <!--Category & Title-->

                            <h5 class="card-title mb-1">
                                <strong>
                                    <a href="" class="dark-grey-text">Loa Bluetooth</a>
                                </strong>
                            </h5>
                            <span class="badge badge-danger mb-2">bestseller</span>


                            <!--Card footer-->
                            <div class="card-footer pb-0">
                                <div class="row mb-0">
                                    <span class="float-left">
                                        <strong>1439$</strong>
                                    </span>
                                    <span class="float-right">

                                        <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Cart">
                                            <i class="fas fa-shopping-cart ml-3"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>

            </div>
            <!--Second slide-->

            <!--Third slide-->
            <div class="carousel-item active">

                <div class="col-md-4 mb-4">

                    <!--Card-->
                    <div class="card card-ecommerce">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="{{asset('images/product/1622345382ProductId9ImageId2.png')}}" class="img-fluid" alt="">
                            <a>
                                <div class="mask rgba-white-slight waves-effect waves-light"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <!--Category & Title-->

                            <h5 class="card-title mb-1">
                                <strong>
                                    <a href="" class="dark-grey-text">Samsung</a>
                                </strong>
                            </h5>
                            <span class="badge badge-danger mb-2">bestseller</span>


                            <!--Card footer-->
                            <div class="card-footer pb-0">
                                <div class="row mb-0">
                                    <span class="float-left">
                                        <strong>1439$</strong>
                                    </span>
                                    <span class="float-right">

                                        <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Cart">
                                            <i class="fas fa-shopping-cart ml-3"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>

                <div class="col-md-4 clearfix d-none d-md-block mb-4">

                     <!--Card-->
                     <div class="card card-ecommerce">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="{{asset('images/product/1621418112ProductId2ImageId0.png')}}" class="img-fluid" alt="">
                            <a>
                                <div class="mask rgba-white-slight waves-effect waves-light"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <!--Category & Title-->

                            <h5 class="card-title mb-1">
                                <strong>
                                    <a href="" class="dark-grey-text">Sony</a>
                                </strong>
                            </h5>
                            <span class="badge badge-danger mb-2">bestseller</span>


                            <!--Card footer-->
                            <div class="card-footer pb-0">
                                <div class="row mb-0">
                                    <span class="float-left">
                                        <strong>1439$</strong>
                                    </span>
                                    <span class="float-right">

                                        <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Cart">
                                            <i class="fas fa-shopping-cart ml-3"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>

                <div class="col-md-4 clearfix d-none d-md-block mb-4">

                     <!--Card-->
                     <div class="card card-ecommerce">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="{{asset('images/product/1622345779ProductId10ImageId0.png')}}" class="img-fluid" alt="">
                            <a>
                                <div class="mask rgba-white-slight waves-effect waves-light"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <!--Category & Title-->

                            <h5 class="card-title mb-1">
                                <strong>
                                    <a href="" class="dark-grey-text">VIVO</a>
                                </strong>
                            </h5>
                            <span class="badge badge-danger mb-2">bestseller</span>


                            <!--Card footer-->
                            <div class="card-footer pb-0">
                                <div class="row mb-0">
                                    <span class="float-left">
                                        <strong>1439$</strong>
                                    </span>
                                    <span class="float-right">

                                        <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Cart">
                                            <i class="fas fa-shopping-cart ml-3"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>

            </div>
            <!--Third slide-->
            {{-- @endforeach --}}
        </div>
        <!--Slides-->

    </div>
    <!--Carousel Wrapper-->

</section>
@endsection
