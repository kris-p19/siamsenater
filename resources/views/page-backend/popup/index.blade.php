@extends('layouts.backend')
@section('webadmin-pupup','active')

@section('content')
<div class="col-md-12">
    @if(session()->has('status') && session()->has('msg'))
        <div class="alert alert-{!! session()->get('status') !!} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> แจ้งเตือน!</h5>
            {!! date('Y-m-d H:i:s') !!} - {!! session()->get('msg')  !!}
        </div>
    @endif
    <form method="post" enctype="multipart/form-data" action="{{ url('webadmin/pupup/create') }}">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ฟอร์มกรอกข้อมูล {{ __('messages.pupup') }}</h3>
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
            <h3 class="card-title">ประวัติ {{ __('messages.pupup') }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered" style="width:100%;">
                            {{-- <thead>
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
                                        <td class="text-center"><a href="{{ asset('images/popup/'.$item->picture) }}" target="_blank"><img src="{{ asset('images/popup/'.$item->picture) }}" class="img-responsive" style="width:200px;"></a></td>
                                        <td class="text-left">
                                            @if($item->url=='empty')
                                                ไม่มีลิงค์
                                            @else
                                                <a href="{{ $item->url }}">{{ $item->url }}</a>
                                            @endif
                                        </td>
                                        <td class="text-left">
                                            @if($item->status=='active')
                                                <a href="{{ url('webadmin/pupup/update-status') }}?status=inactive&id={{ $item->id }}" style="color:green;">{{ $item->status }}</a>
                                            @else
                                                <a href="{{ url('webadmin/pupup/update-status') }}?status=active&id={{ $item->id }}" style="color:red;">{{ $item->status }}</a>
                                            @endif
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
    var table;
    $(document).ready( function () {
        table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url('webadmin/pupup-ajax') }}",
            "language": {
                "url": '//cdn.datatables.net/plug-ins/1.13.4/i18n/th.json',
            },
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
                    "data": "picture",
                    "title": "ภาพ",
                    "className": "nowrap text-center",
                    "render": function(data, type, row, meta) {
                        return `<a href="{{ asset('images/popup') }}/`+data+`" target="_blank"><img src="{{ asset('images/popup') }}/`+data+`" class="img-responsive" style="width:200px;"></a>`;
                    }
                },
                { "data": "url", "title": "ลิงค์" },
                {
                    "data": "status",
                    "title": "สถานะ",
                    "className": "nowrap text-center",
                    "render": function(data, type, row, meta) {
                        if(data=='active') {
                            return `<a href="{{ url('webadmin/pupup/update-status') }}?status=inactive&id=`+row.id+`" style="color:green;">`+data+`</a>`;
                        } else {
                            return `<a href="{{ url('webadmin/pupup/update-status') }}?status=active&id=`+row.id+`" style="color:red;">`+data+`</a>`;
                        }
                    }
                }
            ]
        });
    });
</script>
@endsection