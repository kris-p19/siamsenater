@extends('layouts.frontend')
@section('page-our-service','active')
@section('title',__('messages.our-service') . ' | ')
@section('keywords',__('messages.our-service') . ',')
@section('position')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
    <li class="active">{{ __('messages.our-service') }}</li>
</ol>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h2 class="panel-titles">
                    <span class="material-icons">info_outline</span>
                    <b class="page-header">{{ __('messages.our-service') }}</b>
                </h2>
            </div>
        </div>

        <div class="row">
            @foreach($data as $item)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="panel panel-default hover">
                    <div class="panel-body">
                        <a href="{{ url('our-service/read/'.$item->id) }}">
                            <img class="media-object" src="{{ asset('images/our-service/'.$item->picture_header) }}" style="width:100%;object-fit:cover;" onerror="this.style.display='none';">
                        </a>
                        <h4 class="media-heading title">{!! $item->service_name !!}</h4>
                        <p>{!! $item->service_desciption !!}</p>
                        <p>@foreach(explode(',',$item->hastag) as $hastag) <label class="label label-default">{!! $hastag !!}</label> @endforeach</p>
                        <p><a href="{{ url('our-service/read/'.$item->id) }}" class="btn btn-primary">{{ __('messages.detail') }}</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection