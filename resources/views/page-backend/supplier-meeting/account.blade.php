@extends('layouts.backend')
@section('webadmin-supplier-meeting','active')

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
            <h3 class="card-title">{{ __('messages.supplier-meeting-account') }}</h3>
            <a style="border-radius:45px;" onclick="create()" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> สร้างผู้ใช้ใหม่</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-bordered table-condensed">
                    <thead>
                        <th class="text-center nowrap">ลำดับ</th>
                        <th class="text-center nowrap">กิจกรรม</th>
                        <th class="text-center nowrap">ชื่อซัพพลายเออร์</th>
                        <th class="text-center nowrap">Username</th>
                        <th class="text-center nowrap">Password</th>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $row)
                        <tr>
                            <td class="text-center">{!! $index+1 !!}</td>
                            <td class="text-center">
                                <a style="border-radius:45px;width:100px;" onclick="if(confirm('ยืนยันการทำรายการ?')){ window.location.href=$(this).data('href'); }" data-href="{{ url('/webadmin/supplier-meeting/account-delete/'.$row->id) }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash" aria-hidden="true"></i> ลบ</a>
                                <a style="border-radius:45px;width:100px;" 
                                    onclick="edit(this)"
                                    data-id="{{ $row->id }}"
                                    data-supplier_name="{{ $row->supplier_name }}"
                                    data-username="{{ $row->username }}"
                                    data-token="{{ $row->token }}" 
                                    class="btn btn-outline-warning btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> แก้ไข</a>
                                <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/supplier-meeting/account-update-status/'.$row->id.'/'.($row->status=='active'?'inactive':'active')) }}" class="btn btn-outline-{{ ($row->status=='active'?'primary':'secondary') }} btn-sm"><i class="fa fa-{{ ($row->status=='active'?'eye':'eye-slash') }}" aria-hidden="true"></i> {{ ($row->status=='active'?'เปิดใช้งาน':'ปิดใช้งาน') }}</a>
                            </td>
                            <td>{{ $row->supplier_name }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->token }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function edit(e) {
        Swal.fire({
            title: 'แก้ไขข้อมูล ' + $(e).data('supplier_name'),
            html:
                '<div class="form-group"><label style="width:100%;" class="text-left control-label">Supplier name</label><input id="supplier_name" class="form-control" placeholder="Supplier name" value="' + $(e).data('supplier_name') + '"></div>' +
                '<div class="form-group"><label style="width:100%;" class="text-left control-label">Username</label><input id="username" class="form-control" placeholder="Username" value="' + $(e).data('username') + '"></div>' +
                '<div class="form-group"><label style="width:100%;" class="text-left control-label">Password</label><input id="token" class="form-control" placeholder="Password" value="' + $(e).data('token') + '"></div>',
            showCancelButton: true,
            confirmButtonText: 'อัพเดต',
            preConfirm: () => {
                const id = $(e).data('id');
                const supplier_name = document.getElementById('supplier_name').value;
                const username = document.getElementById('username').value;
                const token = document.getElementById('token').value;
                return { 
                    id: id,
                    supplier_name: supplier_name,
                    username: username,
                    token: token
                };
            },
            allowOutsideClick: () => !Swal.isLoading(),
            didOpen: () => {
                document.getElementById('supplier_name').focus();
            }
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.showLoading();
                $.ajax({
                    url: '{{ url("webadmin/supplier-meeting/account-edit") }}',
                    type: 'get',
                    data: result.value,
                    success: () => {
                        Swal.fire('Submitted successfully!');
                        setTimeout(() => {
                            window.location.href=""; 
                        }, 500);
                    },
                    error: () => {
                        Swal.fire('Oops...', 'Something went wrong!', 'error');
                    }
                });
            }
        });
    }
    function create() {
        Swal.fire({
            title: 'สร้างผู้ใช้งานใหม่',
            html:
                '<div class="form-group"><label style="width:100%;" class="text-left control-label">Supplier name</label><input id="supplier_name" class="form-control" placeholder="Supplier name"></div>' +
                '<div class="form-group"><label style="width:100%;" class="text-left control-label">Username</label><input id="username" class="form-control" placeholder="Username"></div>' +
                '<div class="form-group"><label style="width:100%;" class="text-left control-label">Password</label><input id="token" class="form-control" placeholder="Password"></div>',
            showCancelButton: true,
            confirmButtonText: 'สร้าง',
            preConfirm: () => {
                const supplier_name = document.getElementById('supplier_name').value;
                const username = document.getElementById('username').value;
                const token = document.getElementById('token').value;
                return { 
                    supplier_name: supplier_name,
                    username: username,
                    token: token
                };
            },
            allowOutsideClick: () => !Swal.isLoading(),
            didOpen: () => {
                document.getElementById('supplier_name').focus();
            }
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.showLoading();
                $.ajax({
                    url: '{{ url("webadmin/supplier-meeting/account-create") }}',
                    type: 'get',
                    data: result.value,
                    success: () => {
                        Swal.fire('Submitted successfully!');
                        setTimeout(() => {
                            window.location.href=""; 
                        }, 500);
                    },
                    error: () => {
                        Swal.fire('Oops...', 'Something went wrong!', 'error');
                    }
                });
            }
        });
    }
</script>
@endsection