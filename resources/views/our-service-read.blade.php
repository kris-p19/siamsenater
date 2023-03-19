@extends('layouts.frontend')
@section('page-our-service','active')
@section('title',$data->service_name . ' | ' . __('messages.our-service') . ' | ')
@section('keywords',$data->service_name . ',' . __('messages.our-service') . ',')
@section('position')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
    <li><a href="{{ url('our-service') }}">{{ __('messages.our-service') }}</a></li>
    <li class="active">{{ $data->service_name }}</li>
</ol>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h2 class="panel-titles">
                    <span class="material-icons">info_outline</span>
                    <b class="page-header">{{ $data->service_name }}</b>
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-offest-3 col-sm-6 col-md-offset-4 col-md-4">
                <div class="panel panel-default hover">
                    <div class="panel-body">
                        <a href="{{ url('our-service/read/'.$data->id) }}">
                            <img class="media-object" src="{{ asset('images/our-service/'.$data->picture_header) }}" style="width:100%;object-fit:cover;" onerror="this.style.display='none';">
                        </a>
                        <h4 class="media-heading title">{!! $data->service_name !!}</h4>
                        <p>{!! $data->service_desciption !!}</p>
                        <p>@foreach(explode(',',$data->hastag) as $hastag) <label class="label label-default">{!! $hastag !!}</label> @endforeach</p>
                        <p><a href="{{ url('our-service/read/'.$data->id) }}" class="btn btn-primary">{{ __('messages.detail') }}</a></p>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($item as $row)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default hover">
                    <div class="panel-body">
                        <div class="media">
                            <div class="media-left">
                              <a href="#">
                                <img class="media-object" src="{{ asset('images/our-service-items/'.$row->picture) }}" style="width:150px;object-fit:cover;" onerror="this.style.display='none';">
                              </a>
                            </div>
                            <div class="media-body">
                              <h4 class="media-heading">{!! $row->name !!}</h4>
                            </div>
                            Description
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection