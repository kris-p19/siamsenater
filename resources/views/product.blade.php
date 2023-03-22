@extends('layouts.frontend')
@section('page-product','active')
@section('title',($sub==1?$title.' | ':'') . __('messages.product') . ' | ')
@section('keywords',($sub==1?$title.',':'') . __('messages.product') . ',')
@section('position')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
    @if($sub==1)
    <li><a href="{{ url('product') }}">{{ __('messages.product') }}</a></li>
    <li class="active">{{ $title }}</li>
    @else
    <li class="active">{{ __('messages.product') }}</li>
    @endif
</ol>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h2 class="panel-titles">
                    <span class="material-icons">precision_manufacturing</span>
                    <b class="page-header">{{ $title }}</b>
                </h2>
            </div>
        </div>
        
        <div class="row" id="light-gallery">
            @foreach($data as $item)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="panel panel-default hover">
                    <div class="panel-body">
                        @if($sub==1)
                            <a class="selector" href="{{ asset('images/product/'.$item->picture) }}" data-sub-html="{{ $item->name . '<br>' . $item->group_name }}<br>{{ $item->desciption }}">
                                <img class="media-object" src="{{ asset('images/product/resize/'.$item->picture) }}" style="width:100%;object-fit:cover;" onerror="this.style.display='none';">
                            </a>
                            <h4 class="media-heading title">{!! $item->name . ' ' . $item->group_name !!}</h4>
                        @else
                            <a href="{{ url('product/grp/'.$item->group_name) }}">
                                <img class="media-object" src="{{ asset('images/product/resize/'.$item->picture) }}" style="width:100%;object-fit:cover;" onerror="this.style.display='none';">
                            </a>
                            <h4 class="media-heading title">{!! $item->name . ' ' . $item->group_name !!}</h4>
                            <p><a href="{{ url('product/grp/'.$item->group_name) }}" class="btn btn-primary">{{ __('messages.detail') }}</a></p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection

@section('script')
    @if($sub==1)
    <script>
        $(document).ready(function(){
            $('#light-gallery').lightGallery({
                thumbnail: true,
                selector: '.selector'
            });
        });
    </script>
    @endif
@endsection