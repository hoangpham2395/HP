@extends('layouts.backend.layouts.auth')
@section('content')
    <div class="wrap-in mypage-login">
        <div class="loginBox">
            <h2><span>{{tb('password.reset.reset_password')}}</span></h2>
            {{MyForm::open(['url'=> route('backend.password.reset', ['token'=>$token]), 'pb-autologin'=> 'true','autocomplete'=>'off', 'id' => 'form-reset-pass'])}}
            <p>{{tb('password.reset.please_enter_the_new_password')}}</p>
            <p> {{tb('password.request.email_half_width_characters')}}</p>
            {!! MyForm::error([
                 'password',
                 'password_confirmation',
            ])!!}
            <div class="form-group">
                <label for="usr">{{tb('password.reset.password')}}</label>
                {!! MyForm::showError(false)->password('password', ['placeholder'=>tb('password.reset.password'), 'required'=> true, 'class' => 'sizeM', 'maxlength' => 128]) !!}
            </div>
            <div class="form-group">
                <label for="usr">{{tb('password.reset.password_confirm')}}</label>
                {!! MyForm::showError(false)->password('password_confirmation', ['placeholder'=>tb('password.reset.password_confirm'), 'required'=> true, 'class' => 'sizeM', 'maxlength' => 128]) !!}
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">{{tb('password.reset.confirm')}}</button>
            </div>
            {!! MyForm::close() !!}
        </div>
    </div>
@stop