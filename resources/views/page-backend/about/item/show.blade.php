@extends('layouts.backend')
@section('webadmin-about-us','active')

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
            <h3 class="card-title">{{ __('messages.about-us') }}</h3>
            <a style="border-radius:45px;margin-left:10px;" href="{{ url('/webadmin/about-us') }}" class="btn btn-default btn-sm float-right"><i class="ion-arrow-left-b"></i> ย้อนกลับ</a>
            <a style="border-radius:45px;" href="{{ url('/webadmin/about-us/createitem/'.$about_us_id) }}" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มรายการ</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-condensed" style="width:100%;">
                    {{-- <thead>
                        <th class="text-center">ลำดับ</th>
                        <th class="text-center">กิจกรรม</th>
                        <th class="text-center">ชื่อภาษาอังกฤษ</th>
                        <th class="text-center">ชื่อภาษาไทย</th>
                        <th class="text-center">เนื้อหาภาษาอังกฤษ</th>
                        <th class="text-center">เนื้อหาภาษาไทย</th>
                        
                    </thead>
                    <tbody>
                        @foreach($data as $index => $row)
                        <tr>
                            <td class="text-center">{!! $index+1 !!}</td>
                            <td class="text-center">
                                <a style="border-radius:45px;width:100px;" onclick="if(confirm('ยืนยันการทำรายการ?')){ window.location.href=$(this).data('href'); }" data-href="{{ url('/webadmin/about-us/deleteitem/'.$row->id) }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash" aria-hidden="true"></i> ลบ</a>
                                <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/about-us/edititem/'.$row->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> แก้ไข</a>
                                <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/about-us/item-update-status/'.$row->id.'/'.($row->status=='active'?'inactive':'active')) }}" class="btn btn-outline-{{ ($row->status=='active'?'primary':'secondary') }} btn-sm"><i class="fa fa-{{ ($row->status=='active'?'eye':'eye-slash') }}" aria-hidden="true"></i> {{ ($row->status=='active'?'เผยแพร่':'ไม่เผยแพร่') }}</a>
                            </td>
                            <td>{!! $row->subject_en !!}</td>
                            <td>{!! $row->subject_th !!}</td>
                            <td>{!! $row->datatype!='text'?'<a target="_blank" href="'.asset('/upload/about-us/'.$row->content_en).'">'.$row->content_en.'</a>':$row->content_en !!}</td>
                            <td>{!! $row->datatype!='text'?'<a target="_blank" href="'.asset('/upload/about-us/'.$row->content_th).'">'.$row->content_th.'</a>':$row->content_th !!}</td>
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
            "ajax": "{{ url('webadmin/about-us-item-ajax/'.$about_us_id) }}",
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
                    "render": function(data, type, row, meta) {
                        return `<a style="border-radius:45px;width:100px;" onclick="if(confirm('ยืนยันการทำรายการ?')){ window.location.href=$(this).data('href'); }" data-href="{{ url('/webadmin/about-us/deleteitem') }}/`+row.id+`" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash" aria-hidden="true"></i> ลบ</a>
                        <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/about-us/edititem') }}/`+row.id+`" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> แก้ไข</a>
                        <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/about-us/item-update-status') }}/`+row.id+`/`+(row.status=='active'?'inactive':'active')+`" class="btn btn-outline-`+(row.status=='active'?'primary':'secondary')+` btn-sm"><i class="fa fa-`+(row.status=='active'?'eye':'eye-slash')+`" aria-hidden="true"></i> `+(row.status=='active'?'เผยแพร่':'ไม่เผยแพร่')+`</a>`;
                    }
                },
                { "data": "subject_en", "className": "nowrap", "title": "ชื่อหมวดภาษาอังกฤษ" },
                { "data": "subject_th", "className": "nowrap", "title": "ชื่อหมวดภาษาไทย" },
                {
                    "data": "content_en",
                    "title": "เนื้อหาภาษาอังกฤษ",
                    "render": function(data, type, row, meta) {
                        return (row.datatype!='text'?`<a target="_blank" href="{{ asset('/upload/about-us') }}/`+row.content_en+`">`+row.content_en+`</a>`:row.content_en);
                    }
                },
                {
                    "data": "content_th",
                    "title": "เนื้อหาภาษาไทย",
                    "render": function(data, type, row, meta) {
                        return (row.datatype!='text'?`<a target="_blank" href="{{ asset('/upload/about-us') }}/`+row.content_th+`">`+row.content_th+`</a>`:row.content_th);
                    }
                }
            ]
        });
    });
</script>
@endsection