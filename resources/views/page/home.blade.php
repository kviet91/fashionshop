@extends('master')
@section('content')

    <!-- HOME -->
    <div id="home">
        <!-- container -->
        <div class="container">
            <!-- home wrap -->
            <div class="home-wrap">
                <!-- home slick -->
                <div id="home-slick">
                    <!-- banner -->
                    @foreach($slide as $slide)
                        <div class="banner banner-1">
                            <img src="{{ asset('source/img/slide/') }}/{{ $slide->img_link }}" alt="">
                            <div class="banner-caption text-center">
                                <h1 style="color:#007bff">{{ $slide->description }}</h1>


                            </div>

                        </div>

                @endforeach
                <!-- /home slick -->
                </div>
                <!-- /home wrap -->
            </div>
            <!-- /container -->
        </div>
        <!-- /HOME -->

        <!-- section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- section-title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Sản Phẩm Giảm Giá</h2>
                            <div class="pull-right">
                                <div class="product-slick-dots-1 custom-dots"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /section-title -->

                    <!-- banner -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="banner banner-2">
                            <img src="source/img/banner14.jpg" alt="">
                            <div class="banner-caption">
                                <h2 class="white-color">BIG SALE<br>COLLECTION</h2>

                            </div>
                        </div>
                    </div>
                    <!-- /banner -->

                    <!-- Product Slick -->
                    <div class="col-md-9 col-sm-6 col-xs-6">
                        <div class="row">
                            <div id="product-slick-1" class="product-slick">
                                <!-- Product Single -->
                                @foreach($sale as $row)
                                    <div class="product product-single">
                                        <div class="product-thumb">
                                            <div class="product-label">
                                                <?php
                                                $price = ($row->price) - ($row->discount) * ($row->price);
                                                $old_price = $row->price;
                                                ?>
                                                @if($row->status==1)
                                                    <span>NEW</span>
                                                @endif
                                                <span class="sale">-{{ $row->discount * 100 }}%</span>
                                            </div>

                                            <img src="{{ asset('source/img') }}/{{ $row->img_link }}" alt=""
                                                 style="height: 395px; width: 263px">
                                        </div>
                                        <div class="product-body">
                                            @if($row->discount!=0)
                                                <h3 class="product-price">{{ number_format($price) }}
                                                    <del class="product-old-price"> {{ number_format($old_price) }}</del>
                                                </h3>
                                            @else
                                                <h3 class="product-price">{{ number_format($old_price) }}</h3>
                                            @endif
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o empty"></i>
                                            </div>
                                            <h2 class="product-name"><a
                                                        href="{{route('detail', $row->id)}}">{{ $row->name }}</a></h2>
                                            @if(($row->count - $row->count_buy)!=0)
                                                <div class="product-btns">
                                                    <a href="{{route('addcart', $row->id)}}">
                                                        <button class="primary-btn add-to-cart"><i
                                                                    class="fa fa-shopping-cart"></i> Mua Hàng
                                                        </button>
                                                    </a>
                                                </div>
                                            @else
                                                <div class="product-btns">
                                                    <a href="{{route('index')}}">
                                                        <button class="primary-btn add-to-cart disabled"><i
                                                                    class="fa fa-shopping-cart"></i> Mua Hàng
                                                        </button>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                            @endforeach
                            <!-- /Product Single -->


                            </div>
                        </div>
                    </div>
                    <!-- /Product Slick -->
                </div>
                <!-- /row -->

                <!-- row -->
                <div class="row">
                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Sản Phẩm Mới</h2>
                            <div class="pull-right">
                                <div class="product-slick-dots-2 custom-dots">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section title -->
                    <!-- banner -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="banner banner-2">
                            <img src="source/img/banner15.jpg" alt="">
                            <div class="banner-caption">
                                <h2 class="white-color" style="color:white;">NEW<br>COLLECTION</h2>

                            </div>
                        </div>
                    </div>
                    <!-- /banner -->
                    <!-- Product Slick -->
                    <div class="col-md-9 col-sm-6 col-xs-6">
                        <div class="row">

                            <div id="product-slick-2" class="product-slick">
                            @foreach($new as $row)
                                <!-- Product Single -->
                                    <div class="product product-single">
                                        <div class="product-thumb">
                                            <div class="product-label">
                                                <?php
                                                $price = ($row->price) - ($row->discount) * ($row->price);
                                                $old_price = $row->price;
                                                ?>
                                                @if($row->status==1)
                                                    <span>NEW</span>
                                                @endif
                                                @if($row->discount!=0)
                                                    <span class="sale">-{{ $row->discount * 100 }}%</span>
                                                @endif

                                            </div>
                                            <img src="{{ asset('source/img') }}/{{ $row->img_link }}" alt=""
                                                 style="height: 395px; width: 263px">
                                        </div>
                                        <div class="product-body">

                                            @if($row->discount!=0)
                                                <h3 class="product-price">{{ number_format($price) }}
                                                    <del class="product-old-price"> {{ number_format($old_price) }}</del>
                                                </h3>
                                            @else
                                                <h3 class="product-price">{{ number_format($old_price) }}</h3>
                                            @endif
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o empty"></i>
                                            </div>
                                            <h2 class="product-name"><a
                                                        href="{{route('detail',$row->id)}}">{{ $row->name }}</a></h2>
                                            @if(($row->count - $row->count_buy)!=0)
                                                <div class="product-btns">
                                                    <a href="{{route('addcart', $row->id)}}">
                                                        <button class="primary-btn add-to-cart"><i
                                                                    class="fa fa-shopping-cart"></i> Mua Hàng
                                                        </button>
                                                    </a>
                                                </div>
                                            @else
                                                <div class="product-btns">
                                                    <a href="{{route('index')}}">
                                                        <button class="primary-btn add-to-cart disabled"><i
                                                                    class="fa fa-shopping-cart"></i> Mua Hàng
                                                        </button>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /Product Single -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /Product Slick -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->

        <!-- section -->
        <div class="section">
            <!-- container -->
            <div class="container">

                <div class="row">
                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Có Thể Bạn Thích</h2>
                        </div>
                    </div>
                    <!-- section title -->

                    <!-- Product Single -->
                    @foreach($pick as $row)
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <?php
                                        $price = ($row->price) - ($row->discount) * ($row->price);
                                        $old_price = $row->price;
                                        ?>
                                        @if($row->status==1)
                                            <span>NEW</span>
                                        @endif
                                        @if($row->discount!=0)
                                            <span class="sale">-{{ $row->discount * 100 }}%</span>
                                        @endif
                                    </div>
                                    <img src="{{ asset('source/img') }}/{{ $row->img_link }}" alt=""
                                         style="height: 395px; width: 263px">
                                </div>
                                <div class="product-body">
                                    @if($row->discount!=0)
                                        <h3 class="product-price">{{ number_format($price) }}
                                            <del class="product-old-price"> {{ number_format($old_price) }}</del>
                                        </h3>
                                    @else
                                        <h3 class="product-price">{{ number_format($old_price) }}</h3>
                                    @endif
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                    <h2 class="product-name"><a href="{{route('detail',$row->id)}}">{{ $row->name }}</a>
                                    </h2>
                                    @if(($row->count - $row->count_buy)!=0)
                                        <div class="product-btns">
                                            <a href="{{route('addcart', $row->id)}}">
                                                <button class="primary-btn add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i> Mua Hàng
                                                </button>
                                            </a>
                                        </div>
                                    @else
                                        <div class="product-btns">
                                            <a href="{{route('index')}}">
                                                <button class="primary-btn add-to-cart disabled"><i
                                                            class="fa fa-shopping-cart"></i> Mua Hàng
                                                </button>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                @endforeach
                <!-- /Product Single -->


                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
    </div>
    <!-- /section -->
@endsection
