<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ __('messages.company_name_full') }}</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+Thai|Sono|Poppins&display=fallback">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/logo.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.ico') }}">
  <link rel="stylesheet" href="{{ asset('css/backend.css') }}?_={{ time() }}">
  @if(app()->getLocale()=='th')
  <style>
      html, body {
          font-family: 'Noto Sans Thai', sans-serif !important;
      }
  </style> 
  @else
  <style>
      html, body {
          font-family: 'Poppins', sans-serif !important;
      }
  </style>
  @endif
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
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ url('/') }}" class="nav-link" target="_blank">ไปยังหน้าเว็บ</a>
        </li>
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
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #3b0404;">
      <!-- Brand Logo -->
      <a href="{{ url('webadmin') }}" class="brand-link" style="background-color: #810606;">
        <img src="{{ asset('images/logo.png') }}" class="brand-image img-circle elevation-3" style="width:30px;height:30px;object-fit:cover;background:white;">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image" style="background: white;border-radius: 20px;padding: 2px;margin-left: 7px;">
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
            <li class="nav-item" style="display:none;">
              <a href="javascript:void(0);" class="nav-link" onclick="document.getElementById('post-logout').submit();">
                <i class="nav-icon fa fa-power-off" aria-hidden="true"></i>
                <p>{{ __('messages.logout') }}</p>
              </a>
              <form method="POST" action="{{ route('logout') }}" id="post-logout">@csrf</form>
            </li>

            <li class="nav-item">
              <a href="{{ url('home') }}" class="nav-link @yield('webadmin-home')">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>{{ __('messages.home') }}</p>
              </a>
            </li>

            <li class="nav-header">{{ strtoupper(('Main menu')) }}</li>
            <li class="nav-item menu-is-opening menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>{{ __('messages.content-management') }} <i class="right fas fa-angle-left"></i></p>
              </a>
              <ul class="nav nav-treeview" style="display: block;">
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
                  <a href="{{ url('/webadmin/history') }}" class="nav-link @yield('webadmin-history')">
                    <i class="nav-icon fas fa-th"></i>
                    <p>{{ __('messages.history') }}</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/webadmin/customer') }}" class="nav-link @yield('webadmin-customer')">
                    <i class="nav-icon fab fa-intercom"></i>
                    <p>{{ __('messages.customer') }}</p>
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
              </ul>
            </li>
            <li class="nav-item">
              <a href="{{ url('/webadmin/system-configuration') }}" class="nav-link @yield('webadmin-system-configuration')">
                <i class="nav-icon fas fa-wrench"></i>
                <p>{{ __('messages.system-configuration') }}</p>
              </a>
            </li>

            <li class="nav-header">{{ strtoupper(('Other menu')) }}</li>
            <li class="nav-item  menu-is-opening menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-question"></i>
                <p>{{ __('messages.other') }} <i class="right fas fa-angle-left"></i></p>
              </a>
              <ul class="nav nav-treeview" style="display: block;">
                <li class="nav-item">
                  <a href="{{ url('/webadmin/one-stop-service') }}" class="nav-link @yield('webadmin-one-stop-service')">
                    <i class="nav-icon far fa-star"></i>
                    <p>{{ __('messages.one-stop-service') }}</p>
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
                  <a href="{{ url('/webadmin/supplier-meeting') }}" class="nav-link @yield('webadmin-supplier-meeting')">
                    <i class="nav-icon fas fa-users"></i>
                    <p>{{ __('messages.supplier-meeting') }}</p>
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
              </ul>
            </li>


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
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
  @yield('script')
</body>
</html>