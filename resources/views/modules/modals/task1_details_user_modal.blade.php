<div class="modal fade show" id="task_details_user_modal" tabindex="-1" role="dialog" aria-labelledby="task" >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="task_type"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form">
                <input type="hidden"  name="task_id" id="task_id"  readonly class="form-control read-only"/>
                <div class="modal-body">
                    <ul class="task_head">
                        <li> Task ID: <span id="task_full_id"></span></li>
                        <li> Time Submitted: <span id="date_created"></span></li>
                    </ul>
                    <div class="task-info-wrapper">
                        <div class="row">
                            <div class="col-6">
                                <div class="row data-row">
                                    <div class="col-md-4 data-col label">Data Location:</div>
                                    <div class="col-md-8 data-col"><span id="data_location"></span></div>
                                </div>
                                <div class="row data-row">
                                    <div class="col-md-4 data-col label">Search Term:</div>
                                    <div class="col-md-8 data-col"><span id="search_term"></span></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row data-row">
                                    <div class="col-md-4 data-col label">Location:</div>
                                    <div class="col-md-8 data-col"><span id="location"></span></div>
                                </div>
                                <div class="row data-row">
                                    <div class="col-md-4 data-col label">Search Item:</div>
                                    <div class="col-md-8 data-col"><span id="search_item"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="row data-row">
                            <div class="col-6">
                                <div class="row data-row">
                                    <div class="col-md-4 data-col label">Notes:</div>
                                    <div class="col-md-8 data-col"><span id="additional_info"></span></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row data-row">
                                    <div class="col-md-4 data-col label">Status:</div>
                                    <div class="col-md-8 data-col"><span id="status"></span></div>
                                </div>
                                <div class="row data-row">
                                    <div class="col-md-4 data-col label">Admin Attached File:</div>
                                    <div class="col-md-8 data-col"><span id="admin_submited_files"></span></div>
                                </div>      
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
