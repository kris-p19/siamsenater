@extends('layouts.frontend')
@section('page-contact-us','active')
@section('title',__('messages.contact-us') . ' | ')
@section('keywords',__('messages.contact-us') . ',')
@section('position')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
    <li class="active">{{ __('messages.contact-us') }}</li>
</ol>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h2 class="panel-titles">
                    <span class="material-icons">contact_page</span>
                    <b class="page-header">{{ __('messages.contact-us') }}</b>
                </h2>
            </div>
            <h3 class="text-center panel-titles">{!! $data->conpany_name !!}</h3>
            <p class="text-center"><i class="fa fa-map-marker" aria-hidden="true"></i> {!! $data->address !!}</p>

            <div class="col-md-12" style="margin-bottom:20px;">
                <div class="col-md-offset-4 col-md-4">
                    <div class="pabel panel-default">
                        <div class="panel-body text-center">
                            <span class="glyphicon glyphicon-phone-alt"></span> <a href="tel:{!! $data->phone !!}">{!! $data->phone !!}</a>
                            <i class="fa fa-fax" aria-hidden="true"></i> <a href="tel:{!! $data->fax !!}">{!! $data->fax !!}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12" style="margin-bottom:20px;">
                <div class="col-md-offset-2 col-md-4">
                    <div class="pabel panel-default">
                        <div class="panel-body text-center">
                            <i class="fa fa-address-card" aria-hidden="true"></i>
                            {!! explode('|',$data->contact1st)[0] !!}
                        </div>
                        <div class="panel-footer text-center">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <a href="mailto:{!! explode('|',$data->contact1st)[1] !!}">{!! explode('|',$data->contact1st)[1] !!}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pabel panel-default">
                        <div class="panel-body text-center">
                            <i class="fa fa-address-card" aria-hidden="true"></i>
                            {!! explode('|',$data->contact2st)[0] !!}
                        </div>
                        <div class="panel-footer text-center">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <a href="mailto:{!! explode('|',$data->contact2st)[1] !!}">{!! explode('|',$data->contact2st)[1] !!}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12" style="margin-bottom:20px;">
                <center>
                    {!! !empty($data->url_googlemap)?"<a href='".$data->url_googlemap."' target='_blank'><img src='".asset('images/contact-us/social-gm.png')."' class='img-responsive' style='display:inline;'></a>":"" !!}
                    {!! !empty($data->url_facebook)?"<a href='".$data->url_facebook."' target='_blank'><img src='".asset('images/contact-us/social-fb.png')."' class='img-responsive' style='display:inline;'></a>":"" !!}
                    {!! !empty($data->url_twitter)?"<a href='".$data->url_twitter."' target='_blank'><img src='".asset('images/contact-us/social-tw.png')."' class='img-responsive' style='display:inline;'></a>":"" !!}
                    {!! !empty($data->url_instagram)?"<a href='".$data->url_instagram."' target='_blank'><img src='".asset('images/contact-us/social-ig.png')."' class='img-responsive' style='display:inline;'></a>":"" !!}
                    {!! !empty($data->url_youtube)?"<a href='".$data->url_youtube."' target='_blank'><img src='".asset('images/contact-us/')."' class='img-responsive' style='display:inline;'></a>":"" !!}
                    {!! !empty($data->url_line)?"<a href='".$data->url_line."' target='_blank'><img src='".asset('images/contact-us/social-yt.png')."' class='img-responsive' style='display:inline;'></a>":"" !!}
                    {!! !empty($data->url_tiktok)?"<a href='".$data->url_tiktok."' target='_blank'><img src='".asset('images/contact-us/social-tt.png')."' class='img-responsive' style='display:inline;'></a>":"" !!}
                </center>
            </div>

            <div class="col-md-12" style="margin-bottom:20px;">
                {!! "<a href='".$data->picture_map."' target='_blank'><img src='".$data->picture_map."' style='width:100%;' class='img-responsive'></a>" !!}
            </div>
        </div>
    </div>
</div>
@endsection