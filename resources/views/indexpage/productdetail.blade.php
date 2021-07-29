@extends('index')
@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('tools.side ')
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
							@foreach($product1 as $item)
								<img src="{{ asset('/photoproduct/' . $item->gambar) }}" alt="" />
							@endforeach
							</div>

						</div>
						<form action="{{ route('cart.store') }}" method="POST">
						@csrf
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$pddetail[0]->nama}}</h2>
								<p>Web ID: {{$product1[0]->id_produk}}</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>{{$product1[0]->harga}}</span>
									<label>Quantity:</label>
									<input type="text" value="1" name="qty">
									<input type="text" name="idProduk" value="{{$product1[0]->id_produk}}">
								</span>
								<!-- <p><b>Availability:</b> In Stock</p> -->
								<!-- <p><b>Condition:</b> New</p> -->
								<p><b>Brand:</b> {{$product1[0]->nama}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
							</div><!--/product-information-->
						</div>
						</form>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<div class="col-sm-12">
									<p>{{$product1[0]->deskripsi}}</p>
								</div>
							</div>
							
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
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
													<!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
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
	</section>
@endsection