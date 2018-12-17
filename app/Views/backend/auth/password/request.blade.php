@extends('layouts.backend.layouts.auth')
@section('content')
    @php MyForm::setForeShowError(true) @endphp
    <div class="container">
        <div class="wrapper">
            @include('layouts.backend.elements.messages',['show_error'=> false])
            <h2><span>パスワードを忘れた場合</span></h2>
            <div class="loginBox-in form loginform">
                <p>{{tb('password.request.please_enter_your_email')}}
                    <br>{{tb('password.request.we_will_send_an_email_to_reset_password')}}</p>
                <p><i
                            class="ls-icon ls-icon-user text-info"></i> {{tb('password.request.email_half_width_characters')}}
                </p>
                {{MyForm::open(['route'=>'backend.password.email', 'pb-autologin'=> 'true','autocomplete'=>'off', 'id' => 'form-reset-pass'])}}
                <div class="form-group">
                    <i class="ls-icon ls-icon-mail text-info"></i><label>{{tb('password.request.email')}}</label>
                    {!! MyForm::email('email', '', ['placeholder'=>tb('password.request.email'), 'required'=> true, 'class' => 'sizeL', 'maxlength' => 128]) !!}
                </div>

                <div class="form-group">
                    <a class="btn btn-primary" href="{{getBackUrl()}}">{{trans('actions.back')}}</a>

                    <a class="btn btn-success" href="javascript:void(0)"
                       onclick="document.getElementById('form-reset-pass').submit()">{{tb('password.request.send')}}</a>
                </div>
                {!! MyForm::close() !!}
            </div>
        </div>
    </div>
@stop