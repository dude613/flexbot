@extends('layouts.master',[$pageTitle = "Dashboard"])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label task-header">
                        <h3 class="kt-portlet__head-title">
                            Task List
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body pt-1 pb-1">
                <!--begin: Search Form -->
                <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                    <div class="row align-items-center">
                        <div class="col-xl-12 order-2 order-xl-1">
                            <div class="row align-items-center">
                                <div class="col-md-3 kt-margin-b-20-tablet-and-mobile">
                                    <div class="kt-input-icon kt-input-icon--left">
                                        <input type="text" class="form-control" placeholder="Search..." id="task1DataSearch">
                                        <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                            <span><i class="la la-search"></i></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3 kt-margin-b-20-tablet-and-mobile">
                                    <div class="kt-form__group kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label style="width: 65px;">Task Type:</label>
                                        </div>
                                        <div class="kt-form__control">
                                            <select class="form-control bootstrap-select" id="kt_form_task_type">
                                                <option value="">All</option>
                                                <option value="Task 1">Task 1</option>
                                                <option value="Task 2">Task 2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 kt-margin-b-20-tablet-and-mobile">
                                    <div class="kt-form__group kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label>Status:</label>
                                        </div>
                                        <div class="kt-form__control">
                                            <select class="form-control bootstrap-select" id="kt_form_status">
                                                <option value="">All</option>
                                                <option value="inprogress">inprogress</option>
                                                <option value="complete">complete</option>
                                                <option value="incomplete">incomplete</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end: Search Form -->
                <div class="task1-datatable" id="task_dataTable"></div>
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
                                    <div class="col-md-3 kt-margin-b-20-tablet-and-mobile">
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
    @include('modules.modals.task1_details_modal')
    @include('modules.modals.task2_details_modal')
@endsection


@section('javascript')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('/assets/js/tasks.js') }}"></script>
    <script src="{{ asset('/assets/js/tickets.js')}}"></script>
    <script>
        $(document).ready(function(){
            if(authInfo.role>2){
                TaskListForUser.init();
            }else{
                KTTaskDataTableInitialize.init();
            }

            TicketDataTableInitialize.init();
        });
    </script>
@endsection
