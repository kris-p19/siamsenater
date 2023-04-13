@extends('layouts.frontend')
@section('page-one-stop-service','active')
@section('title',__('messages.one-stop-service') . ' | ')
@section('keywords',__('messages.one-stop-service') . ',')
@section('position')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
    <li class="active">{{ __('messages.one-stop-service') }}</li>
</ol>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h2 class="panel-titles">
                    <span class="material-icons">contact_page</span>
                    <b class="page-header">{{ __('messages.one-stop-service') }}</b>
                </h2>
                {!! $data->content !!}
            </div>
        </div>
    </div>
</div>
@endsection