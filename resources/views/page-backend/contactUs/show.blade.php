@extends('layouts.backend')
@section('webadmin-contact-us','active')

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
            <h3 class="card-title">{{ __('messages.contact-us') }}</h3>
            <a style="border-radius:45px;width:100px;" href="{{ url('/webadmin/contact-us/edit/'.$data->id) }}" class="btn btn-outline-warning btn-sm float-right"><i class="fas fa-edit" aria-hidden="true"></i> แก้ไข</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ชื่อบริษัทภาษาอังกฤษ</label>
                        <input type="text" class="form-control" name="conpany_name_en" placeholder="ชื่อบริษัทภาษาอังกฤษ" autofocus readonly value="{!! $data->conpany_name_en !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ชื่อบริษัทภาษาไทย</label>
                        <input type="text" class="form-control" name="conpany_name_th" placeholder="ชื่อบริษัทภาษาไทย" autofocus readonly value="{!! $data->conpany_name_th !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ที่อยู่บริษัทภาษาอังกฤษ</label>
                        <input type="text" class="form-control" name="address_en" placeholder="ที่อยู่บริษัทภาษาอังกฤษ" autofocus readonly value="{!! $data->address_en !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ที่อยู่บริษัทภาษาไทย</label>
                        <input type="text" class="form-control" name="address_th" placeholder="ที่อยู่บริษัทภาษาไทย" autofocus readonly value="{!! $data->address_th !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>โทรศัพท์</label>
                        <input type="text" class="form-control" name="phone" placeholder="โทรศัพท์" autofocus readonly value="{!! $data->phone !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>แฟกซ์</label>
                        <input type="text" class="form-control" name="fax" placeholder="แฟกซ์" autofocus readonly value="{!! $data->fax !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ผู้ติดต่อคนที่ 1 ภาษาอังกฤษ</label>
                        <input type="text" class="form-control" name="contact1st_en" placeholder="ผู้ติดต่อคนที่ 1 ภาษาอังกฤษ" autofocus readonly value="{!! $data->contact1st_en !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ผู้ติดต่อคนที่ 1 ภาษาไทย</label>
                        <input type="text" class="form-control" name="contact1st_th" placeholder="ผู้ติดต่อคนที่ 1 ภาษาไทย" autofocus readonly value="{!! $data->contact1st_th !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ผู้ติดต่อคนที่ 2 ภาษาอังกฤษ</label>
                        <input type="text" class="form-control" name="contact2st_en" placeholder="ผู้ติดต่อคนที่ 2 ภาษาอังกฤษ" autofocus readonly value="{!! $data->contact2st_en !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ผู้ติดต่อคนที่ 2 ภาษาไทย</label>
                        <input type="text" class="form-control" name="contact2st_th" placeholder="ผู้ติดต่อคนที่ 2 ภาษาไทย" autofocus readonly value="{!! $data->contact2st_th !!}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>ลิงค์ภาพแผนที่ตั้ง</label>
                        <input type="text" class="form-control" name="picture_map" placeholder="ลิงค์ภาพแผนที่ตั้ง" autofocus readonly value="{!! $data->picture_map !!}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>ลิงค์ตำแหน่งบริษัท Google Map</label>
                        <input type="text" class="form-control" name="url_googlemap" placeholder="ลิงค์ตำแหน่งบริษัท Google Map" autofocus readonly value="{!! $data->url_googlemap !!}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>ลิงค์ Facebook</label>
                        <input type="text" class="form-control" name="url_facebook" placeholder="https://www.facebook.com/YourFacebook" autofocus readonly value="{!! $data->url_facebook !!}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>ลิงค์ Twitter</label>
                        <input type="text" class="form-control" name="url_twitter" placeholder="https://twitter.com/YourTwitterID" autofocus readonly value="{!! $data->url_twitter !!}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>ลิงค์ Instagram</label>
                        <input type="text" class="form-control" name="url_instagram" placeholder="https://www.instagram.com/YourInstagramID" autofocus readonly value="{!! $data->url_instagram !!}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>ลิงค์ YouTube</label>
                        <input type="text" class="form-control" name="url_youtube" placeholder="https://www.youtube.com/channel/YourChannelID" autofocus readonly value="{!! $data->url_youtube !!}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>ลิงค์ Line</label>
                        <input type="text" class="form-control" name="url_line" placeholder="https://line.me/ti/p/~@YourLineID" autofocus readonly value="{!! $data->url_line !!}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>ลิงค์ Tiktok</label>
                        <input type="text" class="form-control" name="url_tiktok" placeholder="https://www.tiktok.com/@YourTiktok" autofocus readonly value="{!! $data->url_tiktok !!}">
                    </div>
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