@extends('layouts.master',[$pageTitle = "Add New Ticket"])

@section('content')
    <form action="">
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Add New Ticket
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="row">
                <div class="col-md-9">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" name="ticket_subjects" class="form-control" placeholder="Enter Subjct">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type*</label>
                                    <select name="ticket_type" id="ticket_type" class="form-control">
                                        <option value="">Select Ticket Type</option>
                                        <option value="billing">Billing</option>
                                        <option value="purchase">Purchase</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Message</label>
                                    {{--<textarea name="message" class="form-control" data-provide="markdown" rows="10"></textarea>--}}
                                    <textarea name="message" class="form-control" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="file_name" id="file_name">
                                    <div class="image_upload-block">
                                        <div class="dropzone dropzone-default" id="ticket_dropzone">
                                            <div class="dropzone-msg dz-message needsclick">
                                                <h3 class="dropzone-msg-title">Attach file here or click to upload.</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <button type="reset" class="btn btn-primary" id="new_ticket_submit">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
        </form>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('/assets/js/tickets.js')}}"></script>
    <script>
        jQuery(document).ready(function () {
            TicketCreateInitialize.init();
        });
    </script>
@endsection