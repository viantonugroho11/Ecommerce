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
            <h1>Detail Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('product.index') }}">List Product</a></li>
              <li class="breadcrumb-item active">Detail Product</li>
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
          <h3 class="card-title">{{ $product->nama }}</h3>

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
                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Harga</span>
                      <span class="info-box-number text-center text-muted mb-0">Rp. {{ $product->harga }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Berat</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $product->berat }}</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Produk</h4>
                    <div class="post">
                      <div class="user-block">
                        <span class="description">Shared publicly - {{ $product->created_at->format('d-m-Y') }}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        {{ $product->deskripsi }}
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Size {{ $product->size }}</a>
                      </p>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Foto Produk</h3>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card">
                      <div class="col-12 col-sm-12">
                        <div class="info-box bg-light">
                          <div class="info-box-content center">
                          <center>
                          <img src="{{ asset('/photoproduct/' . $product->gambar) }}" width="200px" height="200px" alt="{{ $product->nama }}">
                          <center>
                          </div>
                        </div>
                      </div>
                      <!-- /.user-block -->
                    </div>
                  </div>
                </div>
                <div class="text-muted">
                <p class="text-sm">Rekomendasi
                  <b class="d-block">{{ $product->rekom }}</b>
                </p>
                <p class="text-sm">Slide
                  <b class="d-block">{{ $product->slide }}</b>
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection