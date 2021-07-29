@extends('index')
@section('slide')
<section id="slider"><!--slider-->
<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						@foreach( $slide as $sl )
							<li data-target="#slider-carousel" data-slide-to="{{$loop->index}}" class="{{ $loop->first ? 'active' : '' }}"></li>
						@endforeach
						</ol>

						<div class="carousel-inner">
						@foreach( $slide as $sl )
							<div class="item {{ $loop->first ? 'active' : '' }}">
								<div class="col-sm-6">
									<h1>{{$sl->nama}}</h1>
									<h2>{{$sl->harga}}</h2>
									<p>{{$sl->deskripsi}}</p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('/photoproduct/' . $sl->gambar) }}" class="girl img-responsive" alt="" />
								</div>
							</div>
						@endforeach
						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
        </div>
</section>
@endsection
        @section('content')
        <div class="container">
			<div class="row">
				<div class="col-sm-3">
                @include('tools.side ')
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach($product1 as $pd1)

						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ asset('/photoproduct/' . $pd1->gambar) }}" alt="" />
											<h2>{{$pd1->harga}}</h2>
											<p>{{$pd1->nama}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										hh
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>{{$pd1->harga}}</h2>
												<p>{{$pd1->nama}}</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
										</a>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
					</div><!--features_items-->

					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
							@if($kategori)
							@foreach($kategori as $count=>$pdpane)
								<li @if($count==0) class="active" @endif>
								<a href="#{{$pdpane->id}}" data-toggle="tab">
								{{$pdpane->nama}}
								</a>
								</li>
							@endforeach
							@endif
							</ul>
						</div>
						<div class="tab-content">
						@if($kategori)
						@foreach($product as $pdpane)
							<div @if($count==0) class="tab-pane fade active in"@else class="tab-pane fade" @endif id="{{$pdpane->kategori}}" >
								@php
								$kode=$pdpane->kategori;
								@endphp
								@foreach($product as $pdpane)
								@if($pdpane->kategori==$kode)
								<a href="{{ route('productdetail.index', $pdpane->id_produk) }}">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{ asset('/photoproduct/' . $pdpane->gambar) }}" alt="" />
												<h2>{{$pdpane->harga}}</h2>
												<p>{{$pdpane->nama}}</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>

										</div>
									</div>
								</div>
								</a>
								@endif
								@endforeach
							</div>
						@endforeach
						@endif
						</div>
					</div><!--/category-tab-->

					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
							@foreach($rekomend->chunk(3) as $productCollections)
                				<div class="item {{ $loop->first ? 'active' : '' }}">
								@foreach($productCollections as $rekom)
								<a href="{{ route('productdetail.index', $rekom->id_produk) }}">
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('/photoproduct/' . $rekom->gambar) }}" alt="" />
													<h2>{{$rekom->harga}}</h2>
													<p>{{$rekom->nama}}</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>

											</div>
										</div>
									</div>
								</a>
									@endforeach
								</div>
								@endforeach
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
						</div>
					</div><!--/recommended_items-->

				</div>
			</div>
		</div>
        @endsection
