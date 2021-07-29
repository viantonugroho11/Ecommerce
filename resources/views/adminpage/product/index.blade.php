@extends('master')
@section('css')
   <!-- Font Awesome -->
   <link rel="stylesheet" href="{{ asset('/back/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/back/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

 <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  
@endsection
@section('js')
<!-- jQuery -->
<script src="{{ asset('/back/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/back/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/back/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/back/dist/js/demo.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('/back/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('/back/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('/back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
              <li class="breadcrumb-item active">Table Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Produk</h3>
                <a href="{{ route('product.create') }}" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMBAH DATA</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Merek</th>
                    <th>Harga</th>
                    <th>Slide</th>
                    <th>Rekomend</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($product as $pd)
                    <tr>
                      <td>{{$pd->nama}}</td>
                      <td>{{$pd->kategori}}</td>
                      <td>{{$pd->merek}}</td>
                      <td>{{$pd->harga}}</td>
                      <td>{{$pd->slide}}</td>
                      <td>{{$pd->rekom}}</td>
                      <td><img src="{{ asset('/photoproduct/' . $pd->gambar) }}" width="100px" height="100px" alt="{{ $pd->nama }}"></td>
                      <td>
                      <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('product.destroy', $pd->id) }}" method="POST">
                              <a href="{{ route('product.edit', $pd->id) }}" class="btn btn-sm btn-primary">Edit</a>
                              <a href="{{ route('product.detail', $pd->id) }}" class="btn btn-sm btn-primary">Detail</a>
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                          </form>
                      </td>
                    </tr>
                  @endforeach  
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>    
  
@endsection