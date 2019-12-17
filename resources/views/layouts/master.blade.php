<!DOCTYPE html>

<html lang="en" >
<!-- begin::Head -->
<head>
    <!--begin::Base Path (base relative path for assets of this page) -->
    <base href="../">
    <!--end::Base Path -->
    <meta charset="utf-8"/>

    <title>Mainly Internally | {{$pageTitle}}</title>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <!--end::Fonts -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('/assets/css/vendors.common.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/global.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="{{ asset('/assets/media/logos/flexicon.png')}}" />
    <!--begin::Page Scripts(used by this page) -->
    @yield('css')
    <!--end::Page Scripts -->
</head>
<!-- end::Head -->

<!-- begin::Body -->
<body  class="kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >
    <div class="preloader"></div>
    <!-- begin:: Page -->
    @include('partials.mobile_header')

    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            @include('partials.aside',[$var1='Aside'])
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                <!-- begin:: Header -->
                <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

                    <!-- begin:: Header Menu -->
                    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
                            <ul class="kt-menu__nav ">
                                <li class="kt-menu__item kt-menu__item--here  kt-menu__item--rel kt-menu__item--active ">
                                    <a href="{{ url('/')}} " class="kt-menu__link">
                                        <span class="kt-menu__link-text">Go to Homepage</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end:: Header Menu -->		<!-- begin:: Header Topbar -->
                    <div class="kt-header__topbar">
                        <!--begin: User Bar -->
                        <div class="kt-header__topbar-item kt-header__topbar-item--user">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px" aria-expanded="false">
                                <div class="kt-header__topbar-user">
                                    <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                                    <span class="kt-header__topbar-username kt-hidden-mobile user_surename" id="user_surename"></span>
                                    <img class="kt-hidden" alt="Pic" src="./assets/media/users/300_20.jpg">
                                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                    <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold user_gravater" id="user_gravater">S</span>
                                </div>
                            </div>

                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl" x-placement="bottom-end" style="position: absolute; transform: translate3d(1260px, 64px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <!--begin: Head -->
                                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url({{ asset('/assets/media/bg/user_card_bg.jpg')}})">
                                    <div class="kt-user-card__avatar">
                                        <img class="kt-hidden" alt="Pic" src="{{ asset('/assets/media/users/300_20.jpg')}}">
                                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                        <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success user_gravater">S</span>
                                    </div>
                                    <div class="kt-user-card__name user_surename"></div>
                                    <!--
                                    <div class="kt-user-card__badge">
                                        <span class="btn btn-success btn-sm btn-bold btn-font-md">0 messages</span>
                                    </div>
                                    -->
                                </div>
                                <!--end: Head -->

                                <!--begin: Navigation -->
                                <div class="kt-notification">
                                    <div class="kt-notification__custom kt-space-between">
                                        <button target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold" id="sign_out">Sign Out</button>

                                        <a href="{{url('/profile')}}"  class="btn btn-clean btn-sm btn-bold">View Profile</a>
                                    </div>
                                </div>
                                <!--end: Navigation -->
                            </div>
                        </div>
                        <!--end: User Bar -->
                    </div>
                    <!-- end:: Header Topbar -->
                </div>
                <!-- end:: Header -->
                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                    <!-- begin:: Content Head -->
                    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
                        <div class="kt-container  kt-container--fluid ">
                            <div class="kt-subheader__main">

                                <h3 class="kt-subheader__title"><?php echo $pageTitle; ?></h3>
                                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                                <span class="kt-subheader__desc">Mainly Internally</span>
                                <!--
                                <div class="kt-subheader__breadcrumbs">
                                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                                    <span class="kt-subheader__breadcrumbs-separator"></span>
                                    <a href="" class="kt-subheader__breadcrumbs-link">
                                        Apps                        </a>
                                    <span class="kt-subheader__breadcrumbs-separator"></span>
                                    <a href="" class="kt-subheader__breadcrumbs-link">
                                        Users                        </a>
                                    <span class="kt-subheader__breadcrumbs-separator"></span>
                                    <a href="" class="kt-subheader__breadcrumbs-link">
                                        Profile 1                        </a>
                                    <span class="kt-subheader__breadcrumbs-separator"></span>
                                    <a href="" class="kt-subheader__breadcrumbs-link">
                                        Personal Information                        </a>
                                    <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span>
                                </div>
                                 -->
                                <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                                    <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                            <span><i class="flaticon2-search-1"></i></span>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end:: Content Head -->
                    <!-- begin:: Content -->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid <?php echo strtolower($pageTitle); ?>">
                        <!--Begin::Dashboard 1-->
                        @yield('content')
                        <!--End::Dashboard 1-->
                    </div>
                    <!-- end:: Content -->
                </div>

                <!-- begin:: Footer -->
                <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
                    <div class="kt-container  kt-container--fluid ">
                        <div class="kt-footer__copyright">
                            {{ date('Y') }}&nbsp;©&nbsp;<a href="#" target="_blank" class="kt-link">Mainly Internally</a>
                        </div>

                    </div>
                </div>
                <!-- end:: Footer -->
            </div>
        </div>
    </div>
    @include('partials.inactivity_modal')
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>

    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
        var KTAppOptions = {"colors":{"state":{"brand":"#5d78ff","dark":"#282a3c","light":"#ffffff","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
    </script>
    <!-- end::Global Config -->

    <!--begin:: Global Mandatory Vendors -->
    {{--    @include('partials.requiredvendors')--}}
    <script src="{{ asset('/assets/vendors/required_vendors.js')}}"></script>
    <!--end:: Global Mandatory Vendors -->

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="{{ asset('/assets/js/scripts.bundle.js')}}"></script>
    <script src="{{ asset('/assets/vendors/markdown/lib/markdown.js')}}" ></script>
    <script src="{{ asset('/assets/vendors/bootstrap-markdown/js/bootstrap-markdown.js')}}" ></script>
    <script src="{{ asset('/assets/js/global.js')}}" ></script>
    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts(used by this page) -->
    @yield('javascript')
    <!--end::Page Scripts -->
</body>
</html>


