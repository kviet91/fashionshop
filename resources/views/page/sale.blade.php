@extends('master')
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Trang chủ</a></li>
                <li class="active">Sản phẩm giảm giá</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- MAIN -->
                <div id="main" class="col-md-12">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="pull-left">
                            <div class="sort-filter">
                                <span class="text-uppercase">Sắp xếp:</span>
                                <select class="input">
                                    <option value="0">Giá</option>
                                    <option value="0">Giảm giá</option>
                                    <option value="0">Yêu thích</option>
                                </select>
                                <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
                            </div>
                        </div>
                        <div class="pull-right">
                            <div class="page-filter">
                                <span class="text-uppercase">Xem theo:</span>
                                <select class="input">
                                    <option value="0">10</option>
                                    <option value="1">20</option>
                                    <option value="2">30</option>
                                </select>
                            </div>
                            <ul class="store-pages">
                                <li><span class="text-uppercase">Page:</span></li>
                                <li class="active">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /store top filter -->

                    <!-- MAIN -->
                    <!-- STORE -->
                    <div id="store">
                        <!-- row -->
                        <div class="row">
                            <div class="text-lg-left" style="margin-left: 30px; margin-top: 30px; ">
                                <p class="pull-left">Tìm thấy {{count($sale)}} sản phẩm</p>
                            </div>
                        </div>
                        <div class="row" style="margin-left: 10px; margin-bottom: 10px; ">
                            <!-- Product Single -->
                            @foreach($sale as $row)
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
                                            <h2 class="product-name"><a
                                                        href="{{route('detail',$row->id)}}">{{ $row->name }}</a>
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
                        <!-- store top filter -->
                        <div class="store-filter clearfix">
                            <div class="pull-left">
                                <div class="sort-filter">
                                    <span class="text-uppercase">Sắp xếp:</span>
                                    <select class="input">
                                        <option value="0">Giá</option>
                                        <option value="0">Giảm giá</option>
                                        <option value="0">Yêu thích</option>
                                    </select>
                                    <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="page-filter">
                                    <span class="text-uppercase">Xem theo:</span>
                                    <select class="input">
                                        <option value="0">10</option>
                                        <option value="1">20</option>
                                        <option value="2">30</option>
                                    </select>
                                </div>
                                <ul class="store-pages">
                                    <li><span class="text-uppercase">Page:</span></li>
                                    <li class="active">1</li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /store top filter -->
                        <div class="row" style="height: 20px; margin-left: 50% ">{{ $sale->links() }}</div>
                        <!-- /STORE -->
                    </div>
                    <!-- /MAIN -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
    </div>
    <!-- /section -->
@endsection