@extends('layouts.frontend')
@section('page-news-activities','active')
@section('title',__('messages.news-activities') . ' | ')
@section('keywords',__('messages.news-activities') . ',')
@section('position')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
    @if(!empty($group))
    <li><a href="{{ url('news-activities') }}">{{ __('messages.news-activities') }}</a></li>
    <li class="active">{{ $group }}</li>
    @else
    <li class="active">{{ __('messages.news-activities') }}</li>
    @endif
</ol>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h2 class="panel-titles">
                    <span class="material-icons">newspaper</span>
                    <b class="page-header">{{ !empty($group)?$group:__('messages.news-activities') }}</b>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            @foreach ($first_item as $item)
            <div class="col-md-4">
                <div class="thumbnail" style="cursor:pointer;background-color: #ffe8d6;padding:0px;border:0px;" onclick="window.location.href=$(this).data('href');" data-href="{{ url('news-activities/read/'.$item->id) }}">
                    <img src="{{ asset('images/news-activites/'.$item->picture_header) }}" alt="{{ $item->title }}" style="object-fit: cover;width:100%;height:300px;" onerror="this.style.display='none';">
                    <div class="caption">
                        <p style="color:red;"><span class="material-icons" style="font-size:16px;position:relative !important;">calendar_month</span> {{ date('d',strtotime($item->public_datetime)) . ' ' . (__('messages.month.'.strtolower(date('F',strtotime($item->public_datetime))))) . ' ' . (date('Y',strtotime($item->public_datetime))+543) }} <label class="label label-danger">{{ $item->group_type }}</label></p>
                        <h4 class="title" style="font-weight:normal;">{{ $item->title }}</h4>
                        <p class="text-right"><a href="{{ url('news-activities/read/'.$item->id) }}" class="btn btn-primary" role="button" style="border-radius:20px;"><span class="glyphicon glyphicon-eye-open"></span> {{ __('messages.read') }}</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="list-group">
                    @foreach ($second_item as $item)
                    <a href="{{ url('news-activities/read/'.$item->id) }}" class="list-group-item">
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-1 col-lg-1">
                                <img src="{{ asset('images/news-activites/'.$item->picture_header) }}" alt="{{ $item->title }}" style="object-fit: cover;width:100%;" onerror="this.style.display='none';">
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-11 col-lg-11">
                                <p class="title">{{ $item->title }}</p>
                                <p style="color:red;">
                                    <span class="material-icons" style="font-size:16px;position:relative !important;">calendar_month</span> {{ date('d',strtotime($item->public_datetime)) . ' ' . (__('messages.month.'.strtolower(date('F',strtotime($item->public_datetime))))) . ' ' . (date('Y',strtotime($item->public_datetime))+543) }}
                                    <label class="label label-danger">{{ $item->group_type }}</label>
                                </p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection