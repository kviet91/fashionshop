@extends('layouts.app')
@section('header')
    @parent
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endsection
@section('content')
    @if ( Session::has('success') )
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>{{ Session::get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    @endif

    @if ( Session::has('error') )
        <div class="alert alert-danger alert-dismissible" role="alert">
            <strong>{{ Session::get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    @endif
    <div class="section">
        <div class="container" style="width: 100%">

            <div class="col-md-8" style="width: 80%; margin-left: 150px;">
                <div class="card">
                    <div class="card-header">THÔNG TIN TÀI KHOẢN</div>
                    <div class="card-body">

                        Xin chào: {{ Auth::user()->fullname }} <br>
                        Bạn đã đăng nhập thành công!<br>
                        <br>
                        @include('user.profile')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
