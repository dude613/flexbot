<div class="modal fade show" id="task2_details_modal" tabindex="-1" role="dialog" aria-labelledby="task" >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="task_type_2"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form">
                <input type="hidden"  name="task_id" id="task_id_2"  readonly class="form-control read-only"/>
                <div class="modal-body">
                    <ul class="task_head">
                        <li id="task_id_wrap_2">
                            <label for="task_id">Task ID: <span id="task_full_id_2"></span></label>
                        </li>
                        <li>
                            Time Submitted: <span id="date_created_2"></span>
                        </li>
                        <li>
                            Created By: <span id="full_name_2"></span>
                        </li>
                    </ul>
                    <div class="task-info-wrapper">
                        <div class="row">
                            <div class="col-6">
                                <div class="row data-row">
                                    <div class="col-md-4 data-col label">Data Location:</div>
                                    <div class="col-md-8 data-col"><span id="data_location_2"></span></div>
                                </div>
                                <div class="row data-row">
                                    <div class="col-md-4 data-col label">Search Term:</div>
                                    <div class="col-md-8 data-col"><span id="search_term_2"></span></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row data-row">
                                    <div class="col-md-4 data-col label">Location:</div>
                                    <div class="col-md-8 data-col"><span id="location_2"></span></div>
                                </div>
                                <div class="row data-row">
                                    <div class="col-md-4 data-col label">Search Item:</div>
                                    <div class="col-md-8 data-col"><span id="search_item_2"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="row data-row file-row">
                            <div class="col-md-2 data-col label">Files Submitted:</div>
                            <div class="col-md-10 data-col"><img id="file_url_2" src="" class="img-fluid"/></div>
                        </div>
                        <div class="row data-row">
                            <div class="col-md-2 data-col label">Notes:</div>
                            <div class="col-md-10 data-col"><span id="additional_info_2"></span></div>
                        </div>

                        <div class="row data-row">
                            <div class="col-md-2 data-col label">Status:</div>
                            <div class="col-md-6 data-col">
                                <select name="status" id="status_2" class="form-control">
                                    <option value="inprogress">In progress</option>
                                    <option value="complete">Complete</option>
                                    <option value="incomplete">Incomplete</option>
                                </select>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <div class="row data-row">
                            <div class="col-md-2 data-col label">Upload:</div>
                            <div class="col-md-10 data-col">
                                <div class="form-group mb-0 pt-2 pb-2">
                                    <input type="hidden" name="admin_submited_files" id="admin_submited_files_2">
                                    <div class="image_upload-block">
                                        <div class="dropzone dropzone-default" id="admin_file_dropzone_2">
                                            <div class="dropzone-msg dz-message needsclick">
                                                <h3 class="dropzone-msg-title">Drop file here or click to upload.</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row data-row">
                            <div class="col-md-2 data-col label">Admin Notes:</div>
                            <div class="col-md-10 data-col">
                                <div class="form-group mb-0 pt-2 pb-2">
                                    <textarea name="admin_notes" class="form-control" id="admin_notes_2" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="admin_data_update_2">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
