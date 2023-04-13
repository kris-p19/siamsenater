@php
    use App\Http\Controllers\AboutUsItemController;
    use App\Http\Controllers\CustomerController;
    use App\Http\Controllers\OurServiceController;
    use App\Http\Controllers\OneStopServiceController;
@endphp
@extends('layouts.frontend')
@section('page-home','active')

@section('content')
<div class="row" style="margin-top: 10px;">
    @if(DB::table('slide_shows')->where('status','active')->count()>0)
    @if(DB::table('hot_issues')->where('status','active')->count()==0)
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="panel-owl-carousel-welcome">
    @else
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9" id="panel-owl-carousel-welcome">
    @endif
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
    <div class="col-md-5">
        <h2 class="text-center title">{{ __('messages.company-info') }}</h2>
        <div class="panel panel-default" style="background-color: brown;">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-body" style="color:white;">
                            @foreach((new AboutUsItemController)->welcomPageByG(1) as $key => $row)
                                <p style="padding:15px;background:#af2d2d;border-radius:10px;">
                                    {{ $row->subject }} 
                                    @if($row->datatype=='image')
                                    <img src="{{ asset('upload/about-us') }}/{{ $row->content }}" class="img-responsive">
                                    @elseif($row->datatype=='file')
                                    <a href="{{ asset('upload/about-us') }}/{{ $row->content }}" target="_blank">
                                        <img src="{{ asset('images/pdf.png') }}" style="width:40px;" class="img-responsive">
                                    </a>
                                    @else
                                    {!! $row->content !!}
                                    @endif
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <h2 class="text-center title">{{ __('messages.one-stop-service') }}</h2>
        <div class="panel panel-default" style="background-color: _brown;">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! (new OneStopServiceController)->content()->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <h2 class="text-center title">{{ __('messages.our-service') }}</h2>
        <div class="panel panel-default" style="background-color: brown;">
            <div class="panel-body">
                <div class="row">
                    @foreach((new OurServiceController)->indexArr(0,3) as $item)
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
                <div class="row">
                    @foreach((new OurServiceController)->indexArr(3,3) as $item)
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
                <div class="row">
                    @foreach((new OurServiceController)->indexArr(6,3) as $item)
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
    <div class="col-md-12">
        <h2 class="text-center title">{{ __('messages.certificate') }}</h2>
        <div class="panel panel-default" style="background-color: brown;">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-body" style="color:white;">
                            <div class="owl-carousel owl-theme" id="owl-carousel-certificate">
                            @foreach((new AboutUsItemController)->welcomPageByG(3) as $key => $row)
                            <div>
                                        @if($row->datatype=='image')
                                        <a class="selector" href="{{ asset('upload/about-us') }}/{{ $row->content }}" data-sub-html="{!! $row->subject !!}">
                                            <img src="{{ asset('upload/about-us') }}/{{ $row->content }}" title="{{ $row->subject }}" class="img-responsive" style="max-height:350px;object-fit: cover;">
                                        </a>
                                        @elseif($row->datatype=='file')
                                        <a class="selector" href="{{ asset('upload/about-us') }}/{{ $row->content }}" data-sub-html="{!! $row->subject !!}" target="_blank">
                                            <img src="{{ asset('images/pdf.png') }}" style="width:40px;" title="{{ $row->subject }}" class="img-responsive" style="max-height:350px;object-fit: cover;">
                                        </a>
                                        @else
                                        {!! $row->content !!}
                                        @endif
                            </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center title">{{ __('messages.comtomer') }}</h2>
        <div class="panel panel-default" style="background-color: brown;">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-body" style="color:white;">
                            <div class="owl-carousel owl-theme" id="owl-carousel-customer">
                            @foreach((new CustomerController)->wellcomeGet() as $key => $row)
                            <div>
                                <a class="selector" href="{{ asset('images/customers') }}/{{ $row->customer_logo }}" data-sub-html="{!! $row->name !!}<br>{!! $row->description !!}" target="_blank">
                                    <img src="{{ asset('images/customers') }}/{{ $row->customer_logo }}" title="{{ $row->name }}" class="img-responsive" style="width:100%;">
                                </a>
                            </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center title">{{ __('messages.site-map') }}</h2>
        <div class="panel panel-default" style="background-color: _brown;">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-body">
                            
                            <div class="row">
                                <div class="col-md-offset-4 col-md-4 text-center">
                                    <div class="alert alert-info">
                                        <a href="{{ url('/') }}">
                                            <i class="fa fa-home"></i> 
                                            {{ __('messages.company_name_full') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <div>
                                        <ul style="padding-left:30px;">
                                            <li class="col-md-4" style="list-style-type:inherit;">
                                                <a style="font-size: 18px;font-weight: bold;" href="{{ url('/') }}">{{ __('messages.home') }}</a>
                                                <ul style="padding-left:30px;margin-bottom: 30px;">
                                                    <li style="list-style-type:inherit;"><a href="{{ url('about-us/company-info') }}" target="_blank">{{ __('messages.company-info') }}</a></li>
                                                    <li style="list-style-type:inherit;"><a href="{{ url('one-stop-service') }}" target="_blank">{{ __('messages.one-stop-service') }}</a></li>
                                                    <li style="list-style-type:inherit;"><a href="{{ url('our-service') }}" target="_blank">{{ __('messages.our-service') }}</a></li>
                                                    <li style="list-style-type:inherit;"><a href="{{ url('customer') }}" target="_blank">{{ __('messages.customer') }}</a></li>
                                                    <li style="list-style-type:inherit;"><a href="{{ url('certificate') }}" target="_blank">{{ __('messages.certificate') }}</a></li>
                                                    <li style="list-style-type:inherit;"><a href="{{ url('customer') }}" target="_blank">{{ __('messages.customer') }}</a></li>
                                                    <li style="list-style-type:inherit;"><a href="{{ url('site-map') }}" target="_blank">{{ __('messages.site-map') }}</a></li>
                                                    <li style="list-style-type:inherit;"><a href="{{ url('contact-information') }}" target="_blank">{{ __('messages.contact-information') }}</a></li>
                                                    <li style="list-style-type:inherit;"><a href="{{ url('related-link') }}" target="_blank">{{ __('messages.related-link') }}</a></li>
                                                </ul>
                                            </li>
                                            <li class="col-md-4" style="list-style-type:inherit;">
                                                <a style="font-size: 18px;font-weight: bold;" href="">{{ __('messages.about-us') }}</a>
                                                <ul style="padding-left:30px;margin-bottom: 30px;">
                                                    <li style="list-style-type:inherit;"><a href="{{ url('about-us/company-info') }}" target="_blank">{{ __('messages.company-info') }}</a></li>
                                                    <li style="list-style-type:inherit;"><a href="{{ url('about-us/history') }}" target="_blank">{{ __('messages.history') }}</a></li>
                                                    <li style="list-style-type:inherit;"><a href="{{ url('about-us/certificate') }}" target="_blank">{{ __('messages.certificate') }}</a></li>
                                                </ul>
                                            </li>
                                            <li class="col-md-4" style="list-style-type:inherit;">
                                                <a style="font-size: 18px;font-weight: bold;" href="">{{ __('messages.our-service') }}</a>
                                                <ul style="padding-left:30px;margin-bottom: 30px;">
                                                    <li style="list-style-type:inherit;"><a href="{{ url('one-stop-service') }}" target="_blank">{{ __('messages.one-stop-service') }}</a></li>
                                                    <li style="list-style-type:inherit;">
                                                        <a href="{{ url('our-service/stamping') }}" target="_blank">{{ __('messages.stamping') }}</a>
                                                        <ul style="padding-left:30px;">
                                                            <li style="list-style-type:inherit;"><a href="{{ url('our-service/stamping') }}" target="_blank">{{ __('messages.ex-product-stamping') }}</a></li>
                                                        </ul>
                                                    </li>
                                                    <li style="list-style-type:inherit;">
                                                        <a href="{{ url('our-service/welding-co2') }}" target="_blank">{{ __('messages.welding-co2') }}</a>
                                                        <ul style="padding-left:30px;">
                                                            <li style="list-style-type:inherit;"><a href="{{ url('our-service/welding-co2') }}" target="_blank">{{ __('messages.ex-product-welding-co2') }}</a></li>
                                                        </ul>
                                                    </li>
                                                    <li style="list-style-type:inherit;">
                                                        <a href="{{ url('our-service/banding') }}" target="_blank">{{ __('messages.banding') }}</a>
                                                        <ul style="padding-left:30px;">
                                                            <li style="list-style-type:inherit;"><a href="{{ url('our-service/banding') }}" target="_blank">{{ __('messages.ex-product-banding') }}</a></li>
                                                        </ul>
                                                    </li>
                                                    <li style="list-style-type:inherit;">
                                                        <a href="{{ url('our-service/spindle') }}" target="_blank">{{ __('messages.spindle') }}</a>
                                                        <ul style="padding-left:30px;">
                                                            <li style="list-style-type:inherit;"><a href="{{ url('our-service/spindle') }}" target="_blank">{{ __('messages.ex-product-spindle') }}</a></li>
                                                        </ul>
                                                    </li>
                                                    <li style="list-style-type:inherit;">
                                                        <a href="{{ url('our-service/spot') }}" target="_blank">{{ __('messages.spot') }}</a>
                                                        <ul style="padding-left:30px;">
                                                            <li style="list-style-type:inherit;"><a href="{{ url('our-service/spot') }}" target="_blank">{{ __('messages.ex-product-spot') }}</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="col-md-4" style="list-style-type:inherit;">
                                                <a style="font-size: 18px;font-weight: bold;" href="">{{ __('messages.customer') }}</a>
                                            </li>
                                            <li class="col-md-4" style="list-style-type:inherit;">
                                                <a style="font-size: 18px;font-weight: bold;" href="{{ url('/') }}">{{ __('messages.news-activities') }}</a>
                                                <ul style="padding-left:30px;margin-bottom: 30px;">
                                                    <li style="list-style-type:inherit;"><a href="{{ url('announcement') }}" target="_blank">{{ __('messages.announcement') }}</a></li>
                                                    <li style="list-style-type:inherit;">
                                                        <a href="{{ url('event') }}" target="_blank">{{ __('messages.event') }}</a>
                                                        <ul style="padding-left:30px;">
                                                            <li style="list-style-type:inherit;"><a href="{{ url('event/csr') }}" target="_blank">{{ __('messages.csr') }}</a></li>
                                                            <li style="list-style-type:inherit;"><a href="{{ url('event/csr') }}" target="_blank">{{ __('messages.company-activities') }}</a></li>
                                                        </ul>
                                                    </li>
                                                    <li style="list-style-type:inherit;"><a href="{{ url('article') }}" target="_blank">{{ __('messages.article') }}</a></li>
                                                </ul>
                                            </li>
                                            <li class="col-md-4" style="list-style-type:inherit;">
                                                <a style="font-size: 18px;font-weight: bold;" href="{{ url('/') }}">{{ __('messages.contact-us') }}</a>
                                                <ul style="padding-left:30px;margin-bottom: 30px;">
                                                    <li style="list-style-type:inherit;"><a href="{{ url('contact-information') }}" target="_blank">{{ __('messages.contact-information') }}</a></li>
                                                    <li style="list-style-type:inherit;"><a href="{{ url('internship-program') }}" target="_blank">{{ __('messages.internship-program') }}</a></li>
                                                    <li style="list-style-type:inherit;"><a href="{{ url('supplier-meeting') }}" target="_blank">{{ __('messages.supplier-meeting') }}</a></li>
                                                </ul>
                                            </li>
                                            <li class="col-md-4" style="list-style-type:inherit;">
                                                <a style="font-size: 18px;font-weight: bold;" href="{{ url('/') }}">{{ __('messages.administration') }}</a>
                                                <ul style="padding-left:30px;margin-bottom: 30px;">
                                                    <li style="list-style-type:inherit;">
                                                        <a href="{{ url('content-management') }}" target="_blank">{{ __('messages.content-management') }}</a>
                                                        <ul style="padding-left:30px;">
                                                            <li style="list-style-type:inherit;"><a href="{{ url('/') }}" target="_blank">{{ __('messages.news-activities') }}</a></li>
                                                            <li style="list-style-type:inherit;"><a href="{{ url('/') }}" target="_blank">{{ __('messages.our-service') }}</a></li>
                                                            <li style="list-style-type:inherit;"><a href="{{ url('/') }}" target="_blank">{{ __('messages.history') }}</a></li>
                                                            <li style="list-style-type:inherit;"><a href="{{ url('/') }}" target="_blank">{{ __('messages.customer') }}</a></li>
                                                            <li style="list-style-type:inherit;"><a href="{{ url('/') }}" target="_blank">{{ __('messages.related-link') }}</a></li>
                                                            <li style="list-style-type:inherit;"><a href="{{ url('/') }}" target="_blank">{{ __('messages.join-us') }}</a></li>
                                                            <li style="list-style-type:inherit;"><a href="{{ url('/') }}" target="_blank">{{ __('messages.contact-us') }}</a></li>
                                                        </ul>
                                                    </li>
                                                    <li style="list-style-type:inherit;"><a href="{{ url('system-configuration') }}" target="_blank">{{ __('messages.system-configuration') }}</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!--<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">-->
    <!--    <div class="panel panel-default" style="min-height: 480px;">-->
    <!--        <div class="panel-body">-->
    <!--            <h3 class="title">{{ __('messages.company_name_full') }}</h3>-->
    <!--            @foreach (\App\Http\Controllers\AboutUsItemController::welcomPage() as $row)-->
    <!--                <h4>{!! $row->subject !!}</h4>-->
    <!--                <p>{!! $row->content !!}</p>-->
    <!--            @endforeach-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="panel panel-default" style="min-height: 480px;">
            <div class="panel-body">
                <h3 class="title"><i class="fa fa-facebook-official" aria-hidden="true"></i> {{ __('messages.company-facebook-page') }}</h3>
                <center>
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fsiamsenater&tabs=timeline&width=1000&height=370&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1271732449825933" width="100%" height="370" style="border:none;overflow:hidden" scrolling="no" frameborder="0" role="none" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </center>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
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

@section('style')
<link rel="stylesheet" href="{{ asset('css/sitemap.css') }}?_={{time()}}">
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
            $("#owl-carousel-certificate").owlCarousel({
                items:4,
                loop:true,
                margin:10,
                responsiveClass:true,
                autoplay:true,
                autoplayHoverPause:true,
                responsive:{
                    0:{
                        items:1,
                        nav:false
                    },
                    600:{
                        items:3,
                        nav:false
                    },
                    1000:{
                        items:5,
                        nav:false,
                        loop:false
                    }
                }
            });
            $('#owl-carousel-certificate').lightGallery({
                thumbnail: true,
                selector: '.selector'
            });
            $("#owl-carousel-customer").owlCarousel({
                items:4,
                loop:true,
                margin:10,
                responsiveClass:true,
                autoplay:true,
                autoplayHoverPause:true,
                responsive:{
                    0:{
                        items:1,
                        nav:false
                    },
                    600:{
                        items:3,
                        nav:false
                    },
                    1000:{
                        items:5,
                        nav:false,
                        loop:false
                    }
                }
            });
            $('#owl-carousel-customer').lightGallery({
                thumbnail: true,
                selector: '.selector'
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