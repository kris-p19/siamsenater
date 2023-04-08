@extends('layouts.backend')
@section('webadmin-history','active')

@section('content')
<div class="col-md-12">
    @if(session()->has('status') && session()->has('msg'))
        <div class="alert alert-{!! session()->get('status') !!} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> แจ้งเตือน!</h5>
            {!! date('Y-m-d H:i:s') !!} - {!! session()->get('msg')  !!}
        </div>
    @endif
    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('messages.history') }} - แก้ไข</h3>
                <a style="border-radius:45px;margin-left:10px;" href="{{ url('/webadmin/history') }}" class="btn btn-default btn-sm float-right"><i class="ion-arrow-left-b"></i> ย้อนกลับ</a>
                <button style="border-radius:45px;margin-left:10px;" type="submit" class="btn btn-primary btn-sm float-right"><i class="ion-checkmark-circled"></i> บันทึก</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>ชื่อภาษาอังกฤษ</label>
                            <input type="text" class="form-control" autofocus placeholder="ชื่อภาษาอังกฤษ" name="subject_en" value="{!! $data->subject_en !!}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>ชื่อภาษาไทย</label>
                            <input type="text" class="form-control" autofocus placeholder="ชื่อภาษาไทย" name="subject_th" value="{!! $data->subject_th !!}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label>ประเภทข้อมูล</label>
                        <select class="form-control" name="datatype">
                            @foreach($datatype as $index => $item)
                            <option {{ $data->datatype==$item?'selected':'' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="content_en">
                            <label>เนื้อหาภาษาอังกฤษ</label>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="content_th">
                            <label>เนื้อหาภาษาไทย</label>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $("select[name='datatype']").on('change',function(){
            const path = "{{ asset('upload/about-us') }}";
            switch ($(this).val()) {
                case 'image':
                    $('#content_en').find('div').html('<input type="file" class="form-control" style="padding:4px;" accept="image/*" name="content_en">');
                    $('#content_th').find('div').html('<input type="file" class="form-control" style="padding:4px;" accept="image/*" name="content_th">');
                    $('#content_en').find('div').append('<p><a href="' + path + '/{{ $data->content_en }}" target="_blank">{{ $data->content_en }}</a></p>');
                    $('#content_th').find('div').append('<p><a href="' + path + '/{{ $data->content_th }}" target="_blank">{{ $data->content_th }}</a></p>');
                    break;
                case 'file':
                    $('#content_en').find('div').html('<input type="file" class="form-control" style="padding:4px;" accept="application/pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx" name="content_en">');
                    $('#content_th').find('div').html('<input type="file" class="form-control" style="padding:4px;" accept="application/pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx" name="content_th">');
                    $('#content_en').find('div').append('<p><a href="' + path + '/{{ $data->content_en }}" target="_blank">{{ $data->content_en }}</a></p>');
                    $('#content_th').find('div').append('<p><a href="' + path + '/{{ $data->content_th }}" target="_blank">{{ $data->content_th }}</a></p>');
                    break;
            
                default:
                    $('#content_en').find('div').html('<textarea class="form-control" autofocus placeholder="เนื้อหาภาษาอังกฤษ" id="editor_content_en" name="content_en">{!! $data->content_en !!}</textarea>');
                    $('#content_th').find('div').html('<textarea class="form-control" autofocus placeholder="เนื้อหาภาษาไทย" id="editor_content_th" name="content_th">{!! $data->content_th !!}</textarea>');
                    CKEDITOR.replace('editor_content_en');
                    CKEDITOR.replace('editor_content_th');
                    CKEDITOR.config.height = 300;
                    break;
            }
        });
        $("select[name='datatype']").trigger('change');
    });
</script>
@endsection