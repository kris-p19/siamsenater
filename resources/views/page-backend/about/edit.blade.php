@extends('layouts.backend')
@section('webadmin-about-us','active')

@section('content')
<div class="col-md-12">
    @if(session()->has('status') && session()->has('msg'))
        <div class="alert alert-{!! session()->get('status') !!} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> แจ้งเตือน!</h5>
            {!! date('Y-m-d H:i:s') !!} - {!! session()->get('msg')  !!}
        </div>
    @endif
    <form method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('messages.about-us') }} - แก้ไข</h3>
                <a style="border-radius:45px;margin-left:10px;" href="{{ url('/webadmin/about-us') }}" class="btn btn-default btn-sm float-right"><i class="ion-arrow-left-b"></i> ย้อนกลับ</a>
                <button style="border-radius:45px;margin-left:10px;" type="submit" class="btn btn-primary btn-sm float-right"><i class="ion-checkmark-circled"></i> บันทึก</button>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>ชื่อหมวดภาษาอังกฤษ</label>
                    <input type="text" class="form-control" autofocus placeholder="ชื่อหมวดภาษาอังกฤษ" value="{!! $data->subject_en !!}" name="subject_en">
                </div>
                <div class="form-group">
                    <label>ชื่อหมวดภาษาไทย</label>
                    <input type="text" class="form-control" autofocus placeholder="ชื่อหมวดภาษาไทย" value="{!! $data->subject_th !!}" name="subject_th">
                </div>
                <div class="form-group">
                    <label>URL</label>
                    <input type="text" class="form-control" autofocus placeholder="URL" value="{!! $data->path !!}" name="path">
                </div>
                <div class="form-group">
                    <label>ไอคอน (material-icons) <a href="https://fonts.google.com/icons?icon.style=Filled&icon.set=Material+Icons" target="_blank">ดูตัวอย่าง</a></label>
                    <input type="text" class="form-control" autofocus placeholder="ไอคอน (material-icons)" value="{!! $data->icon !!}" name="icon">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    
</script>
@endsection