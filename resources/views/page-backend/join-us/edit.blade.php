@extends('layouts.backend')
@section('webadmin-join-us','active')

@section('content')
<div class="col-md-12">
    @if(session()->has('status') && session()->has('msg'))
        <div class="alert alert-{!! session()->get('status') !!} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> แจ้งเตือน!</h5>
            {!! date('Y-m-d H:i:s') !!} - {!! session()->get('msg')  !!}
        </div>
    @endif
    <form method="post" enctype="multipart/form-data" action="{{ url('webadmin/join-us/edit/'.$data->id) }}">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ฟอร์มแก้ไจข้อมูล {{ __('messages.join-us') }}</h3>
                <a style="border-radius:45px;margin-left:10px;" href="{{ url('/webadmin/join-us') }}" class="btn btn-default btn-sm float-right"><i class="ion-arrow-left-b"></i> ย้อนกลับ</a>
                <button style="border-radius:45px;margin-left:10px;" type="submit" class="btn btn-primary btn-sm float-right"><i class="ion-checkmark-circled"></i> อัพเดตข้อมูล</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อตำแหน่งงาน (TH) <strong style="color:red;">*</strong></label>
                            <input type="text" name="job_name_th" value="{{ (!empty(old('job_name_th'))?old('job_name_th'):$data->job_name_th) }}" class="form-control @error('job_name_th') is-invalid @enderror" placeholder="ชื่อตำแหน่งงาน">
                            @error('job_name_th')
                                <span class="error invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>คำอธิบายตำแหน่งงาน (TH) <strong style="color:red;">*</strong></label>
                            <textarea name="job_description_th" id="job_description_th">{{ (!empty(old('job_description_th'))?old('job_description_th'):$data->job_description_th) }}</textarea>
                            @error('job_description_th')
                                <span style="font-size: 80%;color: #dc3545;" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อตำแหน่งงาน (EN) <strong style="color:red;">*</strong></label>
                            <input type="text" value="{{ (!empty(old('job_name_en'))?old('job_name_en'):$data->job_name_en) }}" name="job_name_en" class="form-control @error('job_name_en') is-invalid @enderror" placeholder="ชื่อตำแหน่งงาน">
                            @error('job_name_en')
                                <span class="error invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>คำอธิบายตำแหน่งงาน (EN) <strong style="color:red;">*</strong></label>
                            <textarea name="job_description_en" id="job_description_en">{{ (!empty(old('job_description_en'))?old('job_description_en'):$data->job_description_en) }}</textarea>
                            @error('job_description_th')
                                <span style="font-size: 80%;color: #dc3545;" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>วันที่เปิดรับสมัคร <strong style="color:red;">*</strong></label>
                            <input type="date" value="{{ (!empty(old('date_begin'))?old('date_begin'):$data->date_begin) }}" name="date_begin" class="form-control @error('date_begin') is-invalid @enderror" placeholder="วันที่รับสมัคร">
                            @error('date_begin')
                                <span class="error invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>วันที่ปิดรับสมัคร <strong style="color:red;">*</strong></label>
                            <input type="date" value="{{ (!empty(old('date_end'))?old('date_end'):$data->date_end) }}" name="date_end" class="form-control @error('date_end') is-invalid @enderror" placeholder="วันที่รับสมัคร">
                            @error('date_end')
                                <span class="error invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>จำกัดจำนวนผู้สมัคร <strong style="color:red;">*</strong></label>
                            <input type="number" value="{{ (!empty(old('maximum_regis'))?old('maximum_regis'):$data->maximum_regis) }}" name="maximum_regis" class="form-control @error('maximum_regis') is-invalid @enderror" placeholder="จำกัดจำนวนผู้สมัคร">
                            @error('maximum_regis')
                                <span class="error invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
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
    $(document).ready(function(){
        CKEDITOR.replace("job_description_th");
        CKEDITOR.replace("job_description_en");
        CKEDITOR.config.height = 300;
    });
</script>
@endsection