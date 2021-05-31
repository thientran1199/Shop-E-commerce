    <!--Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg  navbar-light scrolling-navbar white">
            <div class="container">
                <!-- SideNav slide-out button -->
                {{-- <div class="float-left mr-2">
                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
                </div> --}}
                <a class="navbar-brand font-weight-bold" href="{{url('/') }}"><strong>SHOP</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item ">
                            <a class="nav-link dark-grey-text font-weight-bold {{(request()->is(['cart','order'])) ? 'd-none' : '' }}" href="#" data-toggle="modal" data-target="#cart-modal-ex">
                                <span class="badge danger-color">{{session()->has('cart') ? session('cart')->getTotalQuantity():''}}</span>
                                <i class="fas fa-shopping-cart blue-text" aria-hidden="true"></i>
                                <span class="clearfix d-none d-sm-inline-block">Cart</span>
                            </a>
                        </li>

                        <li class="nav-item ml-3">
                            <a class="nav-link dark-grey-text font-weight-bold" href="{{url('/contact') }}"><i class="fas fa-envelope blue-text"></i> Contact <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown ml-3">
                            <a class="nav-link dropdown-toggle dark-grey-text font-weight-bold" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="fas fa-user blue-text"></i>{{(Auth::guard('account_customer')->check())?Auth::guard('account_customer')->user()->username:'Profile'}}</a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">

                                @if(!(Auth::guard('account_customer')->check()))
                                <a class="dropdown-item waves-effect waves-light" href="{{url('/login')}}">Login</a>
                                <a class="dropdown-item waves-effect waves-light" href="{{url('signup')}}">Signup</a>
                                @else
                                <a class="dropdown-item waves-effect waves-light" href="{{url('/customer/profile')}}"><i class="fas fa-id-card-alt"></i>Profile</a>
                                <a class="dropdown-item waves-effect waves-light" href="{{url('/logout')}}"><i class="fas fa-sign-out-alt"></i>Logout</a>

						        {{-- <a class="dropdown-item" href="{{url('/logout')}}" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a> --}}
                                @endif
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.Navbar -->

    </header>
    <!-- /.Navigation -->
    <!-- Cart Modal -->
    @include('frontend.cart.minicart')

    <!-- /.Cart Modal -->
    <script type="text/javascript">
        $(function(){
            $('.button-mini-cart').click(function(){
            $('.mini-cart').slideToggle();
                });
            /*$('.dropdown-toggle').dropdown();*/
            $('.navbar-toggler').click(function(){
                $('.menu_header').slideToggle();
            });
            // $('#key').change(function(){
            // 	var hrefValue = $('#search').attr('href')+'?search='+$(this).val();
            // 	$('#search').attr('href',hrefValue);
            // });
        });

    </script>
