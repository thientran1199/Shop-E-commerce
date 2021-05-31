<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @yield('title')
    {{-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    rel="stylesheet" />

    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css') }}"> --}}

    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/css/cart.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/css/all.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/css/hotline.css') }}" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="{{asset('frontend/css/mdb.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <style>
    .range-price input[type=radio]:checked + span {
        color: rgb(0, 60, 255);;
        font-weight: bold;

    }
    label.border.rounded {
        background-color: aliceblue;
    }
    #myBtn {
  display: none; /* Hidden by default */
  position: fixed; /* Fixed/sticky position */
  bottom: 20px; /* Place the button at the bottom of the page */
  right: 30px; /* Place the button 30px from the right */
  z-index: 99; /* Make sure it does not overlap */
  border: none; /* Remove borders */
  outline: none; /* Remove outline */
  background-color: red; /* Set a background color */
  color: white; /* Text color */
  cursor: pointer; /* Add a mouse pointer on hover */
  padding: 15px; /* Some padding */
  border-radius: 10px; /* Rounded corners */
  font-size: 18px; /* Increase font size */
}

#myBtn:hover {
  background-color: #555; /* Add a dark-grey background on hover */
}
  	</style>
</head>

<body class="homepage-v2 hidden-sn white-skin animated" >

    @include('frontend.header')
    {{-- <div class="main {{(request()->is('/')) ? '' : 'slide-show' }}"> --}}
    @include('frontend.slide')
    {{-- @include((request()->is('/')) ? '' : 'slide' ) --}}
     @include('frontend.menu')

    <!-- /.Main Container -->
    <div class="container">
        @if(session('msg'))
        <div class="alert1 alert alert-{{session('typeMsg')}} alert-dismissible text-center mt-1" style="position: absolute;right: 0;z-index: 5">{{ session('msg') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif
       @yield('content')

    </div>
    <!-- /.Main Container -->


    @include('frontend.footer')
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "105526577818454");
        chatbox.setAttribute("attribution", "biz_inbox");
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>


    <!-- scroll về top -->
    {{-- <button id="scroll-top" class="btn"><i class="fas fa-angle-double-up"></i></button>
     --}}
     <div class="hotline-phone-ring-wrap">
        <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
            <a href="tel:0775275597"  class="pps-btn-img">
                <img src="{{ asset('images/logoWEB/icon-call-nh.png')}}" alt="Gọi điện thoại" width="50">
            </a>
            </div>
        </div>
        <div class="hotline-bar">
            <a  style="text-decoration: none" href="tel:0775275597">
                <span class="text-hotline">0775275597</span>
            </a>
        </div>
    </div>
     <button onclick="topFunction()" id="myBtn"  style="margin-right: 61px;" title="Go to top">Top</button>
    <!-- SCRIPTS -->
    <script type="text/javascript">
            //Get the button:
        mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
   <!-- JQuery -->
   {{-- <script type="text/javascript" src="{{asset('frontend/js/jquery-3.3.1.min.js') }}"></script> --}}
   <script type="text/javascript" src="{{asset('frontend/js/jquery-3.2.1.min.js') }}"></script>

   <!-- Bootstrap tooltips -->
   <script type="text/javascript" src="{{asset('frontend/js/popper.min.js') }}"></script>

   <!-- Bootstrap core JavaScript -->
   <script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js') }}"></script>

   <!-- MDB core JavaScript -->
   <script type="text/javascript" src="{{asset('frontend/js/mdb.min.js') }}"></script>

   <script type="text/javascript">
    /* WOW.js init */
    new WOW().init();

    // Tooltips Initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script>
    // Material Select Initialization
    $(document).ready(function () {
        $('.mdb-select').material_select();
    });
</script>
{{-- <script>
    // MDB Lightbox Init
    $(function () {
        $("#mdb-lightbox-ui").load("../../mdb-addons/mdb-lightbox-ui.html");
    });
</script> --}}
<script>
    function reload(){
        window.location.reload();
    }
</script>
<script>
        // SideNav Initialization
        $(".button-collapse").sideNav();
</script>
<script type="text/javascript">
    $(function(){
          $('.carousel').carousel({
          interval: 2000
        });
        $('.dropdown-toggle').dropdown();
        /*load lại trang*/
          if(performance.navigation.type == 2){
           location.reload(true);
           $(this).scrollTop(0);
        }
        $('#myBtn-top').click(function(){
            $(window).scrollTop(0);
        });
        window.setTimeout(function() {
            $(".alert").fadeOut(2000);
            $(".alert").setTimeout(function(){
                $(this).remove();
            });
        }, 3000);
    });

    function addCartItem(id){
        var quantity = 1;
        if($('.quantity'+id)[0]) quantity = $('.quantity'+id).val();
        $.ajax({
            url : 'addCartItem/'+id +'/',
            type : 'GET'
        }).done(function(response){
            $(".add-cart"+id).empty();
            $(".add-cart"+id).html("<i class='fas fa-check'></i>Đã thêm vào giỏ").attr({'class':'alert1 alert alert-dismissible text-center mt-1 add-cart'+id,'href':'javascript:void(0);'});
            $('.mini-cart').empty();
            $('.mini-cart').html(response);
            $('.total-quantity').text($('.total-quantity-hidden').val());
        });
    }
    function deleteCartItem(id){
        $.ajax({
            url : 'deleteCartItem/'+id,
            type : 'GET'
        }).done(function(response){
            $(".add-cart"+id).empty();
            $(".add-cart"+id).html("<i class='fas fa-cart'></i>").attr({'class':' add-cart'+id,'href':"javascript: addCartItem("+id+");"});
            $('.mini-cart').empty();
            $('.mini-cart').html(response);
            $('.total-quantity').text(($('.total-quantity-hidden')[0]) ? $('.total-quantity-hidden').val():'');
        });
    }
    function updateCartItem(id){
        $.ajax({
            url : 'updateCartItem/'+id+'/'+$('.quantity'+id).val(),
            type : 'get'
        }).done(function(response){
            if ($('.quantity'+id).val()<=0) {
                $(".add-cart"+id).empty();
                $(".add-cart"+id).html("<i class='fas fa-cart-plus'></i> Thêm vào giỏ").attr({'class':'btn btn-danger add-cart'+id,'href':"javascript: addCartItem("+id+");"});
            }
            $('.mini-cart').empty();
            $('.mini-cart').html(response);
            $('.total-quantity').text($('.total-quantity-hidden').val());
        });
    }
    /*số lượng cho ô nhập giỏ hàng*/
    function quantityCart(id){
    var value = $('.quantity'+id).val();
    value = value.replace(/[^0-9]/img,"");
    $('.quantity'+id).val(value);
    var max =parseInt($('.quantity'+id).attr('max'));
    if(value>max) $('.quantity'+id).val(max);
    }


</script>


</body>

</html>
