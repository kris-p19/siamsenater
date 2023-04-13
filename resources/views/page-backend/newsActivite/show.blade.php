@extends('layouts.backend')
@section('webadmin-news-activities','active')

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
            <h3 class="card-title">{{ __('messages.news-activities') }}</h3>
            <a style="border-radius:45px;" href="{{ url('/webadmin/news-activities/create') }}" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มรายการ</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-condensed" style="width:100%;">
                    {{-- <thead>
                        <th class="text-center nowrap">ลำดับ</th>
                        <th class="text-center nowrap">กิจกรรม</th>
                        <th class="text-center nowrap">ชื่อเรื่อง</th>
                        <th class="text-center nowrap">ภาพส่วนหัว</th>
                        <th class="text-center nowrap">อัลบั้มภาพ</th>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $row)
                        <tr>
                            <td class="text-center">{!! $index+1 !!}</td>
                            <td class="text-center">
                                <a style="border-radius:45px;width:100px;" onclick="if(confirm('ยืนยันการทำรายการ?')){ window.location.href=$(this).data('href'); }" data-href="{{ url('/webadmin/news-activities/delete/'.$row->id) }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash" aria-hidden="true"></i> ลบ</a>
                                <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/news-activities/edit/'.$row->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> แก้ไข</a>
                                <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/news-activities/update-status/'.$row->id.'/'.($row->status=='active'?'inactive':'active')) }}" class="btn btn-outline-{{ ($row->status=='active'?'primary':'secondary') }} btn-sm"><i class="fa fa-{{ ($row->status=='active'?'eye':'eye-slash') }}" aria-hidden="true"></i> {{ ($row->status=='active'?'เผยแพร่':'ไม่เผยแพร่') }}</a>
                            </td>
                            <td>{!! $row->title_th !!}<hr>{!! $row->title_en !!}</td>
                            <td><img src="{{ asset('images/news-activites/'.$row->picture_header) }}" class="img-responsive" style="width:150px;" onerror="this.style.display='none'"></td>
                            <td>
                                <div class="row">
                                    @if(!empty($row->picture_gallery))
                                        @foreach(json_decode($row->picture_gallery) as $index => $info)
                                            <div class="col-md-4">
                                                <img src="{{ asset('images/news-activites/'.$info) }}" style="width:100%;" class="img-responsive" onerror="this.style.display='none'">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </td>
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
            "ajax": "{{ url('webadmin/news-activities-ajax') }}",
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
                        return `<a style="border-radius:45px;width:100px;" onclick="if(confirm('ยืนยันการทำรายการ?')){ window.location.href=$(this).data('href'); }" data-href="{{ url('/webadmin/news-activities/delete') }}/`+row.id+`" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash" aria-hidden="true"></i> ลบ</a>
                        <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/news-activities/edit') }}/`+row.id+`" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> แก้ไข</a>
                        <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/news-activities/update-status') }}/`+row.id+`/`+(row.status=='active'?'inactive':'active')+`" class="btn btn-outline-`+(row.status=='active'?'primary':'secondary')+` btn-sm"><i class="fa fa-`+(row.status=='active'?'eye':'eye-slash')+`" aria-hidden="true"></i> `+(row.status=='active'?'เผยแพร่':'ไม่เผยแพร่')+`</a>`;
                    }
                },
                { "data": "title_th", "title": "ชื่อเรื่องไทย", "className": "nowrap" },
                { "data": "title_en", "title": "ชื่อเรื่องอังกฤษ", "className": "nowrap" },
                { "data": "group_type_th", "title": "ประเภทภาษาไทย", "className": "nowrap" },
                { "data": "group_type_en", "title": "ประเภทภาษาอังกฤษ", "className": "nowrap" },
                { 
                    "data": "picture_header", "title": "ภาพ", 
                    "render": function(data, type, row, meta) {
                        return `<img src="{{ asset('images/news-activites') }}/`+data+`" class="img-responsive" style="width:150px;" onerror="this.style.display='none'">`;
                    }
                },
                { 
                    "data": "picture_gallery", "title": "อัลบั้มภาพ", 
                    "render": function(data, type, row, meta) {
                        return row.gallery;
                    }
                }
                
            ]
        });
    });
</script>
@endsection