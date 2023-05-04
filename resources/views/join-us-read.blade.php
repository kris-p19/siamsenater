@extends('layouts.frontend')
@section('page-join-us','active')
@section('title',$data->job_name . ' | ' . __('messages.join-us') . ' | ')
@section('keywords',$data->job_name . ' | ' . __('messages.join-us') . ',')
@section('position')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
    <li><a href="{{ url('join-us/all') }}">{{ __('messages.join-us') }}</a></li>
    <li class="active">{{ $data->job_name }}</li>
</ol>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h2 class="panel-titles">
                    <span class="material-icons">work_outline</span>
                    <b class="page-header">{{ $data->job_name }}</b>
                </h2>
            </div>
        </div>
        <div class="row" style="margin-bottom:20px;margin-top:-10px;">
            <div class="col-md-12" style="color:darkkhaki;">
                วันที่รับสมัคร {{ date('d/m/',strtotime($data->date_begin)) . (date('Y',strtotime($data->date_begin))+543) }} - {{ date('d/m/',strtotime($data->date_end)) . (date('Y',strtotime($data->date_end))+543) }}
                <br>
                รับจำนวน {{ $data->maximum_regis }} ตำแหน่ง
            </div>
        </div>
        <div class="row" style="margin-bottom:20px;">
            <div class="col-md-12">
                {!! $data->job_description !!}
            </div>
        </div>
        <div class="row" style="margin-bottom:20px;">
            <div class="col-md-12 text-center">
                <a class="btn btn-warning btn-lg" id="join-us-register">สนใจตำแหน่งงาน</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-register-join-us">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="control-label">ชื่อ <strong style="color:red;">*</strong></label>
                            <input type="text" class="form-control" placeholder="ชื่อ" name="first_name" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">สกุล <strong style="color:red;">*</strong></label>
                            <input type="text" class="form-control" placeholder="สกุล" name="last_name" required autofocus>
                        </div>
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
            const btn = $("#join-us-register");
            const body = $("body");
            btn.on('click',function(){
                body.find('#modal-register-join-us').remove();
                body.append(
                    '<div class="modal fade" id="modal-register-join-us">'+
                        '<form><div class="modal-dialog">'+
                            '<div class="modal-content">'+
                                '<div class="modal-header">'+
                                    '<h3 class="modal-title">สมัครงานตำแหน่ง {{ $data->job_name }}</h3>' +
                                    '<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" required>'+
                                    '<input type="hidden" id="job_id" name="job_id" value="{{ $data->id }}" required>'+
                                '</div/>'+
                                '<div class="modal-body">'+
                                    '<div class="row">'+
                                        '<div class="col-md-6">'+
                                            '<div class="form-group">'+
                                                '<label for="" class="control-label">ชื่อ <strong style="color:red;">*</strong></label>'+
                                                '<input type="text" class="form-control" placeholder="ชื่อ" id="first_name" name="first_name" required autofocus>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                            '<div class="form-group">'+
                                                '<label for="" class="control-label">สกุล <strong style="color:red;">*</strong></label>'+
                                                '<input type="text" class="form-control" placeholder="สกุล" id="last_name" name="last_name" required autofocus>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                            '<div class="form-group">'+
                                                '<label for="" class="control-label">เบอร์โทรศัพท์ <strong style="color:red;">*</strong></label>'+
                                                '<input type="text" class="form-control" placeholder="เบอร์โทรศัพท์" id="phone" name="phone" required autofocus>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                            '<div class="form-group">'+
                                                '<label for="" class="control-label">อีเมล <strong style="color:red;">*</strong></label>'+
                                                '<input type="email" class="form-control" placeholder="อีเมล" id="email" name="email" required autofocus>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                            '<div class="form-group">'+
                                                '<label for="" class="control-label">อายุ <strong style="color:red;">*</strong></label>'+
                                                '<input type="number" class="form-control" placeholder="อายุ" id="age" name="age" required autofocus>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                            '<div class="form-group">'+
                                                '<label for="" class="control-label">วันเดือนปีเกิด <strong style="color:red;">*</strong></label>'+
                                                '<input type="date" class="form-control" placeholder="วันเดือนปีเกิด" id="birth_date" name="birth_date" required autofocus>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                            // '<div class="form-group">'+
                                            //     '<label for="" class="control-label">เลขประจำตัวประชาชน <strong style="color:red;">*</strong></label>'+
                                            //     '<input type="text" class="form-control" placeholder="เลขประจำตัวประชาชน" name="id_card" required autofocus>'+
                                            // '</div>'+
                                            '<div class="form-group">'+
                                                '<label for="" class="control-label">แนบบัตรประจำตัวประชาชน <strong style="color:red;">*</strong></label>'+
                                                '<input type="file" class="form-control" id="id_card_file" name="id_card_file" required autofocus>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="modal-footer">'+
                                    '<button class="btn btn-primary" type="submit">ส่งข้อมูล</button>' +
                                    '<button class="btn btn-default" type="button" data-dismiss="modal">ปิดหน้าต่าง</button>' +
                                '</div/>'+
                            '</div>'+
                        '</div>'+
                    '</form></div>'
                );
                $('#modal-register-join-us').modal('show');
                $('#modal-register-join-us form').unbind('submit');
                $('#modal-register-join-us form').submit(function(e){
                    e.preventDefault();
                    var formData = new FormData();
                    formData.append('id_card_file', $('#id_card_file')[0].files[0]);
                    formData.append('_token', $('#_token').val());
                    formData.append('job_id', $('#job_id').val());
                    formData.append('first_name', $('#first_name').val());
                    formData.append('last_name', $('#last_name').val());
                    formData.append('phone', $('#phone').val());
                    formData.append('email', $('#email').val());
                    formData.append('age', $('#age').val());
                    formData.append('birth_date', $('#birth_date').val());
                    console.log(formData);
                    $.ajax({
                        url:"{{ url('join-us-register') }}",
                        type:"post",
                        cache:false,
                        dataType:"json",
                        processData: false,
                        contentType: false,
                        data:formData,
                        beforeSend:function(){
                            $('body').append('<div id="abc" class="text-center" style="top:0;width:100%;height:100%;position:fixed;z-index:9999;background:#000000c2;"><h4 class="text-center" style="color:white;padding-top:75px;">กำลังส่งข้อมูล...โปรดรอสัดครู่</h4></div>');
                        },
                        error:function(){
                            $("#abc").remove();
                        },
                        success:function(response){
                            // $("#abc").find('h4').text(response.status);
                            if (response.status=='success') {
                                alert(response.msg);
                                $('#modal-register-join-us').modal('hide');
                                window.location.href = "";
                            } else {
                                alert(response.msg);
                                $('#modal-register-join-us').modal('hide');
                                // window.location.href = "";
                            }
                        }
                    });
                });
            });
        });
    </script>
@endsection