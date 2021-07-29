@extends('index')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			@php
			$total=0;
			$qty=0;
			@endphp
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					@foreach($cart as $item)
						<tr>
							<td class="cart_product">
								<a href="{{ route('productdetail.index', $item->id_produk) }}"><img src="{{ asset('/photoproduct/' . $item->gambar) }}" width="150px" height="150px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$item->nama}}</a></h4>
								<p>Web ID: {{$item->id_produk}}</p>
							</td>
							<td class="cart_price">
								<p>Rp.{{number_format($item->harga,0,",",".")}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<!-- <a class="cart_quantity_up qty" onclick="increment{{$item->id}}()" href=""> + </a> -->
									<input name="qty" product="{{ $item->id_produk }}" price="{{ $item->harga }}" 
									class="cart_quantity_input qty" id="qty-{{$item->id_produk}}" type="number" 
									name="quantity" value={{$qty = $item->jumlah}} min="1">
									<!-- <a class="cart_quantity_down" href=""> - </a> -->
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price total" id="price-{{$item->id_produk}}">
								Rp.{{number_format($total1 = $item->jumlah*$item->harga,0,",",".")}}
								@php
              					$total = $total + $total1
              					@endphp
								</p>
							</td>
							<td class="cart_delete">
							<form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('cart.destroy', $item->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
								<button type="submit" class="cart_quantity_delete" href="">Hapus</button>
                          </form>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<!-- <h3>What would you like to do next?</h3> -->
				<!-- <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p> -->
			<p>Pengiriman</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Provinsi:</label>
								<input type="text" value="{{$cart[0]->provinsi}}" readonly>
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<input type="text" value="{{$cart[0]->kota}}" readonly>
							</li>
							<li class="single_field">
								<label>Zip Code:</label>
								<input type="text" value="{{$cart[0]->kodepos}}" readonly>
							</li>
							<li class="single_field">
								<label>Alamat</label>
							</li>
					<textarea readonly>
					{{$cart[0]->alamat}}
					</textarea>
					<div class="form-group ">
<label>Pilih Ekspedisi<span>*</span>
</label>
<select name="kurir" id="kurir" class="form-control">
<option value="">Pilih kurir</option>
<option value="jne">JNE</option>
<option value="tiki">TIKI</option>
<option value="pos">POS INDONESIA</option>
</select>
</div>
<div class="form-group">
<label>Pilih Layanan<span>*</span>
</label>
<select name="layanan" id="layanan" class="form-control">
<option value="">Pilih layanan</option>
</select>
</div>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
    </section><!--/#do_action-->

    @endsection

	@section('scriptjs')
	<script src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>
	<script>
	  $(document).ready(function(){
    $('.qty').on("keyup", function(){
      var product = $(this).attr('product');
      var price = $(this).attr('price');
      var total = price * $(this).val();
      $('#price-' + product).html("Rp."+total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));
      updateCart(product, $(this).val());
      countTotal();
    });
  });
  function countTotal(){
    var inputs = $(".qty");
    var grandTotal = 0;
    for(var i = 0; i < inputs.length; i++){
        var price = $(inputs[i]).attr('price');
        var total = price * $(inputs[i]).val();
        grandTotal+=total;
    }
    $('.grand-total').html("Rp."+grandTotal.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));
  }
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
//layanan
	if(courier){
jQuery.ajax({
url:"/origin="+origin+"&destination="+destination+"&weight="+weight+"&courier="+courier,
type:'GET',
dataType:'json',
success:function(data){
$('select[name="layanan"]').empty();
// ini untuk looping data result nya
$.each(data, function(key, value){
// ini looping data layanan misal jne reg, jne oke, jne yes
$.each(value.costs, function(key1, value1){
// ini untuk looping cost nya masing masing
// silahkan pelajari cara menampilkan data json agar lebi paham
$.each(value1.cost, function(key2, value2){
$('select[name="layanan"]').append('<option value="'+ key +'">' + value1.service + '-' + value1.description + '-' +value2.value+ '</option>');
});
});
});
}
});
} else {
$('select[name="layanan"]').empty();
}
function updateCart(id, qty){
    $.ajax({
      type: "POST",
      url: "{{ url('/cart/update') }}",
      data: {_token: "{{ csrf_token() }}", id:id, jumlah:qty},
      dataType: 'json'
    });
  }
	</script>
	@endsection