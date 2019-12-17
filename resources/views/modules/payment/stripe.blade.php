@extends('layouts.payment')

@section('content')
    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root kt-gateway kt-gateway--v3 kt-gateway--payment" id="kt_gateway">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url( {{asset('/assets/media/bg/login-bg.jpg')}});">
                <div class="kt-grid__item kt-grid__item--fluid kt-gateway__wrapper">
                    <div class="kt-gateway__container">
                        <div class="kt-gateway__logo">
                            <a href="#">
                                <img src="{{asset('/assets/media/logos/login-flexbot-logo.png')}}">
                            </a>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default credit-card-box">
                                        <div class="panel-heading display-table" >
                                            <div class="row display-tr" >
                                                <h3 class="panel-title display-td" >Payment Details</h3>
                                                <div class="display-td" >
                                                    <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <form role="form"  method="post" class="gateway-form" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"  id="payment-form">
                                                @csrf
                                                <div class='form-row row'>
                                                    <div class='col-12 form-group required'>
                                                        <label class='control-label'>Name on Card</label>
                                                        <input class='form-control' size='4' type='text'>
                                                    </div>
                                                    <div class='col-12 form-group required'>
                                                        <label class='control-label'>Card Number</label>
                                                        <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                                                    </div>
                                                </div>
                                                
                                                <div class='form-row row'>
                                                    <div class='col-12 col-md-4 form-group cvc required'>
                                                        <label class='control-label'>CVC</label>
                                                        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                                    </div>
                                                    <div class='col-12 col-md-4 form-group expiration required'>
                                                        <label class='control-label'>Expiration Month</label>
                                                        <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                                    </div>
                                                    <div class='col-12 col-md-4 form-group expiration required'>
                                                        <label class='control-label'>Expiration Year</label>
                                                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                                    </div>
                                                </div>

                                                <div class='form-row row'>
                                                    <div class='col-md-12 error form-group d-none'>
                                                        <div class='alert-danger alert'>Please correct the errors and try again.</div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary btn-lg btn-block" id="payment-submit" type="submit">Pay Now ($ <span id="amount"></span>)</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
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
        $(function() {
            if(Cookies.get('cart_product')){
                let product = JSON.parse(Cookies.get('cart_product'));
                $("#amount").text(product.price)
            }
        });
    </script>
@endsection