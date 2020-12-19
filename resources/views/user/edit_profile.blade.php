@extends('layouts.app')
@section('header')
    @parent
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="section">
        <div class="container" style="width: 100%; height: 130px;">

            <div class="col-md-8" style="width: 80%; margin-left: 150px;">
                <div class="card">
                    <div class="card-header">{{ __('CHỈNH SỬA THÔNG TIN') }}</div>

                    <div class="card-body">

                        Xin chào: {{ Auth::user()->fullname }}
                        <form action="{{ route('postprofile', [Auth::user()->id])}}" method="post">
                            @csrf
                            <table width="100%" border="0">
                                <tr>
                                    <td width="50%"><p class="userinfo hovaten"><img src="source/img/user.png"
                                                                                     style="width: 40px; height: 40px; ">{{ __(' Họ và tên') }}
                                        </p></td>
                                    <td width="50%"><p class="userinfo email"><img src="source/img/email.png"
                                                                                   style="width: 40px; height: 40px;">{{ __(' Địa chỉ email') }}
                                        </p></td>
                                </tr>
                                <tr>
                                    <td><p class="info"><input type="text"
                                                               class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                               name="username" value="{{ Auth::user()->fullname }}"
                                                               required autofocus>
                                            @if ($errors->has('username'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                        </p>
                                    </td>
                                    <td><p class="info"><input type="text"
                                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                               name="email" value="{{ Auth::user()->email }}" required
                                                               autofocus>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p class="userinfo dienthoai"><img src="source/img/phone.png"
                                                                           style="width: 40px; height: 40px;">{{ __('Số điện thoại') }}
                                        </p></td>
                                    <td><p class="userinfo diachi"><img src="source/img/address.png"
                                                                        style="width: 40px; height: 40px;">{{ __('Địa chỉ') }}
                                        </p></td>
                                </tr>
                                <tr>
                                    <td><p class="info"><input type="text"
                                                               class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                               name="phone" value="{{ Auth::user()->phone }}" required
                                                               autofocus>
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </p>
                                    </td>
                                    <td><p class="info"><input type="text"
                                                               class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                                               name="address" value="{{ Auth::user()->address }}"
                                                               required autofocus>
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p class="userinfo matkhau"><img src="source/img/password.png"
                                                                         style="width: 40px; height: 40px;">{{ __(' Mật khẩu') }}
                                        </p></td>
                                    <td><p class="userinfo matkhau"><img src="source/img/password.png"
                                                                         style="width: 40px; height: 40px;">{{ __(' Xác nhận mật khẩu') }}
                                        </p></td>
                                </tr>
                                <tr>
                                    <td><p class="info"><input type="password" name="password"/>

                                        </p>
                                    </td>
                                    <td><p class="info"><input type="password" name="password_confirmation"/>

                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <p class="profile-submit">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cập nhật') }}</button>
                                @if(Auth::user()->status == 1)
                                    <a href="{{ route('homeadmin') }}">
                                        <button type="button" class="btn btn-primary">
                                            {{ __('Quay lại') }}</button>
                                    </a>
                                @elseif(Auth::user()->status == 0)
                                    <a href="{{ route('home') }}" style="color:white">
                                        <button type="button" class="btn btn-primary">
                                            {{ __('Quay lại') }}</button>
                                    </a>
                                @endif
                            </p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection