@extends('master')
@section('content')
    @include('admin.notify')
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!--  Product Details -->
                <div class="product product-details clearfix">
                    <div class="col-md-6">
                        <div id="product-main-view">
                            @foreach($img as $im)
                                <div class="product-view">
                                    <img src="{{ asset('source/img') }}/{{ $im->img_link }}" alt=""
                                         style="height: 400px; width: 350px">
                                </div>
                            @endforeach
                        </div>

                        <div id="product-view">
                            @foreach($img as $im)
                                <div class="product-view">
                                    <img src="{{ asset('source/img/') }}/{{ $im->img_link }}" alt=""
                                         style="width: 100px; height: 100px">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-body">
                            <div class="product-label">
                                @if($detail->status==1)
                                    <span>New</span>
                                @endif
                                <span class="sale">-{{ ($detail->discount)*100 }}%</span>
                            </div>
                            <h2 class="product-name">{{ $detail->name }}</h2>
                            <?php
                            $var = ($detail->price) - ($detail->discount) * ($detail->price);
                            ?>
                            <h3 class="product-price">{{ number_format($var) }}
                                <del class="product-old-price"> {{ number_format($detail->price) }}</del>
                            </h3>
                            <div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                                <p>{{ sizeof($cm) }} Đánh giá </p>
                            </div>
                            @if(($detail->count - $detail->count_buy)!=0)
                                <p><strong>Trạng thái:</strong> Còn hàng</p>
                                <form method="get" action="{{ route('addcart-product-detail', $detail->id) }}">
                                    @csrf
                                    <div class="product-btns">
                                        <div class="qty-input">
                                            <span class="text-uppercase">Số lượng: </span>
                                            <input class="input " name="q" type="number" min="0"
                                                   max="{{ $detail->count - $detail->count_buy }}" value="0">
                                        </div>
                                        <button class="primary-btn add-to-cart disabled " type="submit"><i
                                                    class="fa fa-shopping-cart"></i> Thêm vào giỏ
                                        </button>

                                    </div>
                                </form>
                            @else
                                <p><strong>Trạng thái:</strong> Hết hàng</p>
                                <form method="get" action="{{ route('index') }}">
                                    @csrf
                                    <div class="product-btns">
                                        <div class="qty-input">
                                            <span class="text-uppercase">Số lượng: </span>
                                            <input class="input " name="q" type="number" min="0"
                                                   max="{{ $detail->count - $detail->count_buy }}" value="0">
                                        </div>
                                        <button class="primary-btn add-to-cart disabled " type="submit"><i
                                                    class="fa fa-shopping-cart"></i> Thêm vào giỏ
                                        </button>

                                    </div>
                                </form>
                            @endif
                            <strong>Mô tả:</strong>
                            <p>{{ $detail->description }}</p>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="product-tab">
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Mô tả</a></li>
                                <li><a data-toggle="tab" href="#tab2">Đánh giá ({{ count($cm)}})</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab1" class="tab-pane fade in active">
                                    <p> {{ $detail->description }}</p>
                                </div>
                                <div id="tab2" class="tab-pane fade in">

                                    <div class="row">

                                        <div class="col-md-6">
                                            @foreach($cm as $cm)
                                                <div class="product-reviews">
                                                    <div class="single-review">
                                                        <div class="review-heading">
                                                            <div><i class="fa fa-user-o"></i> {{$cm->user->fullname}}
                                                            </div>
                                                            <div><a href="#"><i
                                                                            class="fa fa-clock-o"></i> {{$cm->created_at}}
                                                                </a></div>
                                                            <div class="review-rating pull-right">
                                                                @for($i = 1; $i<=$cm['rate']; $i++)
                                                                    <i class="fa fa-star"></i>
                                                                @endfor

                                                                @for($i = 1; $i<=(5 - $cm['rate']); $i++)
                                                                    <i class="fa fa-star-o empty"></i>
                                                                @endfor
                                                            </div>

                                                        </div>
                                                        <div class="review-body">
                                                            <p>{{ $cm->content }}</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-uppercase">Đánh giá của bạn</h4>
                                            <p>Địa chỉ email của bạn sẽ không bị công khai.</p>
                                            <form class="review-form" action="{{route('comment')}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <input class="input" type="hidden" name="product_id"
                                                           value="{{ $detail->id }}"/>
                                                </div>
                                                <div class="form-group">
                                                    <input class="input" type="text" placeholder="Tên của bạn"
                                                           name="name"
                                                           value="{{old('name', isset(Auth::user()->fullname)?Auth::user()->fullname:null)}}"/>
                                                </div>
                                                <div class="form-group">
                                                    <input class="input" type="email" placeholder="Địa chỉ email"
                                                           name="email"
                                                           value="{{old('email', isset(Auth::user()->email)?Auth::user()->email:null)}}"/>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="input" placeholder="Đánh giá"
                                                              name="review" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-rating">
                                                        <strong class="text-uppercase">: Bình chọn</strong>
                                                        <div class="stars">
                                                            <input type="radio" id="star5" name="rating"
                                                                   value="5"/><label for="star5"></label>
                                                            <input type="radio" id="star4" name="rating"
                                                                   value="4"/><label for="star4"></label>
                                                            <input type="radio" id="star3" name="rating"
                                                                   value="3"/><label for="star3"></label>
                                                            <input type="radio" id="star2" name="rating"
                                                                   value="2"/><label for="star2"></label>
                                                            <input type="radio" id="star1" name="rating"
                                                                   value="1"/><label for="star1"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="primary-btn">Gửi</button>
                                            </form>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Product Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->

    <!-- /section -->
@endsection
