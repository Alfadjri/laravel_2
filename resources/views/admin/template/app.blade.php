<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{asset('/asset/css/adminlte/adminlte.min.css')}}">
<link rel="stylesheet" href="{{asset('/asset/css/adminlte/all.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('admin.template.navbar')
    @include('admin.template.slidebar_left')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                @yield('url')
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            @yield('content')
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
    </div>
  </div>

  <!-- Main Footer -->
  <footer class="main-footer">
    @yield('footer')
    @include('admin.template.footer')
  </footer>
</div>
<script src="{{asset('asset/js/adminlte/jquery/jquery.js')}}"></script>
<script src="{{asset('asset/js/adminlte/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('asset/js/adminlte/js/adminlte.js')}}"></script>
</body>
</html>
