@extends('layouts.backend')
@section('webadmin-supplier-meeting','active')

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
                <h3 class="card-title">{{ __('messages.supplier-meeting') }} - แก้ไข</h3>
                <a style="border-radius:45px;margin-left:10px;" href="{{ url('/webadmin/supplier-meeting') }}" class="btn btn-default btn-sm float-right"><i class="ion-arrow-left-b"></i> ย้อนกลับ</a>
                <button style="border-radius:45px;margin-left:10px;" type="submit" class="btn btn-primary btn-sm float-right"><i class="ion-checkmark-circled"></i> บันทึก</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อภาษาไทย</label>
                            <input type="text" class="form-control" name="title_th" value="{{ $data->title_th }}" autofocus placeholder="ชื่อภาษาไทย">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่ออังกฤษ</label>
                            <input type="text" class="form-control" name="title_en" value="{{ $data->title_en }}" autofocus placeholder="ชื่ออังกฤษ">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>ไฟล์แนบ <small>PDF Only</small></label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" accept="application/pdf">
                            @error('file')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                            <a href="{{ url('supplier-meetings-view/'.$data->id) }}" target="_blank">เปิดดูไฟล์</a>
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
        // CKEDITOR.replace("service_desciption_th");
        // CKEDITOR.replace("service_desciption_en");
        // CKEDITOR.config.height = 300;
    });
</script>
@endsection