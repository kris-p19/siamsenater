@extends('layouts.backend')
@section('webadmin-internship-program','active')

@section('content')
<div class="col-md-12">
    @if(session()->has('status') && session()->has('msg'))
        <div class="alert alert-{!! session()->get('status') !!} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> แจ้งเตือน!</h5>
            {!! date('Y-m-d H:i:s') !!} - {!! session()->get('msg')  !!}
        </div>
    @endif
    <div class="card">
        <form id="form" action="{{ url('/webadmin/internship-program/update') }}" method="post">
            @csrf
            <div class="card-header">
                <h3 class="card-title">{{ __('messages.internship-program') }}</h3>
                <button type="submit" style="border-radius:45px;" class="btn btn-outline-primary btn-sm float-right"><i class="fas fa-pencil-alt"></i> บันทึก</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">เนื้อหาภาษาไทย (Text/HTML)</label>
                            <textarea name="content_th" id="content_th" style="width:100%;min-height:350px;">{{ $data->content_th }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">เนื้อหาภาษาอังกฤษ (Text/HTML)</label>
                            <textarea name="content_en" id="content_en" style="width:100%;min-height:350px;">{{ $data->content_en }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body"></div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('plugins/editarea_0_8_2/edit_area/edit_area_full.js') }}"></script>
<script>
    $(document).ready( function () {
        editAreaLoader.init({
			id: "content_th"	// id of the textarea to transform		
			,start_highlight: true	// if start with highlight
			,allow_resize: "both"
			,allow_toggle: false
			,word_wrap: true
			,language: "en"
			,syntax: "html"	
		});
        editAreaLoader.init({
			id: "content_en"	// id of the textarea to transform		
			,start_highlight: true	// if start with highlight
			,allow_resize: "both"
			,allow_toggle: false
			,word_wrap: true
			,language: "en"
			,syntax: "html"	
		});
    });
</script>
@endsection