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
    <form method="post" enctype="multipart/form-data" id="quickForm">
        @csrf
        <input type="hidden" name="id_form" id="id_form" value="{{ Illuminate\Support\Str::random(30) }}">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('messages.news-activities') }} - สร้างรายการใหม่</h3>
                <a style="border-radius:45px;margin-left:10px;" href="{{ url('/webadmin/news-activities') }}" class="btn btn-default btn-sm float-right"><i class="ion-arrow-left-b"></i> ย้อนกลับ</a>
                <button style="border-radius:45px;margin-left:10px;" type="submit" class="btn btn-primary btn-sm float-right"><i class="ion-checkmark-circled"></i> บันทึก</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ประเภทภาษาไทย</label>
                            <select name="group_type_th" class="form-control">
                                <option value="ประกาศ">ประกาศ</option>
                                <option value="เหตุการณ์">เหตุการณ์</option>
                                <option value="บทความ">บทความ</option>
                            </select>
                            @error('group_type_th')
                                <small class="form-text color-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ประเภทภาษาอังกษ</label>
                            <select name="group_type_en" class="form-control">
                                <option value="Announcement">Announcement</option>
                                <option value="Event">Event</option>
                                <option value="Article">Article</option>
                            </select>
                            @error('group_type_en')
                                <small class="form-text color-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อเรื่องภาษาไทย</label>
                            <input type="text" class="form-control" autofocus placeholder="ชื่อเรื่องภาษาไทย" name="title_th">
                            @error('title_th')
                                <small class="form-text color-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>เนื้อหาข่าวภาษาไทย</label>
                            <textarea class="form-control" autofocus placeholder="เนื้อหาข่าวภาษาไทย" id="editor_content_th" name="content_th"></textarea>
                            @error('content_th')
                                <small class="form-text color-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>คีเวร์ดภาษาไทย</label>
                            <textarea class="form-control" autofocus placeholder="คีเวร์ดภาษาไทย" name="keyword_th"></textarea>
                            @error('keyword_th')
                                <small class="form-text color-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อเรื่องภาษาอังกฤษ</label>
                            <input type="text" class="form-control" autofocus placeholder="ชื่อเรื่องภาษาอังกฤษ" name="title_en">
                            @error('title_en')
                                <small class="form-text color-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>เนื้อหาข่าวภาษาอังกฤษ</label>
                            <textarea class="form-control" autofocus placeholder="เนื้อหาข่าวภาษาอังกฤษ" id="editor_content_en" name="content_en"></textarea>
                            @error('content_en')
                                <small class="form-text color-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>คีเวร์ดภาษาอังกฤษ</label>
                            <textarea class="form-control" autofocus placeholder="คีเวร์ดภาษาอังกฤษ" name="keyword_en"></textarea>
                            @error('keyword_en')
                                <small class="form-text color-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-md-4">
                        <div class="form-group">
                            <label>ภาพส่วนหัว</label>
                            <input type="file" class="form-control" autofocus placeholder="ภาพส่วนหัว" name="picture_header">
                            @error('picture_header')
                                <small class="form-text color-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>อัลบั้มภาพ</label>
                            <input type="file" class="form-control" autofocus placeholder="อัลบั้มภาพ" id="picture_gallery" name="picture_gallery[]" multiple>
                            @error('picture_gallery')
                                <small class="form-text color-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>วันที่เผยแพร่ข่าว</label>
                            <input type="datetime-local" class="form-control" autofocus placeholder="วันที่เผยแพร่ข่าว" name="public_datetime">
                            @error('public_datetime')
                                <small class="form-text color-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    // function getTmp() {
    //     $.ajax({
    //         url: '{{ url("webadmin/news-activities/getTmp") }}', 
    //         type: 'get',
    //         dataType: 'json',
    //         success: function (response) {
    //             console.log(response);
    //         }
    //     });
    // }
    // function uploadImageTmp() {
    //     var form_data = new FormData();
    //     var totalfiles = document.getElementById('picture_gallery').files.length;
    //     for (var index = 0; index < totalfiles; index++) {
    //         form_data.append("picture_gallery", document.getElementById('picture_gallery').files[index]);
    //         form_data.append("_token", "{{ csrf_token() }}");
    //         form_data.append("id_form", document.getElementById('id_form'));
    //         form_data.append("type", "insert");
    //         $.ajax({
    //             url: '{{ url("webadmin/news-activities/uploadTmp") }}', 
    //             type: 'post',
    //             data: form_data,
    //             dataType: 'json',
    //             contentType: false,
    //             processData: false,
    //             success: function (response) {
    //                 getTmp();
    //             }
    //         });
    //     }
    // }
    $(document).ready(function(){
        CKEDITOR.replace("editor_content_th");
        CKEDITOR.replace("editor_content_en");
        CKEDITOR.config.height = 300;
        // getTmp();
    });
</script>
@endsection