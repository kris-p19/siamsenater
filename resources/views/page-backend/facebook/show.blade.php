@extends('layouts.backend')
@section('webadmin-facebookPlugin','active')

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
                <h3 class="card-title">{{ __('messages.facebookPlugin') }}</h3>
                <button style="border-radius:45px;margin-left:10px;" type="submit" class="btn btn-primary btn-sm float-right"><i class="ion-checkmark-circled"></i> บันทึก</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Facebook Messager Plugin</label>
                            <textarea name="content" id="content" class="form-control" rows="10" required>{{ $data->content }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-default custom-switch-on-primary">
                                @if ($data->status=='active')
                                <input type="checkbox" class="custom-control-input" id="customSwitch3" value="inactive" checked>
                                <label class="custom-control-label" for="customSwitch3">เปิดใช้งานอยู่</label>
                                @else
                                <input type="checkbox" class="custom-control-input" id="customSwitch3" value="active">
                                <label class="custom-control-label" for="customSwitch3">ปิดใช้งานอยู่</label>
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
        $('#customSwitch3').on('change',function(){
            window.location.href = "{{ url('webadmin/facebookPlugin/status') }}/" + $(this).val();
        });
    });
</script>
@endsection