@extends('layouts.loginwrap')

@section('content')
    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root kt-login kt-login--v3 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(<?php echo url('/')?>/assets/media/bg/login-bg.jpg);">
                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                    <div class="kt-login__container">
                        <div class="kt-login__logo">
                            <a href="#">
                                <img src="<?php echo url('/')?>/assets/media/logos/login-flexbot-logo.png">
                            </a>
                        </div>
                        <div class="kt-login__signin">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Sign In</h3>
                            </div>
                            <form class="kt-form" >
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Email" name="email" id="email" autocomplete="off">
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="password" placeholder="Password" name="password" id="password">
                                </div>
                                <div class="row kt-login__extra">
                                    <div class="col">
                                        <label class="kt-checkbox">
                                            <input type="checkbox" name="remember"> Remember me
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col kt-align-right">
                                        <a href="javascript:;" id="kt_login_forgot" class="kt-link kt-login__link">Forget Password ?</a>
                                    </div>
                                </div>
                                <div class="kt-login__actions">
                                    <button id="kt_login_signin_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign In</button>
                                </div>
                            </form>
                        </div>
                        <div class="kt-login__signup">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Sign Up</h3>
                                <div class="kt-login__desc">Enter your details to create your account:</div>
                            </div>
                            <form class="kt-form" action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="First name" name="first_name">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Last name" name="last_name">
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off" id="signup_email">
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="password" id="su_password" placeholder="Password" name="password">
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="password" placeholder="Confirm Password" name="rpassword">
                                    <input type="hidden"  name="role_id" value="3">
                                </div>
                                <div class="row kt-login__extra">
                                    <div class="col kt-align-left">
                                        <label class="kt-checkbox">
                                            <input type="checkbox" name="agree">I Agree the <a href="#" class="kt-link kt-login__link kt-font-bold">terms and conditions</a>.
                                            <span></span>
                                        </label>
                                        <span class="form-text text-muted"></span>
                                    </div>
                                </div>
                                <div class="kt-login__actions">
                                    <button id="kt_login_signup_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign Up</button>&nbsp;&nbsp;
                                    <div class="kt-login__account_already">
                                            <span class="kt-login__account-msg"> Already have an account ?</span>&nbsp;&nbsp;
                                        <a href="javascript:;" id="kt_login_signup_cancel" class="kt-login__account-link btn-sm-action">Sign In!</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="kt-login__forgot">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Forgotten Password ?</h3>
                                <div class="kt-login__desc">Enter your email to reset your password:</div>
                            </div>
                            <form class="kt-form" action="">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
                                </div>
                                <div class="kt-login__actions">
                                    <button id="kt_login_forgot_submit" class="btn btn-pill kt-login__btn-primary">Request</button>&nbsp;&nbsp;
                                    <button id="kt_login_forgot_cancel" class="btn btn-pill kt-login__btn-secondary">Cancel</button>
                                </div>
                            </form>
                        </div>
                        <div class="kt-login__verify">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Verify Your Email</h3>
                                <div class="kt-login__desc" id="verification-message"></div>
                            </div>
                            <form class="kt-form" action="">
                                <div class="input-group d-none">
                                    <input class="form-control" type="text" placeholder="Email" name="email" id="kt_verify_email" autocomplete="off">
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Enter Verification Code Here" name="token"  autocomplete="off">
                                </div>
                                <div class="kt-login__actions">
                                    <button id="kt_login_verify_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Verify</button>&nbsp;&nbsp;
                                    <button id="kt_login_verify_cancel" class="btn btn-default btn-elevate kt-login__btn-secondary">Cancel</button>
                                </div>
                            </form>
                        </div>
                        <div class="kt-login__account">
                            <span class="kt-login__account-msg">
                                Don't have an account yet ?
                            </span>
                                    &nbsp;&nbsp;
                            <a href="javascript:;" id="kt_login_signup" class="kt-login__account-link  btn-sm-action">Sign Up!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: Page -->

@endsection

@section('javascript')
    <script type="text/javascript">
        jQuery(function($){
            let authInfo = localStorage.getItem('authInfo');
            if(authInfo) window.location = window.location.origin+'/dashboard';
            $("kt_login_signin_submit").click(function(){
                const loginData = {email:$("#email").val(),password:$("#password").val()};
            })
        });
    </script>
@endsection
