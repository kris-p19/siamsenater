@extends('layouts.frontend')
@section('page-news-activities','active')
@section('title',$data->title . ' | ' . __('messages.news-activities') . ' | ')
@section('keywords',$data->keyword . ',' . $data->title . ',' . __('messages.news-activities') . ',')
@section('position')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
    <li><a href="{{ url('news-activities') }}">{{ __('messages.news-activities') }}</a></li>
    <li class="active">{{ $data->title }}</li>
</ol>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h3 class="panel-titles">
                    <span class="material-icons" style="font-size:24px;">beenhere</span>
                    <b class="page-header">{{ $data->title }}</b>
                    <div class="pull-right text-right" style="font-size:16px;color:red;margin:10px;">
                        <span class="material-icons" style="font-size:16px;position:relative !important;">calendar_month</span> {{ date('d',strtotime($data->public_datetime)) . ' ' . (__('messages.month.'.strtolower(date('F',strtotime($data->public_datetime))))) . ' ' . (date('Y',strtotime($data->public_datetime))+543) . ' ' . date('H:i',strtotime($data->public_datetime)) }}
                        <span class="material-icons" style="font-size:16px;position:relative !important;">visibility</span> {{ ($data->conter*1) }}
                    </div>
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6" style="margin-bottom: 20px;">
                    <img src="{{ asset('images/news-activites/'.$data->picture_header) }}" class="img-responsive" style="width:100%;" onerror="this.style.display='none'">
                </div>
                <div id="content-new" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 20px;">
                    {!! $data->content !!}
                </div>
                <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 20px;">
                    @if(!empty($data->picture_gallery))
                        <div id="lightgallery">
                            <a class="selector" href="{{ asset('images/news-activites/'.$data->picture_header) }}" data-sub-html="{{ $data->title }}">
                                <img src="{{ asset('images/news-activites/'.$data->picture_header) }}" style="width:150px;height:150px;object-fit:cover;" onerror="this.style.display='none'">
                            </a>
                            @foreach(json_decode($data->picture_gallery) as $index => $info)
                            <a class="selector" href="{{ asset('images/news-activites/'.$info) }}" data-sub-html="{{ $data->title }}">
                                <img src="{{ asset('images/news-activites/'.$info) }}" style="width:150px;height:150px;object-fit:cover;" onerror="this.style.display='none'">
                            </a>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 20px;">
                    {!! $data->keyword !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('#lightgallery').lightGallery({
            thumbnail: true,
            selector: '.selector'
        });
        $("#content-new").find("img").each(function(){
            $(this).addClass("img-responsive")
        });
    });
</script>
@endsection