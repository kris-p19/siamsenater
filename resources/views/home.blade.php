@extends('layouts.backend')
@section('webadmin-home','active')

@section('content')
<div class="offset-lg-3 col-lg-6">
    <div class="card">
      <div class="card-body">
        <center>
          <img src="{{ asset('images/logo.png') }}" alt="" srcset="">
        </center>
        <h1 class="text-center" style="font-size: 18px;">
          ยินดีต้อนรับเข้าสู่ระบบจัดการเว็บไซต์ {{ __('messages.brand') }}
        </h1>
      </div>
    </div>
    
</div>
<!-- /.col-md-6 -->
@endsection
