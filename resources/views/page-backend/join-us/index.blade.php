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
    <form method="post" enctype="multipart/form-data" action="{{ url('webadmin/join-us/create') }}">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ฟอร์มกรอกข้อมูล {{ __('messages.join-us') }}</h3>
                <button style="border-radius:45px;margin-left:10px;" type="submit" class="btn btn-primary btn-sm float-right"><i class="ion-checkmark-circled"></i> บันทึก</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อตำแหน่งงาน (TH) <strong style="color:red;">*</strong></label>
                            <input type="text" name="job_name_th" value="{{ old('job_name_th') }}" class="form-control @error('job_name_th') is-invalid @enderror" placeholder="ชื่อตำแหน่งงาน">
                            @error('job_name_th')
                                <span class="error invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>คำอธิบายตำแหน่งงาน (TH) <strong style="color:red;">*</strong></label>
                            <textarea name="job_description_th" id="job_description_th">{{ old('job_description_th') }}</textarea>
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
                            <input type="text" value="{{ old('job_name_en') }}" name="job_name_en" class="form-control @error('job_name_en') is-invalid @enderror" placeholder="ชื่อตำแหน่งงาน">
                            @error('job_name_en')
                                <span class="error invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>คำอธิบายตำแหน่งงาน (EN) <strong style="color:red;">*</strong></label>
                            <textarea name="job_description_en" id="job_description_en">{{ old('job_description_en') }}</textarea>
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
                            <input type="date" value="{{ (!empty(old('date_begin'))?old('date_begin'):date('Y-m-d')) }}" name="date_begin" class="form-control @error('date_begin') is-invalid @enderror" placeholder="วันที่รับสมัคร">
                            @error('date_begin')
                                <span class="error invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>วันที่ปิดรับสมัคร <strong style="color:red;">*</strong></label>
                            <input type="date" value="{{ (!empty(old('date_end'))?old('date_end'):date('Y-m-d',strtotime('+30 day'))) }}" name="date_end" class="form-control @error('date_end') is-invalid @enderror" placeholder="วันที่รับสมัคร">
                            @error('date_end')
                                <span class="error invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>จำนวนตำแหน่ง <strong style="color:red;">*</strong></label>
                            <input type="number" value="{{ (!empty(old('maximum_regis'))?old('maximum_regis'):1) }}" name="maximum_regis" class="form-control @error('maximum_regis') is-invalid @enderror" placeholder="จำกัดจำนวนผู้สมัคร">
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

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">ประวัติ {{ __('messages.join-us') }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered" style="width:100%;">
                            {{-- <thead>
                                <tr>
                                    <th class="text-center" style="white-space:nowrap;">ลำดับ</th>
                                    <th class="text-center" style="white-space:nowrap;">กิจกรรม</th>
                                    <th class="text-center" style="white-space:nowrap;">ชื่อตำแหน่งงาน</th>
                                    <th class="text-center" style="white-space:nowrap;">วันที่รับสมัคร</th>
                                    <th class="text-center" style="white-space:nowrap;">จำกัดจำนวนผู้สมัคร</th>
                                    <th class="text-center" style="white-space:nowrap;">คำอธิบายตำแหน่งงาน</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $item)
                                    <tr>
                                        <td class="text-center">{{ ($index+1) }}</td>
                                        <td class="text-center">
                                            <a style="border-radius:45px;width:100px;" onclick="if(confirm('ยืนยันการทำรายการ?')){ window.location.href=$(this).data('href'); }" data-href="{{ url('/webadmin/join-us/delete/'.$item->id) }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash" aria-hidden="true"></i> ลบ</a>
                                            <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/join-us/edit/'.$item->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> แก้ไข</a>
                                            <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/join-us/update-status/'.$item->id.'/'.($item->status=='active'?'inactive':'active')) }}" class="btn btn-outline-{{ ($item->status=='active'?'primary':'secondary') }} btn-sm"><i class="fa fa-{{ ($item->status=='active'?'eye':'eye-slash') }}" aria-hidden="true"></i> {{ ($item->status=='active'?'เผยแพร่':'ไม่เผยแพร่') }}</a>
                                            <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/join-us-is-join/'.$item->id) }}" target="_blank" class="btn btn-outline-success btn-sm"><i class="far fa-eye"></i> ดูผู้สมัคร</a>
                                        </td>
                                        <td>{{ $item->date_begin . " ถึง " . $item->date_end }}</td>
                                        <td class="text-center">{{ $item->maximum_regis }}</td>
                                        <td>
                                            {{ $item->job_name_th }}
                                            <hr>
                                            {{ $item->job_name_en }}
                                        </td>
                                        <td>
                                            {!! $item->job_description_th !!}
                                            <hr>
                                            {!! $item->job_description_en !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody> --}}
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
    $(document).ready(function(){
        CKEDITOR.replace("job_description_th");
        CKEDITOR.replace("job_description_en");
        CKEDITOR.config.height = 300;
    });

    var table;
    $(document).ready( function () {
        table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url('webadmin/join-us-ajax') }}",
            "language": {
                "url": '//cdn.datatables.net/plug-ins/1.13.4/i18n/th.json',
            },
            "responsive": true,
            "dom": "Bfrtip",
            "buttons": [
                "copyHtml5",
                "excelHtml5",
                "csvHtml5"
            ],
            "columns": [
                {
                    "data": null,
                    "title": "ลำดับ",
                    "sortable": false,
                    "searchable": false,
                    "className": "nowrap text-center",
                    "width": '30px',
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "data": null,
                    "title": "กิจกรรม",
                    "sortable": false,
                    "searchable": false,
                    "className": "nowrap text-center",
                    "width": '30px',
                    "render": function(data, type, row, meta) {
                        return  `<a style="border-radius:45px;width:100px;" onclick="if(confirm('ยืนยันการทำรายการ?')){ window.location.href=$(this).data('href'); }" data-href="{{ url('/webadmin/join-us/delete') }}/`+row.id+`" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash" aria-hidden="true"></i> ลบ</a>
                                <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/join-us/edit') }}/`+row.id+`" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> แก้ไข</a>
                                <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/join-us/update-status') }}/`+row.id+`/`+(row.status=='active'?'inactive':'active')+`" class="btn btn-outline-`+(row.status=='active'?'primary':'secondary')+` btn-sm"><i class="fa fa-`+(row.status=='active'?'eye':'eye-slash')+`" aria-hidden="true"></i> `+(row.status=='active'?'เผยแพร่':'ไม่เผยแพร่')+`</a>
                                <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/join-us-is-join') }}/`+row.id+`" target="_blank" class="btn btn-outline-success btn-sm"><i class="far fa-eye"></i> ดูผู้สมัคร</a>`;
                    }
                },
                { "data": "date_begin", "title": "วันที่เปิดรับสมัคร" },
                { "data": "date_end", "title": "วันที่ปิดรับสมัคร" },
                { "data": "maximum_regis", "title": "จำนวนตำแหน่ง" },
                { "data": "job_name_th", "title": "ชื่อตำแหน่งภาษาไทย" },
                { "data": "job_name_en", "title": "ชื่อตำแหน่งภาษาอังกฤษ" },
                { "data": "job_description_th", "title": "รายละเอียดภาษาไทย" },
                { "data": "job_description_en", "title": "รายละเอียดภาษาอังกฤษ" },
            ]
        });
    });
</script>
@endsection