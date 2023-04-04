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

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">ผู้สมัครงาน</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    {{-- <a class="btn btn-success" onclick="doit('xlsx');">บันทึกเป็น Excel</a> --}}
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered" style="width:100%;">
                            {{-- <thead>
                                <tr>
                                    <th class="text-center" style="white-space:nowrap;">ลำดับ</th>
                                    <th class="text-center" style="white-space:nowrap;">Job Name</th>
                                    <th class="text-center" style="white-space:nowrap;">ชื่อ</th>
                                    <th class="text-center" style="white-space:nowrap;">สกุล</th>
                                    <th class="text-center" style="white-space:nowrap;">เบอร์โทร</th>
                                    <th class="text-center" style="white-space:nowrap;">อีเมล</th>
                                    <th class="text-center" style="white-space:nowrap;">อายุ</th>
                                    <th class="text-center" style="white-space:nowrap;">วันเกิด</th>
                                    <th class="text-center" style="white-space:nowrap;">id card</th>
                                    <th class="text-center" style="white-space:nowrap;">วันที่สมัคร</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $item)
                                    <tr>
                                        <td class="text-center">{{ ($index+1) }}</td>
                                        <td><a href="{{ url('join-us-read/'.$item->job_id) }}" target="_blank">{{ DB::table('join_us_jobs')->where('id',$item->job_id)->first()->job_name_th }}</a></td>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>`{{ base64_decode($item->phone) }}</td>
                                        <td>{{ base64_decode($item->email) }}</td>
                                        <td>{{ $item->age }}</td>
                                        <td>{{ $item->birth_date }}</td>
                                        <td>`{{ base64_decode($item->id_card) }}</td>
                                        <td>{{ $item->created_at }}</td>
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
<script src="https://cdn.sheetjs.com/xlsx-latest/package/dist/shim.min.js"></script>
<script src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>
<script src="https://unpkg.com/blob.js@1.0.1/Blob.js"></script>
<script src="https://unpkg.com/file-saver@1.3.3/FileSaver.js"></script>
<script>
    function doit(type, fn, dl) {
        var elt = document.getElementById('data-table');
        var wb = XLSX.utils.table_to_book(elt, {sheet:"Join US"});
        return dl ?
            XLSX.write(wb, {bookType:type, bookSST:true, type: 'base64'}) :
            XLSX.writeFile(wb, fn || ('{{ time() }}.' + (type || 'xlsx')));
    }

    var table;
    $(document).ready( function () {
        table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url('webadmin/join-us-is-join-ajax') }}",
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
                { "data": "job", "title": "Job Name" },
                { "data": "first_name", "title": "ชื่อ" },
                { "data": "last_name", "title": "สกุล" },
                { "data": "de_phone", "name": "phone", "title": "เบอร์โทร" },
                { "data": "de_email", "name": "email", "title": "อีเมล" },
                { "data": "age", "title": "อายุ" },
                { "data": "birth_date", "title": "วันเกิด" },
                { "data": "de_id_card", "name": "id_card", "title": "id card" },
                { "data": "created_at", "title": "วันที่สมัคร" },
            ]
        });
    });
</script>
@endsection