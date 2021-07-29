@extends('index')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="POST" action="{{ route('login') }}">
                        	@csrf
							<input placeholder="Email Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
							@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
							<input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							<span>
							<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
							<label class="form-check-label" for="remember">
								{{ __('Remember Me') }}
							</label>
							</span>
							<button type="submit" class="btn btn-default">Login</button>
							@if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form method="POST" action="{{ route('register') }}">
                        	@csrf

							<input placeholder="Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							<input placeholder="Email Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							<input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								<input placeholder="Re-Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
								<textarea id="alamat" placeholder="Alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus></textarea>

                                @error('Alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								<div class="form-group">
								</div>
								<div class="form-group">
								<input placeholder="Nomor Telepon" id="nohp" type="number" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ old('nohp') }}" required autocomplete="nohp" autofocus>

                                @error('nohp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<select name="province_id" id="province_id" class="form-control">
								<option value="">Provinsi Anda</option>
								@foreach ($provinsi  as $row)
								<option value="{{$row['province_id']}}" namaprovinsi="{{$row['province']}}">{{$row['province']}}</option>
								@endforeach
								</select>
								</div>
								<div class="form-group">
								<!-- <input type="text" class="form-control" nama="nama_provinsi" placeholder="ini untuk menangkap nama provinsi "> -->
								</div>
								<div class="form-group ">
								<select name="kota_id" id="kota_id" class="form-control">
								<option value="">Kota Anda</option>
								</select>
								</div>
								<input placeholder="Kode Pos" id="kodepos" type="number" class="form-control @error('kodepos') is-invalid @enderror" name="kodepos" value="{{ old('kodepos') }}" required autocomplete="kodepos" autofocus>

                                @error('kodepos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							<button type="submit" class="btn btn-default">{{ __('Register') }}</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div> 
    </section><!--/form-->
    @endsection
	
	@section('scriptjs')
	<script src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>
	<script>
$(document).ready(function(){
//ini ketika provinsi tujuan di klik maka akan eksekusi perintah yg kita mau
//name select nama nya "provinve_id" kalian bisa sesuaikan dengan form select kalian
$('select[name="province_id"]').on('change', function(){
// kita buat variable provincedid untk menampung data id select province
let provinceid = $(this).val();
//kita cek jika id di dpatkan maka apa yg akan kita eksekusi
if(provinceid){
// jika di temukan id nya kita buat eksekusi ajax GET
jQuery.ajax({
// url yg di root yang kita buat tadi
url:"/kota/"+provinceid,
// aksion GET, karena kita mau mengambil data
type:'GET',
// type data json
dataType:'json',
// jika data berhasil di dapat maka kita mau apain nih
success:function(data){
// jika tidak ada select dr provinsi maka select kota kososng / empty
$('select[name="kota_id"]').empty();
// jika ada kita looping dengan each
$.each(data, function(key, value){
// perhtikan dimana kita akan menampilkan data select nya, di sini saya memberi name select kota adalah kota_id
$('select[name="kota_id"]').append('<option value="'+ value.city_id +'" namakota="'+ value.type +' ' +value.city_name+ '">' + value.type + ' ' + value.city_name + '</option>');
});
}
});
}else {
$('select[name="kota_id"]').empty();
}
});
});
</script>
	@endsection