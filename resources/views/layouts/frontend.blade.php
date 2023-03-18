@php
    $contactUs = DB::table('contact_us')->first();
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>@yield('title'){{ __('messages.company_name_full') }}</title>

        <meta name="keywords" content="@yield('keywords'){{ __('messages.company_name_full') }}" />
        <meta name="description" content="@yield('title'){{ __('messages.company_name_full') }}, {{ __('messages.type-of-business') }}" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:type" content="website"/>
        <meta property="og:image" content="{{ asset('images/logo.png') }}" />
        <meta property="og:title" content="@yield('title'){{ __('messages.company_name_full') }}" />
        <meta property="og:description" content="@yield('title'){{ __('messages.company_name_full') }}. {{ __('messages.type-of-business') }}" />
        <meta property="og:site_name" content="{{ __('messages.company_name_full') }}" />
        <link rel="image_src" href="{{ asset('images/logo.png') }}" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta name="Rating" content="general" />
        <meta name="ROBOTS" content="index, follow" />
        <meta name="GOOGLEBOT" content="index, follow" />
        <meta name="FAST-WebCrawler" content="index, follow" />
        <meta name="Scooter" content="index, follow" />
        <meta name="Slurp" content="index, follow" />
        <meta name="REVISIT-AFTER" content="7 days" />
        <meta name="distribution" content="global" />
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/logo.png') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.ico') }}">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+Thai|Sono">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lightgallery-bundle.min.css" integrity="sha512-nUqPe0+ak577sKSMThGcKJauRI7ENhKC2FQAOOmdyCYSrUh0GnwLsZNYqwilpMmplN+3nO3zso8CWUgu33BDag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            :root {
                --theme-color:#a00f13;
                --active-color:#621919;
                --theme-font-color:#ffffff;
            }
        </style>
        @if(app()->getLocale()=='th')
        <style>
            html, body {
                font-family: 'Noto Sans Thai', sans-serif;
            }
        </style>
        @else
        <style>
            html, body {
                font-family: 'Sono', sans-serif;
            }
        </style>
        @endif
        <link rel="stylesheet" href="{{ asset('css/app.css') }}?_={{ time() }}">
        @yield('style')
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <img src="{{ asset('images/logo.png') }}" alt="โลโก้บริษัท" class="img-responsive" style="width:100%;">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
                    @if(!empty($contactUs->url_googlemap))<a href="{!! $contactUs->url_googlemap !!}" title="Google map" target="_blank"><img src="{{ asset('images/contact-us/social-gm.png') }}" alt="social"></a>@endif
                    @if(!empty($contactUs->url_facebook))<a href="{!! $contactUs->url_facebook !!}" title="Facebook" target="_blank"><img src="{{ asset('images/contact-us/social-fb.png') }}" alt="social"></a>@endif
                    @if(!empty($contactUs->url_twitter))<a href="{!! $contactUs->url_twitter !!}" title="Twitter" target="_blank"><img src="{{ asset('images/contact-us/social-tw.png') }}" alt="social"></a>@endif
                    @if(!empty($contactUs->url_instagram))<a href="{!! $contactUs->url_instagram !!}" title="Instagram" target="_blank"><img src="{{ asset('images/contact-us/social-ig.png') }}" alt="social"></a>@endif
                    @if(!empty($contactUs->url_youtube))<a href="{!! $contactUs->url_youtube !!}" title="Youtube" target="_blank"><img src="{{ asset('images/contact-us/social-yt.png') }}" alt="social"></a>@endif
                    @if(!empty($contactUs->url_line))<a href="{!! $contactUs->url_line !!}" title="Line" target="_blank"><img src="{{ asset('images/contact-us/social-li.png') }}" alt="social"></a>@endif
                    @if(!empty($contactUs->url_tiktok))<a href="{!! $contactUs->url_tiktok !!}" title="Tiktok" target="_blank"><img src="{{ asset('images/contact-us/social-tt.png') }}" alt="social"></a>@endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="{{ url('/') }}">{{ __('messages.brand') }}</a>
                            </div>
                      
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class="@yield('page-home')"><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home"></span> {{ __('messages.home') }} <span class="sr-only">(current)</span></a></li>
                                    <li class="dropdown @yield('page-about-us')">
                                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ __('messages.about-us') }}</a>
                                        <ul class="dropdown-menu">
                                            @foreach (DB::table('about_us')->where('status','active')->get() as $item)
                                            <li><a href="{{ url($item->path) }}">{{ (app()->getLocale()=='th'?$item->subject_th:$item->subject_en) }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="@yield('page-our-service')"><a href="{{ url('/our-service') }}">{{ __('messages.our-service') }}</a></li>
                                    <li class="@yield('page-customer')"><a href="{{ url('/customer') }}">{{ __('messages.customer') }}</a></li>
                                    <li class="@yield('page-news-activities')"><a href="{{ url('/news-activities') }}">{{ __('messages.news-activities') }}</a></li>
                                    <li class="@yield('page-contact-us')"><a href="{{ url('/contact-us') }}">{{ __('messages.contact-us') }}</a></li>
                                    <li class="@yield('page-administration')"><a href="{{ url('/administration') }}">{{ __('messages.administration') }}</a></li>

                                    <li class="text-center">
                                        <a href="{{ url('/lang/th') }}" style="background-color:transparent;padding:0px;padding-top:12px;padding-right:10px;{{ (app()->getLocale()=='th'?'':'-webkit-filter:grayscale(100%);filter:gray;') }}"><img src="{{ asset('images/lang-th.png') }}" alt="lang-th" style="width:24px;"></a>
                                    </li>
                                    <li class="text-center">
                                        <a href="{{ url('/lang/en') }}" style="background-color:transparent;padding:0px;padding-top:12px;padding-right:10px;{{ (app()->getLocale()=='en'?'':'-webkit-filter:grayscale(100%);filter:gray;') }}"><img src="{{ asset('images/lang-en.png') }}" alt="lang-en" style="width:24px;"></a>
                                    </li>

                                    {{-- <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#">One more separated link</a></li>
                                        </ul>
                                    </li> --}}
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @yield('position')
                    @yield('content')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <footer style="padding-bottom:20px;background-color:var(--theme-color);">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 footer-col">
                                    <div class="logofooter">
                                        {{ __('messages.company_name_full') }}
                                    </div>
                                    <p>{{ __('messages.type-of-business') }}</p>
                                    <p><i class="fa fa-map-pin"></i> {{ __('messages.company_address') }}</p>
                                    <p><i class="fa fa-phone"></i> {{ __('messages.telephone') }} : <a style="color:var(--theme-font-color);" href="tel:{!! $contactUs->phone !!}">{!! $contactUs->phone !!}</a></p>
                                    <p><i class="fa fa-phone"></i> {{ __('messages.fax') }} : <a style="color:var(--theme-font-color);" href="tel:{!! $contactUs->fax !!}">{!! $contactUs->fax !!}</a></p>
                                    <p><i class="fa fa-envelope"></i> {{ __('messages.email') }} : <a style="color:var(--theme-font-color);" href="mailto:{!! @explode('|',$contactUs->contact1st_en)[1] !!}">{!! @explode('|',$contactUs->contact1st_en)[1] !!}</a></p>  
                                </div>
                                <div class="col-md-3 col-sm-6 footer-col">
                                    <h6 class="heading7">{{ __('messages.general-links') }}</h6>
                                    <ul class="footer-ul">
                                        <li><a href="{{ url('/about-us') }}">{{ __('messages.about-us') }}</a></li>
                                        <li><a href="{{ url('/our-service') }}">{{ __('messages.our-service') }}</a></li>
                                        <li><a href="{{ url('/customer') }}">{{ __('messages.customer') }}</a></li>
                                        <li><a href="{{ url('/news-activities') }}">{{ __('messages.news-activities') }}</a></li>
                                        <li><a href="{{ url('/contact-us') }}">{{ __('messages.contact-us') }}</a></li>
                                        <li><a href="{{ url('/administration') }}">{{ __('messages.administration') }}</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-sm-6 footer-col">
                                    <h6 class="heading7">{{ __('messages.lastpost') }}</h6>
                                    <div class="post">
                                        @foreach(DB::table('news_activities')->select('title_th','title_en','id','public_datetime')->where('status','active')->where('public_datetime','<',date('Y-m-d H:i:s'))->orderBy('public_datetime','desc')->take(3)->get() as $index => $item)
                                        <li style="color:var(--theme-font-color);">
                                            <a href="{{ url('news-activities/read/'.$item->id) }}">
                                                {!! (app()->getLocale()=='th'?$item->title_th:$item->title_en) !!}
                                                <span>{{ date('d',strtotime($item->public_datetime)) . ' ' . (__('messages.month.'.strtolower(date('F',strtotime($item->public_datetime))))) . ' ' . (date('Y',strtotime($item->public_datetime))+543) }}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
            <!--footer start from here-->
              
            <div class="copyright" style="background-color:var(--active-color);">
                <div class="container">
                    <div class="col-md-12">
                        <p>{{ __('messages.copyright') }}</p>
                    </div>
                    {{-- <div class="col-md-6">
                        <ul class="bottom_ul">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Faq's</a></li>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">Site Map</a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="modal fade" id="popup">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color:transparent;border:0px;border-radius:0px;-webkit-box-shadow:none;box-shadow:none;">
                    <div class="modal-header" style="border-bottom:0px;">
                        <button type="button" class="close" style="font-size:30px;color:#ffffff;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body text-center">
                        <div class="owl-carousel owl-theme" id="owl-carousel-popup">
                            <div>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('images/slide1.jpg') }}?_={{ time() }}" alt="slide1" style="width:100%;">
                                </a>
                            </div>
                            <div>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('images/slide2.jpg') }}?_={{ time() }}" alt="slide1" style="width:100%;">
                                </a>
                            </div>
                            <div>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('images/slide3.jpg') }}?_={{ time() }}" alt="slide1" style="width:100%;">
                                </a>
                            </div>
                            <div>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('images/slide4.jpg') }}?_={{ time() }}" alt="slide1" style="width:100%;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! @DB::table('facebook_message_plugins')->where('status','active')->first()->content !!}
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.umd.min.js" integrity="sha512-6vFONv+JJD01XArGGqxABRY3Vsm8tKuemThmZYfha9inGIuqPU5OgZP1QizBf0Y3JGPnrofy3jokdebgYNNhEQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/thumbnail/lg-thumbnail.umd.min.js" integrity="sha512-hdzLQVAURjMzysJVkWaKWA2nD+V6CcBx6wH0aWytFnlmgIdTx/n5rDWoruSvK6ghnPaeIgwKuUESlpUhat2X+Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/zoom/lg-zoom.umd.min.js" integrity="sha512-XXCpe8fRNmJzU9JVpJbjXIg4SpUeWcsLjeIFEnjQeD+2Y4Einh1spMPeN/1XcnfjYE+ebBY1f/U/Up7vx8+PEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/autoplay/lg-autoplay.umd.min.js" integrity="sha512-GtFOSYOB4Gx5+0hQxi/nVFJk77Tvmmgs/Kdbl4PZLjiZ8RBRMiKU2r33gsdn19r4Nlnx9lDqKf8ZdOSNwdgUtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/share/lg-share.umd.min.js" integrity="sha512-LqLPMRjHAY1Y3A8R5bh8IeV/rjSdBOu87nlqOq91UQsT7Yece+FLvKuUDju9lqdLzzDCoisUDCLbue6zSrnDgg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('js/app.js') }}?_={{ time() }}"></script>
        @yield('script')
    </body>
</html>