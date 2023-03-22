@extends('layouts.frontend')
@section('page-join-us','active')
@section('title',__('messages.join-us') . ' | ')
@section('keywords',__('messages.join-us') . ',')
@section('position')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
    <li class="active">{{ __('messages.join-us') }}</li>
</ol>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h2 class="panel-titles">
                    <span class="material-icons">groups</span>
                    <b class="page-header">{{ __('messages.join-us') }}</b>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="list-group">
                    @if(empty(count($data)))<a href="javascript:void(0);" class="list-group-item" style="border:0px;">{{ __('messages.empty') }}</a>@endif
                    @foreach ($data as $item)
                    <a href="{{ url('join-us-read/'.$item->id) }}" class="list-group-item">
                        <p class="title">
                            {{ date('d/m/',strtotime($item->date_begin)) . (date('Y',strtotime($item->date_begin))+543) }} - {{ date('d/m/',strtotime($item->date_end)) . (date('Y',strtotime($item->date_end))+543) }}
                            {{ $item->job_name }}
                            รับจำนวน {{ $item->maximum_regis }} ตำแหน่ง
                        </p>
                    </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection