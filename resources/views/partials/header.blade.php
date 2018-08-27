<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/png" href="{{ asset('asset/dist/img/logo.png') }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ url('asset/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('asset/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url('asset/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('asset/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url('asset/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ url('asset/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ url('asset/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ url('asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('asset/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ url('asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SIW</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SI</b>  Wawancara</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- Notifications: style can be found in dropdown.less -->
          @if(Auth::check())
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(auth()->user()->unreadNotifications->count())
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">{{ auth()->user()->unreadNotifications->count() }}</span>
              @else
              <i class="fa fa-bell-o"></i>
              @endif
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">  
                @if(auth()->user()->unreadNotifications->count())  
                @foreach(auth()->user()->unreadNotifications as $notification)  
                @if(!empty($notification->data['revisi']['topic']))            
                  <li>
                    <a href="{{ route('tampil.user.edit', $notification->data['revisi']['id']) }}">
                      Revisi - {{ $notification->data['revisi']['topic'] }}
                    </a>
                  </li>
                @endif
                @if(!empty($notification->data['selesai']['topic']))            
                  <li>
                    <a href="{{ route('selesai', $notification->data['selesai']['id']) }}">
                      Selesai - {{ $notification->data['selesai']['topic'] }}
                    </a>
                  </li>
                @endif
                  @endforeach
                  @else
                  <li>
                    <a href="#">
                      Tidak ada pemberitahuan
                    </a>
                  </li>
                  @endif

                </ul>
              </li>
              <!-- <li class="footer"><a href="#">View all</a></li> -->
            </ul>
          </li>
          @endif

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('storage/'.Auth::user()->avatar) }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('storage/'.Auth::user()->avatar) }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                  @if (Auth::user()->name === "admin")
                  <small>Admin</small>
                  @else
                  <small>Staff</small>
                  @endif
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">

                  <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>

                </div>
                <div class="pull-right">
                  <button
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"
                      class="btn btn-default btn-flat">Sign out</button>
                  <form id="logout-form" action="{{ route('user.logout') }}" method="GET" style="display: none;">
                    @csrf
                  </form>                  
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
