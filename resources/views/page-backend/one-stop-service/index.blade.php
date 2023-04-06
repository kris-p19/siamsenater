@extends('layouts.backend')
@section('webadmin-one-stop-service','active')

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
        <form action="{{ url('/webadmin/one-stop-service/update') }}" method="post">
            @csrf
            <div class="card-header">
                <h3 class="card-title">{{ __('messages.one-stop-service') }}</h3>
                <button type="submit" style="border-radius:45px;" class="btn btn-outline-primary btn-sm float-right"><i class="fas fa-pencil-alt"></i> บันทึก</a>
            </div>
            <div class="card-body">
                <textarea name="content_th" id="content_th"></textarea>
                <div id="content_th"></div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready( function () {
        var editor = CodeMirror.fromTextArea(document.getElementById('content_th'), {
            lineNumbers: true,
            mode: "html",
            keyMap: "sublime"
        });
    });
</script>
@endsection