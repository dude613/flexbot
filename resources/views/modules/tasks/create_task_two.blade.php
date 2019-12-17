@extends('layouts.master',[$pageTitle = "Task 2"])

@section('content')
    <div class="row" id="kt_subject">
        <div class="col-md-6">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Create Task 2
                        </h3>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="kt-form">
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <div class="image_upload-block">
                                <div class="dropzone dropzone-default" id="task2_dropzone">
                                    <div class="dropzone-msg dz-message needsclick">
                                        <h3 class="dropzone-msg-title">Drop file here or click to upload.</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="file_name" id="file_name">
                        <div class="form-group">
                            <label>Where is your data located ? </label>
                            <select class="form-control" id="kt_data_location" name="data_location">
                                <option value="">Select source</option>
                                <option value="source_1">Source 1</option>
                                <option value="source_2">Source 2</option>
                                <option value="source_3">Source 3</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Any important item we should note?</label>
                            <input type="text" name="additional_info" class="form-control" placeholder="Enter note">
                        </div>

                        <input type="hidden" name="task_type" class="form-control" id="task_type" value="Task 2">
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="button" class="btn btn-primary" id="new_task2_submit">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
        <div class="col-md-6"></div>
    </div>
@endsection


@section('javascript')
    <script src="{{ asset('assets/js/tasks.js') }}"></script>
    <script>
        jQuery(document).ready(function () {
            KTTaskCreateInitialize.init(2);
        });
    </script>
@endsection
