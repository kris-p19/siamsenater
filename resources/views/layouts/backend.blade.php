<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ __('messages.company_name_full') }}</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+Thai|Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="{{ asset('css/backend.css') }}?_={{ time() }}">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li> --}}
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="{{ url('/lang/th') }}" class="nav-link" style="padding-left:5px;padding-right:5px;">
            <img src="{{ asset('images/lang-th.png') }}" alt="lang-th" style="{{ (app()->getLocale()=='th'?'':'-webkit-filter:grayscale(100%);filter:gray;') }}width:24px;">
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/lang/en') }}" class="nav-link" style="padding-left:5px;padding-right:5px;">
            <img src="{{ asset('images/lang-en.png') }}" alt="lang-en" style="{{ (app()->getLocale()=='en'?'':'-webkit-filter:grayscale(100%);filter:gray;') }}width:24px;">
          </a>
        </li>
        <li class="nav-item">
          <a href="javascript:void(0);" onclick="document.getElementById('post-logout').submit();" style="padding-left:5px;padding-right:5px;" class="nav-link">
            <img src="https://cdn-icons-png.flaticon.com/512/4034/4034229.png" alt="lang-en" style="width:25px;">
          </a>
        </li>
        <!-- Navbar Search -->
        {{-- <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li> --}}

        <!-- Messages Dropdown Menu -->
        {{-- <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li> --}}
        <!-- Notifications Dropdown Menu -->
        {{-- <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li> --}}
        {{-- <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li> --}}
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #541e1e;">
      <!-- Brand Logo -->
      <a href="{{ url('/') }}" class="brand-link" style="background-color: #7e0000;">
        <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width:30px;height:30px;object-fit:cover;">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('https://cdn-icons-png.flaticon.com/512/2304/2304226.png') }}" style="width:34px;height:34px;object-fit:cover;" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="{{ url('profile') }}" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="javascript:void(0);" class="nav-link" onclick="document.getElementById('post-logout').submit();">
                <i class="nav-icon fa fa-power-off" aria-hidden="true"></i>
                <p>{{ __('messages.logout') }}</p>
              </a>
              <form method="POST" action="{{ route('logout') }}" id="post-logout">@csrf</form>
            </li>
            <li class="nav-item">
              <a href="{{ url('home') }}" class="nav-link @yield('webadmin-home')">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/webadmin/hotIssue') }}" class="nav-link @yield('webadmin-hotIssue')">
                <i class="nav-icon far fa-flag"></i>
                <p>{{ __('messages.hotIssue') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/webadmin/pupup') }}" class="nav-link @yield('webadmin-pupup')">
                <i class="nav-icon fas fa-bell"></i>
                <p>{{ __('messages.pupup') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/webadmin/slideShow') }}" class="nav-link @yield('webadmin-slideShow')">
                <i class="nav-icon fas fa-images"></i>
                <p>{{ __('messages.slideShow') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/webadmin/about-us') }}" class="nav-link @yield('webadmin-about-us')">
                <i class="nav-icon fas fa-address-card"></i>
                <p>{{ __('messages.about-us') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/webadmin/customer') }}" class="nav-link @yield('webadmin-customer')">
                <i class="nav-icon fab fa-intercom"></i>
                <p>{{ __('messages.customer') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/webadmin/news-activities') }}" class="nav-link @yield('webadmin-news-activities')">
                <i class="nav-icon fas fa-rss"></i>
                <p>{{ __('messages.news-activities') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/webadmin/our-service') }}" class="nav-link @yield('webadmin-our-service')">
                <i class="nav-icon fas fa-th"></i>
                <p>{{ __('messages.our-service') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/webadmin/related-link') }}" class="nav-link @yield('webadmin-related-link')">
                <i class="nav-icon fas fa-link"></i>
                <p>{{ __('messages.related-link') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/webadmin/join-us') }}" class="nav-link @yield('webadmin-join-us')">
                <i class="nav-icon fas fa-user-md"></i>
                <p>{{ __('messages.join-us') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/webadmin/contact-us') }}" class="nav-link @yield('webadmin-contact-us')">
                <i class="nav-icon fas fa-address-book"></i>
                <p>{{ __('messages.contact-us') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/webadmin/vote') }}" class="nav-link @yield('webadmin-vote')">
                <i class="nav-icon fas fa-signal"></i>
                <p>{{ __('messages.vote') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/webadmin/facebookPlugin') }}" class="nav-link @yield('webadmin-facebookPlugin')">
                <i class="nav-icon fab fa-facebook-messenger"></i>
                <p>{{ __('messages.facebookPlugin') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/webadmin/administration') }}" class="nav-link @yield('webadmin-administration')">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>{{ __('messages.administration') }}</p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a style="color:rgb(196, 105, 105);" href="{{ url('/webadmin/system-configuration') }}" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>{{ __('messages.system-configuration') }}</p>
              </a>
            </li> --}}
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        {{-- <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard v3</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v3</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid --> --}}
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            @yield('content')
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark"></aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>{{ __('messages.copyright') }}</strong>
      {{-- <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div> --}}
    </footer>
  </div>
  <script src="{{ asset('js/backend.js') }}?_={{ time() }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.2/ckeditor.js"></script>
  @yield('script')
</body>
</html>