@extends('layouts.backend')
@section('webadmin-our-service','active')

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
                <h3 class="card-title">{{ __('messages.our-service') }} - แก้ไข</h3>
                <a style="border-radius:45px;margin-left:10px;" href="{{ url('/webadmin/our-service') }}" class="btn btn-default btn-sm float-right"><i class="ion-arrow-left-b"></i> ย้อนกลับ</a>
                <button style="border-radius:45px;margin-left:10px;" type="submit" class="btn btn-primary btn-sm float-right"><i class="ion-checkmark-circled"></i> บันทึก</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อบริการภาษาไทย</label>
                            <input type="text" class="form-control" name="service_name_th" value="{!! $data->service_name_th !!}" autofocus placeholder="ชื่อบริการภาษาไทย">
                        </div>
                        <div class="form-group">
                            <label>คำอธบายบริการภาษาไทย</label>
                            <textarea name="service_desciption_th" autofocus class="form-control" placeholder="คำอธบายบริการภาษาไทย">{!! $data->service_desciption_th !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>แฮชแท็กภาษาไทย</label>
                            <input type="text" class="form-control" data-role="tagsinput" name="hastag_th" value="{!! $data->hastag_th !!}" placeholder="แฮชแท็กภาษาไทย" autofocus>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อบริการภาษาอังกฤษ</label>
                            <input type="text" class="form-control" name="service_name_en" value="{!! $data->service_name_en !!}" autofocus placeholder="ชื่อบริการภาษาอังกฤษ">
                        </div>
                        <div class="form-group">
                            <label>คำอธบายบริการภาษาอังกฤษ</label>
                            <textarea name="service_desciption_en" autofocus class="form-control" placeholder="คำอธบายบริการภาษาอังกฤษ">{!! $data->service_desciption_en !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>แฮชแท็กภาษาอังกฤษ</label>
                            <input type="text" class="form-control" data-role="tagsinput" name="hastag_en" value="{!! $data->hastag_en !!}" placeholder="แฮชแท็กภาษาอังกฤษ" autofocus>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>ภาพส่วนหัว</label>
                        <input type="file" class="form-control" name="picture_header" accept="image/*">
                        <div class="row">
                            @if(!empty($data->picture_header))
                                <div class="col-md-4">
                                    <img src="{{ asset('images/our-service/'.$data->picture_header) }}" style="width:100%;" class="img-responsive" onerror="this.style.display='none'">
                                </div>
                            @endif
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
        CKEDITOR.replace("service_desciption_th");
        CKEDITOR.replace("service_desciption_en");
        CKEDITOR.config.height = 300;
    });
</script>
@endsection