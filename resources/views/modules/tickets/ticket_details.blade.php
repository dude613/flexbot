@extends('layouts.master',[$pageTitle = "View Ticket"])

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="kt-grid__item kt-grid__item--fluid kt-app__content mb-5" id="kt_chat_content">
                <div class="kt-chat">
                    <div class="kt-portlet kt-portlet--head-lg kt-portlet--last">
                        <div class="kt-portlet__head">
                            <div class="kt-chat__head ">
                                <div class="kt-chat__left">
                                    <div class="kt-chat__label">
                                        <a href="#" class="kt-chat__title">Ticket #{{$id}}</a>
                                        <span class="kt-chat__status">
                                            <span class="kt-badge kt-badge--dot kt-badge--danger"></span> Open
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-chat__center"></div>
                                <div class="kt-chat__right">
                                    <div class="form-group">
                                        <label for="change-status">Change Status :</label>
                                        <select name="status" class="form-control" id="change-status">
                                            <option value="">Select Status</option>
                                            <option value="open">Open</option>
                                            <option value="close">Close</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="kt-portlet__body">
                            <div class="kt-scroll kt-scroll--pull" data-mobile-height="300">
                                <div class="kt-chat__messages">
                                </div>
                            </div>
                        </div>

                        <div class="kt-portlet__foot">
                            <form id="reply-form">
                                <input type="hidden" name="ticket_id" value="{{$id}}" id="ticket_id">
                                <div class="kt-chat__input">
                                    <div class="kt-chat__editor">
                                        <textarea style="height: 50px" placeholder="Type here..." name="message"></textarea>
                                    </div>
                                    <div class="kt-chat__toolbar">
                                        <div class="kt_chat__tools">
                                            <input type="hidden" name="file_name" id="file_name">
                                            <div class="dropzone dropzone-multi" id="reply_upload">
                                                <div class="dropzone-panel">
                                                    <a class="dropzone-select btn btn-label-brand btn-bold btn-sm"><i class="flaticon-attachment"></i> Attach file</a>
                                                </div>
                                                <div class="dropzone-items">
                                                    <div class="dropzone-item" style="display:none">
                                                        <div class="dropzone-file">
                                                            <div class="dropzone-filename" title="some_image_file_name.jpg">
                                                                <span data-dz-name>some_image_file_name.jpg</span> <strong>(<span  data-dz-size>340kb</span>)</strong>
                                                            </div>
                                                            <div class="dropzone-error" data-dz-errormessage></div>
                                                        </div>
                                                        <div class="dropzone-progress">
                                                            <div class="progress">
                                                                <div class="progress-bar kt-bg-brand" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress></div>
                                                            </div>
                                                        </div>
                                                        <div class="dropzone-toolbar">
                                                            <span class="dropzone-delete" data-dz-remove><i class="flaticon2-cross"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt_chat__actions">
                                                <button type="button" class="btn btn-brand btn-md btn-upper btn-bold kt-chat__reply" id="chat_reply">reply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('/assets/js/tickets.js')}}"></script>
    <script>
        jQuery(document).ready(function () {
            TicketDetailsInitialize.init();
        });
    </script>
@endsection