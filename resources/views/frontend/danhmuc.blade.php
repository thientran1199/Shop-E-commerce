 <!-- Section: Intro -->
 <section class="section pt-4">

    <!-- Grid row -->
    <div class="row">

        <!--Grid column-->
        <div class="col-lg-8 col-md-12 mb-3 pb-lg-2">
            <!--Image -->
            <div class="view zoom  z-depth-1">

                <img src="{{asset('frontend/img/Photos/Orthers/product1.jpg') }}" class="img-fluid" alt="sample image">
                <div class="mask rgba-white-light">
                    <div class="dark-grey-text d-flex align-items-center pt-3 pl-4">
                        <div>
                            <a><span class="badge badge-danger">bestseller</span></a>
                            <h2 class="card-title font-weight-bold pt-2"><strong>This is news title</strong></h2>
                            <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                            <a class="btn btn-danger btn-sm btn-rounded clearfix d-none d-md-inline-block">Read more</a>
                        </div>
                    </div>
                </div>

            </div>
            <!--Image -->
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-12 mb-4">

            <!-- Section: Categories -->
            <section class="section">
                <?php
                    $categories = DB::table('category')->get();
                    $productsSell = DB::table('product')->join('order_item','product.id','=','order_item.product_id')->join('order','order.id','=','order_item.order_id')->where('order.status','Đã nhận hàng')->get();
                ?>

                <ul class="list-group z-depth-1">
                    @foreach($categories as $category)
                    <?php 
                        $count = DB::table('product')->where([['category_id','=',$category->id],['enabled',1]])->count();
                        $urlid = request()->get('category');
                    ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center 
                        {{($urlid==$category->id)? 'list-group-item-secondary' :''}}">
                        <a class="dark-grey-text font-small {{($urlid==$category->id)? 'text-danger' :''}}" 
                            href="{{url('/product?category='.$category->id)}}" style="text-decoration: none; color: black;">
                            <i class="fas fa-laptop dark-grey-text mr-2" aria-hidden="true"></i> {{$category->name}}</a>
                        <a href=""></a><span class="badge badge-danger badge-pill">{{$count}}</span></a>
                    </li>
                    @endforeach
                </ul>
            </section>
            <!-- Section: Categories -->

        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

</section>
<!-- Section: Intro -->
<script type="text/javascript">
	$(function(){
		$('.category').click(function(){
			$('.category_block').toggleClass('d-none d-md-block');
			$('.category tr td:last-child i').toggleClass('fa-angle-up').toggleClass('fa-angle-down');
		});
		$('.list-hot').click(function(){
			$('.list-hot-block').toggleClass('d-none d-md-block');
			$('.list-hot tr td:last-child i').toggleClass('fa-angle-up').toggleClass('fa-angle-down');
		});
	});
</script>
