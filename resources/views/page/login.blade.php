@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Đăng nhập</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb">
                    <a href="index.html">Home</a> / <span>Đăng nhập</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">

            <form action="{{route('login')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{$error}} <br>
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('mess'))
                        <div class="alert alert-{{Session::get('mess')}}">{{Session::get('thongbao')}}</div>
                    @endif
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <h4>Đăng nhập</h4>
                        <div class="space20">&nbsp;</div>
                        <div class="form-block">
                            <label for="email">Email address*</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-block">
                            <label for="password">Password*</label>
                            <input type="text" id="password" name="password" required>
                        </div>
                        <div class="form-block">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection