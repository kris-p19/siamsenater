@extends('layouts.frontend')
@section('page-supplier-meeting','active')
@section('title',__('messages.supplier-meeting') . ' | ')
@section('keywords',__('messages.supplier-meeting') . ',')
@section('position')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
    <li class="active">{{ __('messages.supplier-meeting') }}</li>
</ol>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h2 class="panel-titles">
                    <span class="material-icons">groups</span>
                    <b class="page-header">{{ __('messages.supplier-meeting') }}</b>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('/logout-token') }}">{{ __('messages.logout') }}</a>
                @if(session()->has('status'))
                <div class="alert alert-danger">
                    {{ session()->get('msg') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection