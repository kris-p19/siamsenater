@extends('layouts.backend')
@section('webadmin-customer','active')

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
                <h3 class="card-title">{{ __('messages.customer') }} - สร้างรายการใหม่</h3>
                <a style="border-radius:45px;margin-left:10px;" href="{{ url('/webadmin/customer') }}" class="btn btn-default btn-sm float-right"><i class="ion-arrow-left-b"></i> ย้อนกลับ</a>
                <button style="border-radius:45px;margin-left:10px;" type="submit" class="btn btn-primary btn-sm float-right"><i class="ion-checkmark-circled"></i> บันทึก</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อลูกค้าภาษาอังกฤษ</label>
                            <input type="text" class="form-control" autofocus placeholder="ชื่อลูกค้าภาษาอังกฤษ" name="customer_name_en">
                        </div>
                        <div class="form-group">
                            <label>รายละเอียดลูกค้าภาษาอังกฤษ</label>
                            <textarea id="customer_description_en" name="customer_description_en" class="form-control" autofocus placeholder="รายละเอียดลูกค้าภาษาอังกฤษ"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อลูกค้าภาษาไทย</label>
                            <input type="text" class="form-control" autofocus placeholder="ชื่อลูกค้าภาษาไทย" name="customer_name_th">
                        </div>
                        <div class="form-group">
                            <label>รายละเอียดลูกค้าภาษาไทย</label>
                            <textarea id="customer_description_th" name="customer_description_th" class="form-control" autofocus placeholder="รายละเอียดลูกค้าภาษาไทย"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>ภาพโลโก้บริษัทลูกค้า</label>
                            <input type="file" class="form-control" name="customer_logo">
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
        CKEDITOR.replace("customer_description_en");
        CKEDITOR.replace("customer_description_th");
        CKEDITOR.config.height = 300;
    });
</script>
@endsection