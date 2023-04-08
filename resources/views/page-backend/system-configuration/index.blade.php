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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('messages.system-configuration') }}</h3>
            <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/system-configuration/edit') }}" class="btn btn-outline-warning btn-sm float-right"><i class="fas fa-edit" aria-hidden="true"></i> แก้ไข</a>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($data as $item)
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{ $item->names }}</label>
                        <input type="text" class="form-control" name="{{ $item->names }}" placeholder="{{ $item->names }}" autofocus readonly value="{!! $item->contents !!}">
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label>ชื่อเว็บไซต์</label>
                        <input type="text" class="form-control" name="APP_NAME" placeholder="APP NAME" autofocus readonly value="{!! env('APP_NAME') !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>MAIL DRIVER</label>
                        <input type="text" class="form-control" name="MAIL_DRIVER" placeholder="MAIL DRIVER" autofocus readonly value="{!! env('MAIL_DRIVER') !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>MAIL_HOST</label>
                        <input type="text" class="form-control" name="MAIL_HOST" placeholder="MAIL_HOST" autofocus readonly value="{!! env('MAIL_HOST') !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>MAIL_PORT</label>
                        <input type="text" class="form-control" name="MAIL_PORT" placeholder="MAIL_PORT" autofocus readonly value="{!! env('MAIL_PORT') !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>MAIL_USERNAME</label>
                        <input type="text" class="form-control" name="MAIL_USERNAME" placeholder="MAIL_USERNAME" autofocus readonly value="{!! env('MAIL_USERNAME') !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>MAIL_PASSWORD</label>
                        <input type="text" class="form-control" name="MAIL_PASSWORD" placeholder="MAIL_PASSWORD" autofocus readonly value="{!! env('MAIL_PASSWORD') !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>MAIL_ENCRYPTION</label>
                        <input type="text" class="form-control" name="MAIL_ENCRYPTION" placeholder="MAIL_ENCRYPTION" autofocus readonly value="{!! env('MAIL_ENCRYPTION') !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>MAIL_FROM_ADDRESS</label>
                        <input type="text" class="form-control" name="MAIL_FROM_ADDRESS" placeholder="MAIL_FROM_ADDRESS" autofocus readonly value="{!! env('MAIL_FROM_ADDRESS') !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>MAIL_FROM_NAME</label>
                        <input type="text" class="form-control" name="MAIL_FROM_NAME" placeholder="MAIL_FROM_NAME" autofocus readonly value="{!! env('MAIL_FROM_NAME') !!}">
                    </div>
                </div>         --}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    
</script>
@endsection