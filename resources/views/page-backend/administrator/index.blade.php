@extends('layouts.backend')
@section('webadmin-administration','active')

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
            <h3 class="card-title">{{ __('messages.administration') }}</h3>
            <a style="border-radius:45px;" href="{{ url('/webadmin/administration/create') }}" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มรายการ</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-condensed" style="width:100%;">
                    {{-- <thead>
                        <th class="text-center nowrap">ลำดับ</th>
                        <th class="text-center nowrap">กิจกรรม</th>
                        <th class="text-center nowrap">ชื่อ</th>
                        <th class="text-center nowrap">อีเมล์</th>
                        <th class="text-center nowrap">วันที่สร้าง</th>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $row)
                        <tr>
                            <td class="text-center">{!! ($index+1) !!}</td>
                            <td class="text-center">
                                @if($row->email=='master@siamsenater.com')
                                    @if(Auth::user()->email=='master@siamsenater.com')
                                    <a style="border-radius:45px;width:100px;" onclick="if(confirm('ยืนยันการรีเส็จรหัสผ่าน')){window.location.href=$(this).data('href')};" data-href="{{ url('/webadmin/administration/reset/'.$row->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-key"></i> รีเซ็ตรหัส</a>
                                    @endif
                                @else
                                <a style="border-radius:45px;width:100px;" onclick="if(confirm('ยืนยันการทำรายการ?')){ window.location.href=$(this).data('href'); }" data-href="{{ url('/webadmin/administration/delete/'.$row->id) }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash" aria-hidden="true"></i> ลบ</a>
                                <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/administration/reset/'.$row->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-key"></i> รีเซ็ตรหัส</a>
                                <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/administration/update-status/'.$row->id.'/'.($row->status=='active'?'inactive':'active')) }}" class="btn btn-outline-{{ ($row->status=='active'?'primary':'secondary') }} btn-sm"><i class="fa fa-{{ ($row->status=='active'?'eye':'eye-slash') }}" aria-hidden="true"></i> {{ ($row->status=='active'?'เปิดใช้งาน':'ปิดใช้งาน') }}</a>
                                @endif
                            </td>
                            <td>{!! $row->name !!}</td>
                            <td>{!! $row->email !!}</td>
                            <td>{!! $row->created_at !!}</td>
                        </tr>
                        @endforeach
                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var table;
    $(document).ready( function () {
        table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url('webadmin/administration-ajax') }}",
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
                { "data": "action", "title": "กิจกรรม" },
                { "data": "name", "title": "ชื่อ" },
                { "data": "email", "title": "อีเมล์" },
                { "data": "created_at", "title": "วันที่สร้าง" }
            ]
        });
    });
</script>
@endsection