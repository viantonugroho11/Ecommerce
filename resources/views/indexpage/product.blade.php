@extends('index')
@section('slide')
<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
@endsection
@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
			@include('tools.side ')
			</div>	
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach($product1 as $item)
						<a href="{{ route('productdetail.index', $item->id_produk) }}">
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{ asset('/photoproduct/' . $item->gambar) }}" alt="" />
										<h2>{{$item->harga}}</h2>
										<p>{{$item->nama}}</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<!-- <a href="{{ route('productdetail.index', $item->id_produk) }}">
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>{{$item->harga}}</h2>
											<p>{{$item->nama}}</p>
											<form role="form" action="{{ route('kategori.store') }}" method="POST">
                								@csrf
												<input type="text" name="idproduk" class="form-control invisible" value="{{ $item->id_produk }}">
												<input type="text" name="jumlah" class="form-control invisible" value="1">
											<button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart
											</button>
											</form>
										</div>
									</div>
									</a> -->
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<!-- <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li> -->
									</ul>
								</div>
							</div>
						</div>
						</a>
						@endforeach
						<ul class="pagination">
						{{ $product1->Links() }}
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
@endsection