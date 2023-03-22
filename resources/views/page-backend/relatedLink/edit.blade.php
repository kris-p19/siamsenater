@extends('layouts.backend')
@section('webadmin-related-link','active')

@section('content')
<div class="col-md-12">
    @if(session()->has('status') && session()->has('msg'))
        <div class="alert alert-{!! session()->get('status') !!} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> แจ้งเตือน!</h5>
            {!! date('Y-m-d H:i:s') !!} - {!! session()->get('msg')  !!}
        </div>
    @endif
    <form method="post" enctype="multipart/form-data" id="quickForm">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('messages.related-link') }} - แก้ไข</h3>
                <a style="border-radius:45px;margin-left:10px;" href="{{ url('/webadmin/related-link') }}" class="btn btn-default btn-sm float-right"><i class="ion-arrow-left-b"></i> ย้อนกลับ</a>
                <button style="border-radius:45px;margin-left:10px;" type="submit" class="btn btn-primary btn-sm float-right"><i class="ion-checkmark-circled"></i> อัพเดต</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อภาษาไทย <strong style="color:red;">*</strong></label>
                            <input type="text" class="form-control" autofocus placeholder="ชื่อภาษาไทย" name="name_th" value="{{ $data->name_th }}" required>
                            @error('name_th')
                                <small class="form-text color-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อภาษาอังกฤษ <strong style="color:red;">*</strong></label>
                            <input type="text" class="form-control" autofocus placeholder="ชื่อภาษาอังกฤษ" name="name_en" value="{{ $data->name_en }}" required>
                            @error('name_en')
                                <small class="form-text color-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Link <strong style="color:red;">*</strong></label>
                            <input type="text" class="form-control" autofocus placeholder="Link" name="url" value="{{ urldecode($data->url) }}" required>
                            @error('url')
                                <small class="form-text color-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>สถานะ <strong style="color:red;">*</strong></label>
                            <select name="status" class="form-control">
                                <option {{ $data->status=='active'?'selected':'' }} value="active">แสดง</option>
                                <option {{ $data->status=='inactive'?'selected':'' }} value="inactive">ไม่แสดง</option>
                            </select>
                            @error('status')
                                <small class="form-text color-red">{{ $message }}</small>
                            @enderror
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
</script>
@endsection