@extends('layouts.master',[$pageTitle = "Dashboard"])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="Task 1">Task List 1</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions d-none">
                                <div class="dropdown dropdown-inline">
                                    <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="la la-download"></i> Export
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__section kt-nav__section--first">
                                                <span class="kt-nav__section-text">Choose an option</span>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon la la-print"></i>
                                                    <span class="kt-nav__link-text">Print</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                                    <span class="kt-nav__link-text">Excel</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                                    <span class="kt-nav__link-text">PDF</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                &nbsp;
                                <a href="<?= url('/tasks/create/1') ?>" class="btn btn-brand btn-elevate btn-icon-sm">
                                    <i class="la la-plus"></i>
                                    Add New
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kt-portlet__body pt-1 pb-1">
                    <!--begin: Search Form -->
                    <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                        <div class="row align-items-center">
                            <div class="col-xl-12 order-2 order-xl-1">
                                <div class="row align-items-center">
                                    <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                        <div class="kt-input-icon kt-input-icon--left">
                                            <input type="text" class="form-control" placeholder="Search..." id="task1DataSearch">
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
                    <div class="tsk-datatable task1-datatable" id="task1_dataTable"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3>Task List 2</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions d-none">
                                <div class="dropdown dropdown-inline">
                                    <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="la la-download"></i> Export
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__section kt-nav__section--first">
                                                <span class="kt-nav__section-text">Choose an option</span>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon la la-print"></i>
                                                    <span class="kt-nav__link-text">Print</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                                    <span class="kt-nav__link-text">Excel</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                                    <span class="kt-nav__link-text">PDF</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                &nbsp;
                                <a href="<?= url('/tasks/create/2') ?>" class="btn btn-brand btn-elevate btn-icon-sm">
                                    <i class="la la-plus"></i>
                                    Add New
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kt-portlet__body pt-1 pb-1">
                    <!--begin: Search Form -->
                    <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                        <div class="row align-items-center">
                            <div class="col-xl-12 order-2 order-xl-1">
                                <div class="row align-items-center">
                                    <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                        <div class="kt-input-icon kt-input-icon--left">
                                            <input type="text" class="form-control" placeholder="Search..." id="task1DataSearch">
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
                    <div class="tsk-datatable task2-datatable" id="task2_dataTable"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Tickets
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body pt-1 pb-1">
                    <!--begin: Search Form -->
                    <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                        <div class="row align-items-center">
                            <div class="col-xl-12 order-2 order-xl-1">
                                <div class="row align-items-center">
                                    <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                        <div class="kt-input-icon kt-input-icon--left">
                                            <input type="text" class="form-control" placeholder="Search..." id="ticketDataSearch">
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
                    <div class="ticket-datatable" id="tickets_dataTable"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($products as $index=>$product)
            <div class="col-md-3 col-sm-6 col-12 my-3">
                <div class="kt-portlet kt-iconbox kt-iconbox--animate product-box">
                    <div class="kt-portlet__body">
                        <div class="kt-iconbox__body">
                            <div class="kt-iconbox__icon with-img">
                                <img src="{{ asset('assets/web/img/products/shop4_cat1.jpg') }}" class="img-fluid circle" alt="">
                            </div>
                            <div class="kt-iconbox__desc">
                                <h3 class="kt-iconbox__title">
                                    <a class="kt-link" href="#">{{ $product->product_name }}</a>
                                </h3>
                                <div class="kt-iconbox__content">
                                    <p class="kt-widget5__desc">Voluptatum deleniti atque corrupti quos dolores et quas molestias.</p>
                                    <div class="kt-widget5__info">
                                        <div class="d-flex justify-content-between flex-row align-items-center">
                                            <div class="price">
                                                <span>Price:</span>
                                                <span class="kt-font-info">${{ $product->price }}</span>
                                            </div>
                                            <div class="buy-now-wrap">
                                                <button type="button" data-price="{{ $product->price }}" data-pid="{{ $product->product_id }}" name="buy-now" class="btn btn-sm btn-label-success btn-bold buy-now">Buy Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('modules.modals.task1_details_user_modal')
    @include('modules.modals.task2_details_user_modal')
@endsection


@section('javascript')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('/assets/js/tasks.js') }}"></script>
    <script src="{{ asset('/assets/js/tickets.js')}}"></script>
    <script>
        $(document).ready(function(){
            TaskListForUser.init();
            TaskListForUser.init(2);
            TicketDataTableInitialize.init();
        });
    </script>
@endsection
