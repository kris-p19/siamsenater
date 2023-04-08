@extends('layouts.backend')
@section('webadmin-system-configuration','active')

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
                <h3 class="card-title">{{ __('messages.system-configuration') }} - แก้ไข</h3>
                <a style="border-radius:45px;margin-left:10px;" href="{{ url('/webadmin/system-configuration') }}" class="btn btn-default btn-sm float-right"><i class="ion-arrow-left-b"></i> ย้อนกลับ</a>
                <button style="border-radius:45px;margin-left:10px;" type="submit" class="btn btn-primary btn-sm float-right"><i class="ion-checkmark-circled"></i> บันทึก</button>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($data as $item)
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>
                                {{ $item->names }} <strong style="color:red;">*</strong>
                                @if ($item->names=='timezone')
                                    <a href="https://www.w3schools.com/php/php_ref_timezones.asp" target="_blank">ตัวอย่าง</a>
                                @endif
                                @if ($item->names=='locale')
                                    ภาษาเริ่มต้นระบุเป็น th หรือ en เท่านั้น
                                @endif
                                @if ($item->names=='font_th' || $item->names=='font_en')
                                    <a href="https://fonts.google.com" target="_blank">ตัวอย่าง</a>
                                @endif
                            </label>
                            <input type="text" class="form-control" name="{{ $item->names }}" placeholder="{{ $item->names }}" autofocus value="{!! $item->contents !!}" required>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อเว็บไซต์</label>
                            <input type="text" class="form-control" name="APP_NAME" placeholder="APP NAME" autofocus value="{!! env('APP_NAME') !!}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>MAIL DRIVER</label>
                            <input type="text" class="form-control" name="MAIL_DRIVER" placeholder="MAIL DRIVER" autofocus value="{!! env('MAIL_DRIVER') !!}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>MAIL_HOST</label>
                            <input type="text" class="form-control" name="MAIL_HOST" placeholder="MAIL_HOST" autofocus value="{!! env('MAIL_HOST') !!}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>MAIL_PORT</label>
                            <input type="text" class="form-control" name="MAIL_PORT" placeholder="MAIL_PORT" autofocus value="{!! env('MAIL_PORT') !!}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>MAIL_USERNAME</label>
                            <input type="text" class="form-control" name="MAIL_USERNAME" placeholder="MAIL_USERNAME" autofocus value="{!! env('MAIL_USERNAME') !!}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>MAIL_PASSWORD</label>
                            <input type="text" class="form-control" name="MAIL_PASSWORD" placeholder="MAIL_PASSWORD" autofocus value="{!! env('MAIL_PASSWORD') !!}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>MAIL_ENCRYPTION</label>
                            <input type="text" class="form-control" name="MAIL_ENCRYPTION" placeholder="MAIL_ENCRYPTION" autofocus value="{!! env('MAIL_ENCRYPTION') !!}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>MAIL_FROM_ADDRESS</label>
                            <input type="text" class="form-control" name="MAIL_FROM_ADDRESS" placeholder="MAIL_FROM_ADDRESS" autofocus value="{!! env('MAIL_FROM_ADDRESS') !!}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>MAIL_FROM_NAME</label>
                            <input type="text" class="form-control" name="MAIL_FROM_NAME" placeholder="MAIL_FROM_NAME" autofocus value="{!! env('MAIL_FROM_NAME') !!}">
                        </div>
                    </div> --}}
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