@extends('layouts.backend')
@section('webadmin-related-link','active')

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
            <h3 class="card-title">{{ __('messages.related-link') }}</h3>
            <a style="border-radius:45px;" href="{{ url('/webadmin/related-link/create') }}" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มรายการ</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="text-center nowrap">ลำดับ</th>
                                <th class="text-center nowrap">กิจกรรม</th>
                                <th class="text-center nowrap">ชื่อ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td class="text-center">{{ ($index+1) }}</td>
                                    <td class="text-center">
                                        <a style="border-radius:45px;width:100px;" onclick="if(confirm('ยืนยันการทำรายการ?')){ window.location.href=$(this).data('href'); }" data-href="{{ url('/webadmin/related-link/delete/'.$item->id) }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash" aria-hidden="true"></i> ลบ</a>
                                        <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/related-link/edit/'.$item->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> แก้ไข</a>
                                        <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/related-link/update-status/'.$item->id.'/'.($item->status=='active'?'inactive':'active')) }}" class="btn btn-outline-{{ ($item->status=='active'?'primary':'secondary') }} btn-sm"><i class="fa fa-{{ ($item->status=='active'?'eye':'eye-slash') }}" aria-hidden="true"></i> {{ ($item->status=='active'?'เผยแพร่':'ไม่เผยแพร่') }}</a>
                                    </td>
                                    <td class="text-left">
                                        {{ $item->name_th }}
                                        <hr>
                                        {{ $item->name_en }}
                                        <hr>
                                        <a target="_blank" href="{{ urldecode($item->url) }}">เปิดลิงค์</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    
</script>
@endsection