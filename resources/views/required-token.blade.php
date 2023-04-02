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
            <div class="col-md-offset-3 col-md-6">
                <h4 class="text-center">{{ __('messages.authenticate-to-access-information') }}</h4>
                @if(session()->has('status'))
                <div class="alert alert-danger">
                    {{ session()->get('msg') }}
                </div>
                @endif
                <form action="{{ url('required-token') }}" method="post">
                    @csrf
                    <div class="form-group @error('username') has-error @enderror">
                        <label class="control-label">{{ __('messages.username') }}</label>
                        <input autocomplete="off" value="{{ old('username') }}" type="text" name="username" class="form-control" placeholder="{{ __('messages.username') }}">
                        @error('username')
                            <span id="helpBlock2" class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('token') has-error @enderror">
                        <label class="control-label">{{ __('messages.password') }}</label>
                        <input autocomplete="off" value="{{ old('token') }}" type="password" name="token" class="form-control" placeholder="{{ __('messages.password') }}">
                        @error('token')
                            <span id="helpBlock2" class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">{{ __('messages.login') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection