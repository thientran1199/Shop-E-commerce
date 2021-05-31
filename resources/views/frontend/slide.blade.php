 <!--Carousel Wrapper-->
 <div id="carousel-example-1z" class="carousel slide carousel-fade slide-show" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
        @foreach($slides as $key => $slide)
         @if($key == 0)
         <li data-target="#carousel-example-1z" data-slide-to="{{$slide}}" class="active"></li>
         @else
        <li data-target="#carousel-example-1z" data-slide-to="{{$slide}}"></li>
        @endif
        @endforeach
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        @foreach($slides as $key => $slide)
            @if($key == 0)
        <!--First slide-->
        <div class="carousel-item active">
            <div class="view h-100">
                <img class="d-block h-100 w-lg-100" src="{{asset('images/slide/'.$slide->name)}}" alt="slide{{$slide->id}}">
                <div class="mask">
                    <!-- Caption -->
                    <div class="full-bg-img flex-center white-text">
                        <ul class="animated fadeIn col-10 list-unstyled">
                            <li>
                                <p class="h1 red-text mb-4 mt-5">
                                    <strong>Sale off 30% on every saturday!</strong>
                                </p>
                            </li>
                            <li>
                                <h5 class="h5-responsive dark-grey-text font-weight-bold mb-5">Tempora incidunt ut labore et dolore veritatis et quasi architecto beatae</h5>
                            </li>
                            <li>
                                <a target="_blank" href="#" class="btn btn-danger btn-rounded" rel="nofollow">See more!</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.Caption -->
                </div>
            </div>
        </div>
        @else
        <!--/First slide-->
        <div class="carousel-item">
            <div class="view h-100">
                <img class="d-block h-100 w-lg-100" src="{{asset('images/slide/'.$slide->name)}}" alt="slide{{$slide->id}}">
                <div class="mask">
                    <!-- Caption -->
                    <div class="full-bg-img flex-center white-text">
                        <ul class="animated fadeIn col-10 list-unstyled">
                            <li>
                                <p class="h1 red-text mb-4 mt-5">
                                    <strong>Sale off 30% on every saturday!</strong>
                                </p>
                            </li>
                            <li>
                                <h5 class="h5-responsive dark-grey-text font-weight-bold mb-5">Tempora incidunt ut labore et dolore veritatis et quasi architecto beatae</h5>
                            </li>
                            <li>
                                <a target="_blank" href="#" class="btn btn-danger btn-rounded" rel="nofollow">See more!</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.Caption -->
                </div>
            </div>
        </div>

        @endif
        @endforeach

    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
@section('js')
<script type="text/javascript">
	$(function(){
		/*slide product hơi cùi*/
		/*list sale*/
		$('.button-sale .button-left').click(function(){
			var left = parseFloat($('.list-sale').css('left'));
			left+=230;
			if(left>0){
				left = 0;
			}
			$('.list-sale').css('left',left);
		});
		$('.button-sale .button-right').click(function(){
			var limit = parseFloat($('.list-sale').css('width')) -parseFloat($('.slider').css('width')) ;
			var left = parseFloat($('.list-sale').css('left'));
			left-=230;
			if(left<-limit-230){
				left=0;
			}
			$('.list-sale').css('left',left);
		});
		/*list latest same*/
		$('.button-latest .button-left').click(function(){
			var left = parseFloat($('.list-latest').css('left'));
			left+=230;
			if(left>0){
				left = 0;
			}
			$('.list-latest').css('left',left);
		});
		$('.button-latest .button-right').click(function(){
			var limit = parseFloat($('.list-latest').css('width')) -parseFloat($('.slider').css('width')) ;
			var left = parseFloat($('.list-latest').css('left'));
			left-=230;
			if(left<-limit-230){
				left=0;
			}
			$('.list-latest').css('left',left);
		});
		var intervalLastest =  setInterval(function(){
			$('.button-latest .button-right').click();
		},5000);
	});
</script>
@endsection
