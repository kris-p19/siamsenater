@extends('layouts.frontend')
@section('page-home','active')

@section('content')
<div class="row" style="margin-top: 10px;">
    @if(DB::table('slide_shows')->where('status','active')->count()>0)
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9" id="panel-owl-carousel-welcome">
        <div class="owl-carousel owl-theme" id="owl-carousel-welcome">
            @foreach (DB::table('slide_shows')->where('status','active')->orderBy('created_at','desc')->get() as $info)
            <div>
                <a href="{{ ($info->url=='empty'?'javascript:void(0);':$info->url) }}">
                    <img src="{{ asset('images/slideShow/'.$info->picture) }}" alt="{{ $info->picture }}" style="width:100%;">
                </a>
            </div>  
            @endforeach
        </div>
    </div>
    @endif
    @if(DB::table('hot_issues')->where('status','active')->count())
    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="title">
                    <b><i class="fa fa-bullhorn" aria-hidden="true" tabindex="-1"></i> {{ __('messages.hot-issue') }}</b>
                </h3>
            </div>
            <div class="panel-body" style="padding:0px;padding-bottom:10px;">
                <div class="owl-carousel owl-theme" id="owl-carousel-hot-issue">
                    @foreach (DB::table('hot_issues')->where('status','active')->orderBy('created_at')->get() as $info)
                    <div>
                        <a href="{{ ($info->url=='empty'?'javascript:void(0);':$info->url) }}">
                            <img src="{{ asset('images/hotIssue/'.$info->picture) }}" alt="300x300" style="width:100%;object-fit: cover;">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center title">{{ __('messages.our-service') }}</h2>
        <div class="panel panel-default" style="background-color: brown;">
            <div class="panel-body">
                <div class="row">
                    @foreach(\App\Http\Controllers\OurServiceController::indexArr() as $item)
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="panel panel-default hover">
                            <div class="panel-body">
                                <a href="{{ url('our-service/read/'.$item->id) }}">
                                    <img class="media-object" src="{{ asset('images/our-service/'.$item->picture_header) }}" style="width:100%;object-fit:cover;" onerror="this.style.display='none';">
                                </a>
                                <h4 class="media-heading title">{!! $item->service_name !!}</h4>
                                <p>@foreach(explode(',',$item->hastag) as $hastag) <label class="label label-default">{!! $hastag !!}</label> @endforeach</p>
                                <p><a href="{{ url('our-service/read/'.$item->id) }}" class="btn btn-primary">{{ __('messages.detail') }}</a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        <div class="panel panel-default" style="min-height: 480px;">
            <div class="panel-body">
                <h3 class="title">{{ __('messages.company_name_full') }}</h3>
                @foreach (\App\Http\Controllers\AboutUsItemController::welcomPage() as $row)
                    <h4>{!! $row->subject !!}</h4>
                    <p>{!! $row->content !!}</p>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        <div class="panel panel-default" style="min-height: 480px;">
            <div class="panel-body">
                <h3 class="title"><i class="fa fa-facebook-official" aria-hidden="true"></i> {{ __('messages.company-facebook-page') }}</h3>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fsiamsenater&tabs=timeline&width=326&height=370&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1271732449825933" width="100%" height="370" style="border:none;overflow:hidden" scrolling="no" frameborder="0" role="none" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        <div class="panel panel-default" style="min-height: 480px;">
            <div class="panel-body">
                <h3 class="title"><i class="fa fa-pie-chart" aria-hidden="true"></i> {{ __('messages.vote') }}</h3>
                <p>{{ __('messages.web-site-satisfaction-survey') }}</p>
                <div id="panel-vote">
                    <form action="{{ url('send-vote') }}" method="post">
                        @csrf
                        @foreach (DB::table('votes')->get() as $index => $vote_item)
                        <div class="radio">
                            <label>
                                <input {{ $index==0?'checked':'' }} type="radio" name="vote_item" id="vote_item{{$index}}" value="{{ $vote_item->id }}">
                                {{ app()->getLocale()=='th'?$vote_item->name_th:$vote_item->name_en }}
                            </label>
                        </div>    
                        @endforeach
                        <div class="form-group">
                            <button type="submit" class="btn btn-default btn-theme">{{ __('messages.vote') }}</button>
                            <a class="btn btn-default btn-theme" onclick="$('#panel-vote').hide();$('#panel-view-vote').show();queryScore();">{{ __('messages.view-vote') }}</a>
                        </div>    
                    </form>
                    <p id="text-status"></p>
                </div>
                <div id="panel-view-vote" style="display:none;">
                    <div class="well-come-vote">
                        <iframe src="{{ url('query-score') }}?{{time()}}" frameborder="0" style="height:300px;"></iframe>
                    </div>
                    <a class="btn btn-default btn-theme" onclick="$('#panel-vote').show();$('#panel-view-vote').hide();">{{ __('messages.back') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="title"><b><i class="fa fa-map-marker" aria-hidden="true"></i> {{ __('messages.location_company') }}</b></h3>
            </div>
            <div class="panel-body">
                <div class="col-md-8">
                    <img src="{{ asset('images/Map SST-large-large.png') }}" alt="test" class="img-responsive" style="width:100%;">
                </div>
                <div class="col-md-4">
                    <div id="map" style="width:100%;height:400px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="https://api.longdo.com/map/?key=592a36a1908c4318a921581123606947"></script>
    <script>
        function queryScore() {
            $.ajax({
                type:"get",
                url:"{{ url('query-score') }}",
                // dataType:"json",
                cache:false,
                beforeSend:function(){
                    // chaassss.data.labels.pop();
                    // chaassss.data.datasets.forEach((dataset) => {
                    //     dataset.data.pop();
                    // });
                    // chaassss.update();
                },
                success:function(res){
                    $('.well-come-vote').find('iframe').attr('src',"{{ url('query-score') }}?"+Math.random());
                    console.log(res);
                    // let l = [];
                    // let d = [];
                    // $.each(res.data,function(k,v){
                    //     @if(app()->getLocale()=='th')
                    //     l.push(v.name_th);
                    //     @else
                    //     l.push(v.name_en);
                    //     @endif
                    //     d.push(v.number_vote);
                    // });
                    // chaassss.data.labels.push(l);
                    // chaassss.data.datasets.forEach((dataset) => {
                    //     dataset.data.push(Number(d));
                    // });
                    // chaassss.update();
                    // console.log([
                    //     l,d
                    // ]);
                }
            });
        }
        $(document).ready(function(){
            $('#panel-vote form').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url:$(this).attr('action'),
                    type:$(this).attr('method'),
                    cache:false,
                    dataType:"json",
                    data:$(this).serialize(),
                    success:function(res){
                        if (res.status=='success') {
                            $("#text-status").html(res.msg);
                            $("#text-status").attr("style","color:green;");
                            setTimeout(() => {
                                $("#text-status").text("");
                                $("#text-status").attr("style","");
                            }, 4000);
                        }
                    }
                });
            });
        });
        var map;
        var lat = 13.580427, lon = 100.778433;
        map = new longdo.Map({
            layer: [
                longdo.Layers.GRAY,
                longdo.Layers.TRAFFIC
            ],
            zoom: 10,
            placeholder: document.getElementById('map')
        });
        map.Ui.Crosshair.visible(false);
        map.Ui.Fullscreen.visible(false);
        map.Ui.LayerSelector.visible(false);
        map.Ui.Toolbar.visible(false);
        map.Ui.Geolocation.visible(false);
        map.Ui.Zoombar.visible(false);
        map.Ui.DPad.visible(false);
        map.location({ lon: lon, lat: lat }, true);
        map.Overlays.add(new longdo.Marker({ lon: lon, lat: lat },{
            title: "{{ __('messages.company_name_full') }}",
            icon: {
                url: "{{ asset('images/logox.png') }}"
            }
        }));
        map.Overlays.add(new longdo.Popup({ lon: lon, lat: lat },{
            title: "{{ __('messages.company_name_full') }}",
            detail: "<a href='https://www.google.com/maps/search/?api=1&query="+lat+","+lon+"' target='_blank'>ขอเส้นทาง</a>"
        }));
        $(document).ready(function(){
            $('#owl-carousel-hot-issue').find('.owl-dot').each(function(k,v){
                $(this).attr('role','none');
                $(this).attr('aria-label','menu hot issue ' + (k+1));
            }); 
            $('.ldmap_anchor').attr('aria-label','ตำแหน่งที่ตั้งบริษัท');
        });
    </script>
    @if(DB::table('popups')->where('status','active')->count()>0)
        <script>
            $(document).ready(function(){
                $("#owl-carousel-popup").owlCarousel({
                    items:1,
                    loop:true,
                    margin:10,
                    responsiveClass:true,
                    autoplay:true,
                    autoplayHoverPause:true
                });
                setTimeout(() => {
                    $('#popup').modal('show'); 
                }, 2000);
            });
        </script> 
    @endif
@endsection