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
@endsection

@section('js')
<!-- jQuery -->
<script src="{{ asset('/back/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/back/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('/back/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/back/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/back/dist/js/demo.js')}}"></script>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penjualan Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Transaksi Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">


          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                    
                      <span class="info-box-text text-center text-muted">Ongkir</span>
                      @foreach ($detail as $item)
                      {{ $item->ongkir }}
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total Produk</span>
                      @foreach ($detail as $item)
                      {{ $item->jumlah_produk }}
                      @endforeach
                      
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total Harga</span>
                      @foreach ($detail as $item)
                      {{ $item->total_harga }}
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Produk</h4>
                    <div class="post">
                    @foreach ($detail as $item)
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="col-12 col-sm-12">
                                        <div class="info-box bg-light">
                                          <div class="info-box-content">
                                          <center>
                          <img src="{{ asset('/photoproduct/' . $item->gambar) }}" width="100px" height="100px" alt="{{ $item->nama }}">
                          <center>
                                          </div>
                                        </div>
                                    </div>
                                  <!-- /.user-block -->
                                  <div class="card-body">
                                    <p>
                                        <b>Jumlah Pembelian</b><br>
                                        {{ $item->jumlah }}
                                    </p>
                                    <p><b>Total Harga</b><br>
                                        Rp. {{ $item->total }}
                                    </p>
                                  </div>
                                  
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Alamat</h3>
              <p class="text-muted">
                  Alamat
              </p>
              {{ $item->alamat }}
              <br>
              <div class="text-muted">
                <p class="text-sm">Jasa Pengiriman
                    <b class="d-block">{{ $item->jasa_kirim }}</b>
                  </p>
                <p class="text-sm">Status
                  <b class="d-block">
                    <div class="form-group">
                        <select name="status" class="form-control select2" style="width: 100%;">
                          <option selected="selected">Antri</option>
                          <option>Proses</option>
                          <option>Kirim</option>
                        </select>
                      </div>
                  </b>
                </p>
                <p class="text-sm">No Resi
                  <b class="d-block"><div class="form-group">
                    <input name="noresi" type="text" class="form-control" placeholder="No Resi...">
                  </div></b>
                </p>
              </div>

              <h5 class="mt-5 text-muted">Bukti Transfer</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                </li>
              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Save</a>
                <a href="#" class="btn btn-sm btn-warning">Print</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>@endsection