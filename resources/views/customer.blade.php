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
                <div class="panel panel-default hover" onclick="$('#hide_id_{{$index}}').trigger('click');">
                    <div class="panel-body text-center">
                        <img src="{{ asset('images/customers/'.$item->customer_logo) }}" class="img-responsive" style="width:100%;border-radius:10px;padding: 10px;">
                        @if(!empty($item->name))<h4>{{ $item->name }}</h4>@endif
                    </div>
                </div>
            </div>
            <div style="display:none;" id="images_{{$index}}">{{ asset('images/customers/'.$item->customer_logo) }}</div>
            <div style="display:none;" id="title_{{$index}}">{!! $item->name !!}</div>
            <div style="display:none;" id="content_{{$index}}">{!! $item->description !!}</div>
            @endforeach
            <div id="light-gallery" style="display:none;">
                @foreach ($data as $index => $item)
                <a id="hide_id_{{$index}}" href="{{ asset('images/customers/'.$item->customer_logo) }}" data-sub-html="{{ $item->name }}<br>{{ $item->description }}">
                    <img src="{{ asset('images/customers/'.$item->customer_logo) }}">
                </a>
                @endforeach
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
    $('#light-gallery').lightGallery({
        thumbnail: true,
        selector: 'a'
    });
</script>
@endsection