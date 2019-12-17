@extends('layouts.master',[$pageTitle = "Task 1"])

@section('content')
    <div class="row" id="kt_subject">
        <div class="col-md-6">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Create Task 1
                        </h3>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="kt-form">
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <button type="button" class="btn btn-warning pull-right info-btn" data-container="body" data-toggle="kt-popover"
                                    data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                <i class="fa fa-info"></i>
                            </button>
                            <label>Where is your data located?* </label>
                            <select class="form-control" id="kt_data_location" name="data_location">
                                <option value="">Select source</option>
                                <option value="source 1">Source 1</option>
                                <option value="source 2">Source 2</option>
                                <option value="source 3">Source 3</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group kt-hidden" id="search_item_group">
                            <button type="button" class="btn btn-warning pull-right info-btn" data-container="body" data-toggle="kt-popover"
                                    data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                <i class="fa fa-info"></i>
                            </button>
                            <label>Search Item </label>
                            <select class="form-control" id="kt_search_item" name="search_item">
                                <option value="">Select search item</option>
                                <option value="people">People</option>
                                <option value="company">Companies</option>
                            </select>
                        </div>
                        <div class="form-group kt-hidden" id="other_group">
                            <button type="button" class="btn btn-warning pull-right info-btn" data-container="body" data-toggle="kt-popover"
                                    data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                <i class="fa fa-info"></i>
                            </button>
                            <label>Other</label>
                            <input type="text" name="other" class="form-control" placeholder="Enter other">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-warning pull-right info-btn" data-container="body" data-toggle="kt-popover"
                                    data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                <i class="fa fa-info"></i>
                            </button>
                            <label>Search Term*</label>
                            <input type="text" name="search_term" class="form-control" placeholder="Enter search term">
                        </div>
                        <div class="form-group kt-hidden" id="required_term_group">
                            <button type="button" class="btn btn-warning pull-right info-btn" data-container="body" data-toggle="kt-popover"
                                    data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                <i class="fa fa-info"></i>
                            </button>
                            <label>Required Terms</label>
                            <input type="text" name="required_term" class="form-control" placeholder="Enter required terms">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-warning pull-right info-btn" data-container="body" data-toggle="kt-popover"
                                    data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                <i class="fa fa-info"></i>
                            </button>
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" placeholder="Enter location">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-warning pull-right info-btn" data-container="body" data-toggle="kt-popover"
                                    data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                <i class="fa fa-info"></i>
                            </button>
                            <label>Additional Info </label>
                            <input type="text" name="additional_info" class="form-control" placeholder="Enter additional info">
                        </div>
                        <input type="hidden" name="task_type" class="form-control" id="task_type" value="Task 1">
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="reset" class="btn btn-primary" id="new_task1_submit">Submit</button>
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
            KTTaskCreateInitialize.init();
        });
    </script>
@endsection
