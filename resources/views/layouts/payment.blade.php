<!DOCTYPE html>

<html lang="en" >
<!-- begin::Head -->
<head>
    <!--begin::Base Path (base relative path for assets of this page) -->
    <base href="../">
    <!--end::Base Path -->
    <meta charset="utf-8"/>

    <title>Mainly Internally | Payment</title>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <!--end::Fonts -->
    <!--begin:: Global Optional Vendors -->
    <link href="{{ asset('/assets/css/vendors.common.css')}}" rel="stylesheet" type="text/css" />
    <!--end:: Global Optional Vendors -->
    <link href="{{ asset('/assets/css/global.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/gateway.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="{{ asset('/assets/media/logos/flexicon.png')}}" />
    </head>
    <!-- end::Head -->
    <!-- begin::Body -->
    <body  class="kt-header--fixed kt-header-mobile--fixed kt-subheader--solid kt-aside--enabled">

        @yield('content')

        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>var KTAppOptions = {"colors":{"state":{"brand":"#5d78ff","dark":"#282a3c","light":"#ffffff","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};</script>
        <!-- end::Global Config -->

        <!--begin:: Global Mandatory Vendors -->
        <script src="{{ asset('/assets/vendors/required_vendors.js')}}"></script>
        <!--end:: Global Mandatory Vendors -->

        <!--begin::Global Theme Bundle(used by all pages) -->
        <script src="{{ asset('/assets/js/scripts.bundle.js')}}" type="text/javascript"></script>
        <!--end::Global Theme Bundle -->

        <!--begin::Page Scripts(used by this page) -->
        <script src="https://js.stripe.com/v2/" type="text/javascript"></script>
        <script src="{{ asset('/assets/js/global.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/js/gateway.js') }}" type="text/javascript"></script>
        <!--end::Page Scripts -->
        @yield('javascript')
    </body>
    <!-- end::Body -->
</html>
