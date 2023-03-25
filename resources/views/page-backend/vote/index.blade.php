@extends('layouts.backend')
@section('webadmin-vote','active')

@section('content')
<div class="col-md-12">
    @if(session()->has('status') && session()->has('msg'))
        <div class="alert alert-{!! session()->get('status') !!} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> แจ้งเตือน!</h5>
            {!! date('Y-m-d H:i:s') !!} - {!! session()->get('msg')  !!}
        </div>
    @endif
    <form method="post" enctype="multipart/form-data" action="{{ url('webadmin/vote/create') }}">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ฟอร์มกรอกข้อมูล {{ __('messages.vote') }}</h3>
                <button style="border-radius:45px;margin-left:10px;" type="submit" class="btn btn-primary btn-sm float-right"><i class="ion-checkmark-circled"></i> บันทึก</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อภาษาไทย <strong style="color:red;">*</strong></label>
                            <input type="text" name="name_th" class="form-control" placeholder="ชื่อภาษาไทย" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อภาษาอังกฤษ <strong style="color:red;">*</strong></label>
                            <input type="text" name="name_en" class="form-control" placeholder="ชื่อภาษาอังกฤษ" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">ประวัติ {{ __('messages.vote') }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="text-center">ลำดับ</th>
                                <th class="text-center">ชื่อ</th>
                                <th class="text-center">คะแนน</th>
                                <th class="text-center">จำนวน Vote</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td class="text-center">{{ ($index+1) }}</td>
                                    <td class="text-left">
                                        {{ $item->name_th }} | {{ $item->name_en }}
                                    </td>
                                    <td class="text-center">
                                        {{ number_format($item->score) }} คะแนน
                                    </td>
                                    <td class="text-center">
                                        {{ number_format(DB::table('vote_items')->where('vote_id',$item->id)->count(),0) }} Vote
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