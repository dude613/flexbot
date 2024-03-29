@extends('layouts.master',[$pageTitle = "Users". (isset($user_id)?$user_id:"")] )

@section('content')
<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
    <input type="hidden" name="user_id" value="{{ isset($user_id)?$user_id:'' }}" id="hidden_user_id">
    <!--Begin:: App Aside Mobile Toggle-->
    <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
        <i class="la la-close"></i>
    </button>
    <!--End:: App Aside Mobile Toggle-->

    <!--Begin:: App Aside-->
    <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">
        <!--begin:: Widgets/Applications/User/Profile1-->
        <div class="kt-portlet ">
            <div class="kt-portlet__head  kt-portlet__head--noborder">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar"></div>
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit-y">
                <!--begin::Widget -->
                <div class="kt-widget kt-widget--user-profile-1">
                    <div class="kt-widget__head">
                        <div class="kt-widget__media">
                            <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_sm">
                                <div class="kt-avatar__holder" id="user_img" style="background-image: url({{url('assets/media/users/avatar.jpg')}});"></div>
                            </div>
                        </div>
                        <div class="kt-widget__content">
                            <div class="kt-widget__section">
                                <a href="javascript:;" class="kt-widget__username">
                                    <span id="user_name"></span>
                                    <i class="flaticon2-correct kt-font-success"></i>
                                </a>
                                <a href="javascript:;" class="kt-widget__usercredit ">
                                    Credit Point: <span id="user_credit"></span>
                                </a>
                                <div class="popOverFormWrap admin-menu">
                                    <button type="button" class="btn btn-clean btn-sm btn-bold update-credit_btn">
                                        <i class="la la-plus-circle"></i> Update Credit
                                    </button>
                                    <div class="credit-form-wrap">
                                        <form class="update-credit-form">
                                            <div class="from-group">
                                                <input type="hidden"  id="user_id" name="user_id">
                                                <input type="text" class="form-control" name="credit_amount" placeholder="Credit Amount">
                                            </div>
                                            <div class="from-group">
                                                <label class="kt-checkbox kt-checkbox--solid kt-checkbox--success">
                                                    <input type="checkbox" name="credit_in" value="true" data-unchecked-value="false"> Credit In?
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="from-group">
                                                <button type="button" class="btn btn-success btn-sm credit_update_submit" >Update</button>
                                            </div>
                                        </form>
                                        <i class="la la-times-circle" id="credit-popup-close"></i>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="kt-widget__body">
                        <div class="kt-widget__content ">
                            <div class="kt-widget__info">
                                <span class="kt-widget__label">Email:</span>
                                <a href="#" class="kt-widget__data" id="email"></a>
                            </div>
                            <div class="kt-widget__info">
                                <span class="kt-widget__label">Phone:</span>
                                <a href="#" class="kt-widget__data" id="phone"></a>
                            </div>
                            <div class="kt-widget__info">
                                <span class="kt-widget__label">City:</span>
                                <span class="kt-widget__data" id="city"></span>
                            </div>
                        </div>
                        <div class="kt-widget__items nav flex-column nav-pills" role="tablist" aria-orientation="vertical" >
                            <a href="#account" class="nav-link kt-widget__item active show" data-toggle="tab" id="v-pills-account-tab">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" id="Mask" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" id="Mask-Copy" fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="kt-widget__desc">
                                        Account Information
                                    </span>
                                </span>
                            </a>
                            <a href="#payment" class="nav-link kt-widget__item " data-toggle="tab" id="v-pills-payment-tab">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
                                                <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
                                                <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="kt-widget__desc">
                                        Payment Information
                                    </span>
                                </span>
                            </a>
                            <a href="#transaction" class="nav-link kt-widget__item " data-toggle="tab">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                                                <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" id="Combined-Shape" fill="#000000"></path>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="kt-widget__desc">
                                        Transaction History
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <!--end::Widget -->
            </div>
        </div>
        <!--end:: Widgets/Applications/User/Profile1-->

    </div>
    <!--End:: App Aside-->

    <!--Begin:: App Content-->
    <div class="tab-content" style="width: 100%;">
        <div class="kt-grid__item kt-grid__item--fluid kt-app__content tab-pane active" id="account" role="tabpanel">
            <div class="row">
                <div class="col-xl-12">
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">Account Information <small>update your account informaiton</small></h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-wrapper">
                                    <div class="dropdown dropdown-inline">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form class="kt-form kt-form--label-right">
                            <div class="kt-portlet__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">Customer Info:</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar">
                                                    <div class="kt-avatar__holder" style="background-image: url({{url('assets/media/users/avatar.jpg')}});"></div>
                                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                        <i class="fa fa-pen"></i>
                                                        <input type="file" name="user_image_url" id="user_image" accept="image/*">
                                                    </label>
                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                    <i class="fa fa-times"></i>
                                                </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <input type="hidden" name="user_image_url" id="user_image_input" value="">
                                            <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                            <div class="col-lg-4 col-xl-6">
                                                <input class="form-control" type="text" name="first_name" id="first_name" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control" type="text" name="last_name" id="last_name" value="">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Company</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control" type="text"  id="company" value="">
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Organization</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control" type="text" name="organization" id="organization" value="">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">Contact Info:</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label" >Email</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                    <input type="text" class="form-control read-only" value="" name="email" id="email_input" readonly placeholder="Email" aria-describedby="basic-email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                    <input type="text" class="form-control" name="phone" id="phone_input" value="" placeholder="Phone" aria-describedby="basic-phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Country</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-group-last row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">City</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="city" id="city_input" placeholder="City" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-3 col-xl-3">
                                        </div>
                                        <div class="col-lg-9 col-xl-9">
                                            <button type="button" class="btn btn-success" id="account_update">Update</button>&nbsp;
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-grid__item kt-grid__item--fluid kt-app__content tab-pane " id="payment" role="tabpanel">
            <div class="row">
                <div class="col-xl-12">
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">Payment Information </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-wrapper">
                                    <div class="dropdown dropdown-inline">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form class="kt-form kt-form--label-right">
                            <div class="kt-portlet__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Saved Credit Card</label>
                                            <div class="col-lg-4 col-xl-6">
                                                <input class="form-control" type="text" name="card_no" id="card_no" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Billing Address</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control" type="text" name="billing_address" id="billing_address" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">City</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control" type="text" name="billing_city" id="billing_city" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Zip Code</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control" type="text" name="billing_zip_code" id="billing_zip_code" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-3 col-xl-3">
                                        </div>
                                        <div class="col-lg-9 col-xl-9">
                                            <button type="button" class="btn btn-success" id="payment_update">Update</button>&nbsp;
                                            <button type="button" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-grid__item kt-grid__item--fluid kt-app__content tab-pane " id="transaction" role="tabpanel">
            <div class="row">
                <div class="col-xl-12">
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">Transaction History </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-wrapper">
                                    <div class="dropdown dropdown-inline">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <form class="kt-form kt-form--label-right">
                            <div class="kt-portlet__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <!--begin: Search Form -->
                                        <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                                            <div class="row align-items-center">
                                                <div class="col-xl-12 order-2 order-xl-1">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                                            <div class="kt-input-icon kt-input-icon--left">
                                                                <input type="text" class="form-control" placeholder="Search..." id="transactionDataSearch">
                                                                <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                                                    <span><i class="la la-search"></i></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end: Search Form -->
                                        <div class="transaction-datatable" id="transaction_dataTable"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--End:: App Content-->
</div>
@endsection

@section('javascript')
    <script src="{{ asset('assets/js/users.js') }}"></script>
    <script>
        jQuery(document).ready(function () {
            UserDetailsInitialize.init();
        });
    </script>
@endsection