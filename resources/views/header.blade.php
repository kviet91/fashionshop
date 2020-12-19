<!-- HEADER -->
<header> <!--HOME -->
    <!-- top Header -->
    <div id="top-header">
        <div class="container">
            <div class="pull-left">
                <span>Chào mừng bạn đến với E-Shop!</span>
            </div>
            <div class="pull-right">
                <ul class="header-top-links">
                    <li class="dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">VIE<i
                                    class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <li><a href="#">TIẾNG VIỆT (VIE)</a></li>
                            <li><a href="#"></a>ENGLISH (ENG)</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /top Header -->

    <!-- header -->
    <div id="header">
        <div class="container">
            <div class="pull-left">
                <!-- Logo -->
                <div class="header-logo">
                    <a class="logo" href="#">
                        <img src="source/img/logo.png" alt="" style="width: 100px">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Search -->
                <div class="header-search" style="text-align: center">
                    <form role="search" action="{{route('search')}}" method="get">
                        <input class="input search-input" name="key" type="text" placeholder="Tìm kiếm sản phẩm">
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
            </div>
            <div class="pull-right">
                <ul class="header-btns">
                    <!-- Account -->
                    <li class="header-account dropdown default-dropdown" style="width: 250px; margin-right: -50px">
                        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-user-o"></i>
                            </div>
                            <strong class="text-uppercase">Tài Khoản<i class="fa fa-caret-down"></i></strong>
                        </div>
                        <a href="{{route('login')}}" class="text-uppercase" style="font-size: 12px">Đăng Nhập</a> / <a
                                href="{{route('register')}}" class="text-uppercase" style="font-size: 12px">Đăng Ký</a>
                        <ul class="custom-menu">
                            @if (Route::has('login'))
                                @auth
                                    @if(Auth::user()->status == 0)
                                        <li><a href="{{ url('/home') }}"><i
                                                        class="fa fa-user-o"></i>{{ Auth::user()->username }}
                                                (guest)</a></li>
                                        <li><a href="{{ route('getprofile', [Auth::user()->id]) }}"><i
                                                        class="fa fa-unlock-alt"></i> Đổi Mật Khẩu</a></li>
                                    @elseif(Auth::user()->status == 1)
                                        <li><a href="{{ url('/home') }}"><i
                                                        class="fa fa-user-o"></i>{{ Auth::user()->username }}
                                                (admin)</a></li>
                                        <li><a href="{{ route('getprofile', [Auth::user()->id]) }}"><i
                                                        class="fa fa-unlock-alt"></i> Đổi Mật Khẩu</a></li>
                                    @endif
                                @endauth
                            @endif

                            @if (Route::has('login'))
                                @auth
                                    @if(Auth::check())
                                        <li><a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="fa fa-exchange"></i> Đăng Xuất</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    @endif
                                @endauth
                            @endif

                        </ul>
                    </li>
                    <!-- /Account -->

                    <!-- Cart -->
                    @if(Session::has('cart'))
                        <li class="header-cart dropdown default-dropdown" style="width:180px; margin-right: -40px">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="qty">{{$totalQty}}</span>
                                </div>
                                <strong class="text-uppercase">Giỏ Hàng</strong>
                                <br>
                                <span>{{number_format($totalPrice)}} đồng</span>
                            </a>
                            <div class="custom-menu">
                                <div id="shopping-cart">
                                    <div class="shopping-cart-list">
                                        @foreach($product_cart as $product)
                                            <div class="product product-widget">
                                                <div class="product-thumb">
                                                    <img src="source/img/{{$product['item']['img_link']}}" alt=""
                                                         height="50px" width="50px">
                                                </div>
                                                <div class="product-body">
                                                    @if($product['item']['discount'])
                                                        <h3 class="product-price">{{number_format($product['item']['price']- $product['item']['price'] * $product['item']['discount'])}}
                                                            đ<span class="qty"> x {{$product['qty']}}</span></h3>
                                                    @else
                                                        <h3 class="product-price">{{number_format($product['item']['price'])}}
                                                            đ<span class="qty"> x {{$product['qty']}}</span></h3>
                                                    @endif
                                                    <h2 class="product-name">{{$product['item']['name']}}<a
                                                                href="#"></a></h2>
                                                </div>
                                                <a href="{{route('delcart', $product['item']['id'])}}">
                                                    <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="shopping-cart-btns">
                                        <a href="{{route('checkout')}}">
                                            <button class="primary-btn" style="margin-left: 60px">Thanh Toán <i
                                                        class="fa fa-arrow-circle-right"></i></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="header-cart dropdown default-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="qty">0</span>
                                </div>
                                <strong class="text-uppercase">Giỏ Hàng</strong>
                                <br>
                                <span>0 đ</span>
                            </a>
                        </li>
                @endif

                <!-- /Cart -->

                    <!-- Mobile nav toggle-->
                    <li class="nav-toggle">
                        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                    </li>
                    <!-- / Mobile nav toggle -->
                </ul>
            </div>
        </div>
        <!-- header -->
    </div>
    <!-- container -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<div id="navigation">
    <!-- container -->
    <div class="container">
        <div id="responsive-nav">
            <!-- menu nav -->
            <div class="menu-nav">
                <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                <ul class="menu-list">
                    <li><a href="{{route('index')}}">Trang Chủ</a></li>
                    <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                                             aria-expanded="true">Đồ Nam <i
                                    class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            @foreach($catalog as $cl)
                                @if($cl->parent_catalog_id == 1 )
                                    <li><a href="{{route('product', $cl->id)}}">{{$cl->name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                                             aria-expanded="true">Đồ Nữ <i class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            @foreach($catalog as $cl)
                                @if($cl->parent_catalog_id == 2 )
                                    <li><a href="{{route('product', $cl->id)}}">{{$cl->name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('product', 3)}}">Trẻ Em</a></li>
                    <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                                             aria-expanded="true">Phụ Kiện <i
                                    class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            @foreach($catalog as $cl)
                                @if($cl->parent_catalog_id == 4 )
                                    <li><a href="{{route('product', $cl->id)}}">{{$cl->name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('sale')}}">Giảm Giá</a></li>
                    <li><a href="{{ route('about-us') }}">Giới Thiệu</a></li>
                </ul>
            </div>
            <!-- menu nav -->
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /NAVIGATION -->