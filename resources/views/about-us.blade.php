@extends('layouts.frontend')
@section('page-about-us','active')
@section('title',$title . ' | ')
@section('keywords',$title . ',')

@section('position')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
    <li class="active">{{ __('messages.about-us') }}</li>
    <li class="active">{{ $title }}</li>
</ol>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h2 class="panel-titles">
                    <span class="material-icons">{{ $icon }}</span>
                    <b class="page-header">{{ $title }}</b>
                </h2>
            </div>
            <div class="col-md-3">
                <ul class="list-group">
                    @foreach ($menu as $index => $item)
                    <a class="list-group-item {{ $active==$item->id?'active':'' }}" style="margin:10px;border-radius:45px;" href="{{ url($item->path) }}"><div class="icon"><span class="material-icons">{{ $item->icon }}</span> <span class="after-icon">{{ $item->subject }}</span></div></a>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-9">
                @foreach ($content as $index => $item)
                    <div class="row" style="padding-bottom:30px;">
                        <div class="col-md-12" style="border-bottom: 1px solid #eee;padding-bottom:10px;">
                            <div class="col-md-3 text-right title" style="margin-bottom:10px;"><b>{!! $item->subject !!}</b></div>
                            <div class="col-md-9">
                                @if($item->datatype=='image')
                                    <a href="{{ asset('upload/about-us/'.$item->content) }}" target="_blank">
                                        <img src="{{ asset('upload/about-us/'.$item->content) }}" class="img-responsive">
                                    </a>
                                @elseif($item->datatype=='file')
                                    <a href="{{ asset('upload/about-us/'.$item->content) }}" target="_blank">
                                        <img src="{{ asset('images/'.explode('.',$item->content)[1].'.png') }}" style="width:40px;" class="img-responsive">
                                    </a>
                                @else
                                    {!! $item->content !!}
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection