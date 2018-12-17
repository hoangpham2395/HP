@extends('layouts.backend.layouts.auth')
@section('content')
    <div class="outer">
        <div class="middle">
            <div class="login-box inner" style="text-align: center">
                <div class="login-header">
                    <div class="login-logo">
                        <a href="/"><b>HP</b> Shop</a>
                    </div>
                    <p class="text-center">Sign in to start your session</p>
                </div>
                <!-- /.login-logo -->
                <div class="login-box-body">

                    {{MyForm::open(['route'=>'backend.login','class'=>'form-signin','show-loading'=>0])}}
                    <div class="form-group">
                        @include('layouts.backend.elements.messages')
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" value="{{$entity->email}}"  name="email" placeholder="Email">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4 pull-right">
                            <button type="submit" class="btn btn-danger btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    {!! MyForm::hidden('return_url') !!}
                    {!! MyForm::close() !!}
                </div>
                <!-- /.login-box-body -->
            </div>
        </div>
    </div>
@stop