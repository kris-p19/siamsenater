@extends('layouts.backend')
@section('webadmin-slideShow','active')

@section('content')
<div class="col-md-12">
    @if(session()->has('status') && session()->has('msg'))
        <div class="alert alert-{!! session()->get('status') !!} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> แจ้งเตือน!</h5>
            {!! date('Y-m-d H:i:s') !!} - {!! session()->get('msg')  !!}
        </div>
    @endif
    <form method="post" enctype="multipart/form-data" action="{{ url('webadmin/slideShow/create') }}">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ฟอร์มกรอกข้อมูล {{ __('messages.slideShow') }}</h3>
                <button style="border-radius:45px;margin-left:10px;" type="submit" class="btn btn-primary btn-sm float-right"><i class="ion-checkmark-circled"></i> บันทึก</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>ภาพ <strong style="color:red;">*</strong></label>
                            <input type="file" name="picture">
                        </div>
                        <div class="form-group">
                            <label>ลิงค์ (หากไม่ต้องการให้ใส่ข้อความ empty) <strong style="color:red;">*</strong></label>
                            <input type="text" name="url" class="form-control" value="empty">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">ประวัติ {{ __('messages.slideShow') }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">ลำดับ</th>
                                    <th class="text-center">ภาพ</th>
                                    <th class="text-center">ลิงค์</th>
                                    <th class="text-center">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $item)
                                    <tr>
                                        <td class="text-center">{{ ($index+1) }}</td>
                                        <td class="text-center"><a href="{{ asset('images/slideShow/'.$item->picture) }}" target="_blank"><img src="{{ asset('images/slideShow/'.$item->picture) }}" class="img-responsive" style="width:200px;"></a></td>
                                        <td class="text-left">
                                            @if($item->url=='empty')
                                                ไม่มีลิงค์
                                            @else
                                                <a href="{{ $item->url }}">{{ $item->url }}</a>
                                            @endif
                                        </td>
                                        <td class="text-left">
                                            @if($item->status=='active')
                                                <a href="{{ url('webadmin/slideShow/update-status') }}?status=inactive&id={{ $item->id }}" style="color:green;">{{ $item->status }}</a>
                                            @else
                                                <a href="{{ url('webadmin/slideShow/update-status') }}?status=active&id={{ $item->id }}" style="color:red;">{{ $item->status }}</a>
                                            @endif
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
</div>
@endsection

@section('script')
<script>
    
</script>
@endsection