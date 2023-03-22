@extends('layouts.backend')
@section('webadmin-product','active')

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
                <h3 class="card-title">{{ __('messages.product') }} - สร้างรายการใหม่</h3>
                <a style="border-radius:45px;margin-left:10px;" href="{{ url('/webadmin/product') }}" class="btn btn-default btn-sm float-right"><i class="ion-arrow-left-b"></i> ย้อนกลับ</a>
                <button style="border-radius:45px;margin-left:10px;" type="submit" class="btn btn-primary btn-sm float-right"><i class="ion-checkmark-circled"></i> บันทึก</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อกลุ่มสินค้าภาษาไทย</label>
                            <input type="text" class="form-control" name="group_name_th" autofocus placeholder="ชื่อกลุ่มสินค้าภาษาไทย" value="{{ $data->group_name_th }}">
                        </div>
                        <div class="form-group">
                            <label>ชื่อสินค้าภาษาไทย</label>
                            <input type="text" class="form-control" name="name_th" autofocus placeholder="ชื่อสินค้าภาษาไทย" value="{{ $data->name_th }}">
                        </div>
                        <div class="form-group">
                            <label>คำอธิบายภาษาไทย</label>
                            <textarea name="desciption_th" id="desciption_th">{{ $data->desciption_th }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อกลุ่มสินค้าภาษาอังกฤษ</label>
                            <input type="text" class="form-control" name="group_name_en" autofocus placeholder="ชื่อกลุ่มสินค้าภาษาอังกฤษ" value="{{ $data->group_name_en }}">
                        </div>
                        <div class="form-group">
                            <label>ชื่อภาษาอังกฤษ</label>
                            <input type="text" class="form-control" name="name_en" autofocus placeholder="ชื่อภาษาอังกฤษ" value="{{ $data->name_en }}">
                        </div>
                        <div class="form-group">
                            <label>คำอธิบายภาษาอังกฤษ</label>
                            <textarea name="desciption_en" id="desciption_en">{{ $data->desciption_en }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>ภาพ</label>
                            <input type="file" class="form-control" name="picture" accept="image/*">
                            <div class="row">
                                @if(!empty($data->picture))
                                    <div class="col-md-4">
                                        <img src="{{ asset('images/product/resize/'.$data->picture) }}" style="width:100%;" class="img-responsive" onerror="this.style.display='none'">
                                    </div>
                                @endif
                            </div>
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
        CKEDITOR.replace("desciption_th");
        CKEDITOR.replace("desciption_en");
        CKEDITOR.config.height = 300;
    });
</script>
@endsection