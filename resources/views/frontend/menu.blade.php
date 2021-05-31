<!-- Mega menu -->
<div class="container-fluid mx-0 px-0">

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark primary-color mb-5">
        <div class="container">

            <!-- Navbar brand -->
            <a class="font-weight-bold white-text mr-4" href="{{url('/') }}">Home</a>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">

                <!-- Links -->
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link font-weight-bold white-text" href="{{url('/product') }}">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold white-text" href="{{url('/cart') }}">Cart</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link font-weight-bold white-text" href="checkout.html">Checkout</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link font-weight-bold white-text" href="{{url('/contact') }}">Contact</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link font-weight-bold white-text" href="product_detail.html">P-Detail</a>
                </li> --}}
                <!-- <li class="nav-item dropdown mega-dropdown ">
                    <a class="nav-link dropdown-toggle   font-weight-bold white-text  no-caret" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Product</a>
                    <div class="dropdown-menu mega-menu v-2 row z-depth-1 white" aria-labelledby="navbarDropdownMenuLink1">
                        <div class="row mx-md-4 mx-1">
                            <div class="col-md-6 col-xl-3 sub-menu my-xl-5 mt-5 mb-4">
                                <h6 class="sub-title text-uppercase font-weight-bold blue-text">Brand</h6>
                                <ul class="caret-style pl-0">
                                    <li class=""><a class="menu-item mb-0" href="">Sony</a></li>
                                    <li class=""><a class="menu-item" href="">Lenovo</a></li>
                                    <li class=""><a class="menu-item" href="">Apple</a></li>
                                    <li class=""><a class="menu-item" href="">Dell</a></li>
                                    <li class=""><a class="menu-item" href="">Asus</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-xl-3 sub-menu my-xl-5 mt-md-5 mt-4 mb-4">
                                <h6 class="sub-title text-uppercase font-weight-bold blue-text">Sales</h6>
                                <ul class="caret-style pl-0">
                                    <li class=""><a class="menu-item" href="">Laptops Up to 50% Off </a></li>
                                    <li class=""><a class="menu-item" href="">Laptops under $399</a></li>
                                    <li class=""><a class="menu-item" href="">Laptops Up to 50% Off</a></li>
                                    <li class=""><a class="menu-item" href="">Laptops for designers</a></li>
                                    <li class=""><a class="menu-item" href="">Laptops for developers</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </li> -->
            </ul>
            <!-- Links -->

                <!-- Search form -->
                <form class="search-form" role="search">
                    <div class="form-group md-form my-0 waves-light">
                        <input type="text" name="key" class="form-control"  aria-label="Search" required placeholder="Search">
                    </div>
                </form>
                </div>
            <!-- Collapsible content -->
        </div>
    </nav>
    <!--/.Navbar-->

</div>
<!-- /Mega menu -->
