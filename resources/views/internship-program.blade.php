@extends('layouts.frontend')
@section('page-internship-program','active')
@section('title',__('messages.internship-program') . ' | ')
@section('keywords',__('messages.internship-program') . ',')
@section('position')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
    <li class="active">{{ __('messages.internship-program') }}</li>
</ol>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h2 class="panel-titles">
                    <span class="material-icons">contact_page</span>
                    <b class="page-header">{{ __('messages.internship-program') }}</b>
                </h2>
                {!! $data->content !!}
            </div>
        </div>
    </div>
</div>
@endsection