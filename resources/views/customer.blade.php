@extends('layouts.frontend')
@section('page-customer','active')
@section('title',__('messages.customer') . ' | ')
@section('keywords',__('messages.customer') . ',')

@section('position')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
    <li class="active">{{ __('messages.customer') }}</li>
</ol>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h2 class="panel-titles">
                    <span class="material-icons">support_agent</span>
                    <b class="page-header">{{ __('messages.customer') }}</b>
                </h2>
            </div>
        </div>

        <div class="row">
            @foreach ($data as $index => $item)
            <div class="col-xs-6 col-sm-4 col-md-3 col-md-3">
                <div class="panel panel-default" data-toggle="modal" data-target="#dialog-gallery" onclick="setModalContent({{$index}})">
                    <div class="panel-body">
                        <a>
                            <img src="{{ asset('images/customers/'.$item->customer_logo) }}" class="img-responsive" style="width:100%;border-radius:10px;padding: 10px;">
                            @if(!empty($item->name))<h4 class="title">{{ $item->name }}</h4>@endif
                        </a>
                    </div>
                </div>
            </div>
            <div style="display:none;" id="images_{{$index}}">{{ asset('images/customers/'.$item->customer_logo) }}</div>
            <div style="display:none;" id="title_{{$index}}">{!! $item->name !!}</div>
            <div style="display:none;" id="content_{{$index}}">{!! $item->description !!}</div>
            @endforeach
        </div>
        <div class="modal fade" id="dialog-gallery">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="border-bottom:0px;">
                        <button type="button" class="close" style="font-size:30px;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 style="margin-top:15px;" class="modal-title title"></h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{ asset('images/logo.png') }}" style="width:100%;" class="images" onerror="this.style.display='none';">
                                <p style="margin-top:15px;" class="content"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function setModalContent(id) {
        $("#dialog-gallery").find(".images").attr("src",$("#images_" + id).html());
        $("#dialog-gallery").find(".title").html($("#title_" + id).html());
        $("#dialog-gallery").find(".content").html($("#content_" + id).html());
    }
</script>
@endsection