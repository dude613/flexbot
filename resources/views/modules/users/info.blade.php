@extends('layouts.master',[$pageTitle = "Info"])

@section('content')
    <h1>Info View</h1>
@endsection

@section('javascript')
    <script src="{{ asset('/assets/js/user.js')}}"></script>
    <script>
        jQuery(document).ready(function () {
            //KTTicketDataTableInitialize.init();
        });
    </script>
@endsection