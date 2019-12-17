@extends('layouts.master',[$pageTitle = "Tickets"])

@section('content')
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
@endsection

@section('javascript')
    <script src="{{ asset('/assets/js/tickets.js')}}"></script>
    <script>
        jQuery(document).ready(function () {
            TicketDataTableInitialize.init();
        });
    </script>
@endsection