@extends('master')

@section('css')
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/back/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('/back/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('/back/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('/back/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('/back/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('/back/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/back/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('/back/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
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
<!-- Select2 -->
<script src="{{ asset('/back/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('/back/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{ asset('/back/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('/back/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- date-range -->
<script src="{{ asset('/back/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('/back/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('/back/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('/back/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/back/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/back/dist/js/demo.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  $(document).ready(function () {
    bsCustomFileInput.init();
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
            <h1>Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item "><a href="{{ route('product.index')}}">List Product</a></li>
              <li class="breadcrumb-item active">Create Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form role="form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <!-- Produk -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Produk</h3>
                </div>
                <div class="card-body">
                  <!-- Color Picker -->
                  <div class="form-group">
                      <label>Nama Produk</label>
                      <input name="nama" type="text" class="form-control" placeholder="Nama Produk">
                    </div>
                  <!-- /.form group -->
                  <!-- kategori -->
                  <div class="form-group">
                      <label>Kategori</label>
                      <select name="kategori" class="form-control select2" style="width: 100%;">
                      @foreach ($kategori as $row)
                      <option value="{{ $row->id }}">{{ $row->nama }}</option>
                      @endforeach
                      </select>
                    </div>
                    <!-- Merek -->
                    <div class="form-group">
                      <label>Merek</label>
                      <select name="merek" class="form-control select2" style="width: 100%;">
                      @foreach ($merek as $mk)
                      <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
                      @endforeach
                      </select>
                    </div>
                    <!-- foto produk -->
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="Gambar" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text" id="">Upload</span>
                        </div>
                      </div>
                    </div>
                    <!-- Deskripsi -->
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi"></textarea>
                    </div>
                    <!-- Harga -->
                    <div class="form-group">
                      <label>Harga</label>
                      <input name="harga" type="number" class="form-control" placeholder="Harga">
                    </div>
                    <!-- Berat -->
                    <div class="form-group">
                      <label>Berat</label>
                      <input name="berat" type="number" class="form-control" placeholder="Berat">
                    </div>
                    <!-- Slide -->
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Slide</h3>
                      </div>
                      <div class="card-body">
                        <input type="checkbox" name="slide" value="Y" data-bootstrap-switch>
                        <!-- <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success"> -->
                      </div>
                    </div>
                    <!-- Rekomendasi -->
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Rekomendasi</h3>
                      </div>
                      <div class="card-body">
                        <input type="checkbox" name="rekomend" value="Y" data-bootstrap-switch>
                        <!-- <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success"> -->
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="row">
                  <div class="col-md-6">
                      <button type="Submit" class="btn btn-block btn-primary btn-flat">
                          <i class="fas fa-save"></i> Save
                      </button>
                  </div>
                  <div class="col-md-6">
                      <button type="Reset" class="btn btn-block btn-primary btn-flat">
                          <i class="fas fa-cancel"></i> cancel
                      </button>
                  </div>
              </div>
              </div>
          </div>
          <!-- /.row -->
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection