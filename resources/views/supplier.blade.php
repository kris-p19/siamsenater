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
            <div class="col-md-12 text-right">
                <a href="{{ url('/logout-token') }}" class="btn btn-danger btn-sm">{{ __('messages.logout') }}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('status'))
                <div class="alert alert-danger">
                    {{ session()->get('msg') }}
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover" style="width:100%:">
                        <thead>
                            <tr>
                                <th>{{ __('messages.list') }}</th>
                                <th>{{ __('messages.file') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $index => $row)
                            <tr>
                                <td>
                                    <p class="title">{{ !empty($row->title)?$row->title:'-' }}</p>
                                </td>
                                <td>
                                    <a style="font-size:30px;color:red;" href="{{ url('supplier-meetings-view/'.$row->id) }}" target="_blank">
                                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection