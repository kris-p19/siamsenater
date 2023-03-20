@extends('layouts.backend')
@section('webadmin-administration','active')

@section('content')
<div class="col-md-12">
    @if(session()->has('status') && session()->has('msg'))
        <div class="alert alert-{!! session()->get('status') !!} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> แจ้งเตือน!</h5>
            {!! date('Y-m-d H:i:s') !!} - {!! session()->get('msg')  !!}
            {!! session()->get('input')['name'] !!}
            {!! session()->get('input')['email'] !!}
            {!! session()->get('input')['password'] !!}
            {!! session()->get('input')['status'] !!}
        </div>
    @endif
    <form action="{{ url('webadmin/administration/store') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('messages.administration') }} - สร้างผู้ใช้งานใหม่</h3>
                <a style="border-radius:45px;margin-left:10px;" href="{{ url('/webadmin/administration') }}" class="btn btn-default btn-sm float-right"><i class="ion-arrow-left-b"></i> ย้อนกลับ</a>
                <button style="border-radius:45px;margin-left:10px;" type="submit" class="btn btn-primary btn-sm float-right"><i class="ion-checkmark-circled"></i> สร้าง</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">ชื่อ - สกุล <strong style="color:red;">*</strong></label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="ชื่อ - สกุล" required autofocus>
                            @error('name')
                                <span class="error invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">อีเมล <strong style="color:red;">*</strong></label>
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="อีเมล" required autofocus>
                            @error('email')
                                <span class="error invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">รหัสผ่าน (อักษร 8 ตัวขึ้นไป) <strong style="color:red;">*</strong></label>
                            <input type="password" value="{{ old('password') }}" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="รหัสผ่าน" required autofocus>
                            @error('password')
                                <span class="error invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">ยืนยันรหัสผ่าน (อักษร 8 ตัวขึ้นไป) <strong style="color:red;">*</strong></label>
                            <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="ยืนยันรหัสผ่าน" required autofocus>
                            @error('password_confirmation')
                                <span class="error invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">สถานะ <strong style="color:red;">*</strong></label>
                            <select name="status" class="form-control" required>
                                <option value="active">เปิดใช้งาน</option>
                                <option value="inactive">ปิดใช้งาน</option>
                            </select>
                            @error('status')
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
    
</script>
@endsection