<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Home | E-Shopper</title>
    <link href="{{ asset('/front/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap -->
    <link href="{{ asset('/front/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- font awesome -->
    <link href="{{ asset('/front/css/prettyPhoto.css')}}" rel="stylesheet">
    <!-- prettyphoto -->
    <link href="{{ asset('/front/css/price-range.css')}}" rel="stylesheet">
    <!-- price -->
    <link href="{{ asset('/front/css/animate.css')}}" rel="stylesheet">
    <!-- animate -->
    <link href="{{ asset('/front/css/main.css')}}" rel="stylesheet">
    <!-- main -->
    <link href="{{ asset('/front/css/responsive.css')}}" rel="stylesheet">
    <!-- responsive -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
                    <!-- top -->
					@include('tools.top')
                    <!-- selesai -->

                    <!-- sosial -->
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
                    </div>
                    <!-- selesai -->
				</div>
			</div>
		</div><!--/header_top-->
		
        <!-- navbar -->
        @include('tools.navbar')
	</header><!--/header-->
	
	@yield('slide')
		
	@yield('content')
	<section>
		
	</section>
	
@include('tools.footer')
	
@yield('scriptjs')
    
    <script src="{{ asset('/front/js/jquery.js')}}"></script>
	<script src="{{ asset('/front/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('/front/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{ asset('/front/js/price-range.js')}}"></script>
    <script src="{{ asset('/front/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset('/front/js/main.js')}}"></script>
</body>
</html>