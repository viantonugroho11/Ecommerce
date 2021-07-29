<!DOCTYPE html>
<html>
<hOead>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  @yield('css')
  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('admintools.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admintools.side')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  @include('admintools.footer')

  <!-- Control Sidebar -->
  @include('admintools.aside')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@yield('js')

</body>
</html>
