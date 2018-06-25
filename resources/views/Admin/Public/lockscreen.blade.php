<!DOCTYPE html>
<html>
	<head>
    	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Proton - Admin Template</title>

	    <!-- Css files -->
	    <link href="{{asset('public/Admin/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('public/Admin/css/jquery.mmenu.css')}}" rel="stylesheet">
		<link href="{{asset('public/Admin/css/font-awesome.min.css')}}" rel="stylesheet">
		<link href="{{asset('public/Admin/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">
	    <link href="{{asset('public/Admin/css/style.min.css')}}" rel="stylesheet">
		<link href="{{asset('public/Admin/css/add-ons.min.css')}}" rel="stylesheet">
		<style>
			footer {
				display: none;
			}
		</style>
	</head>

<body>
	<div class="container-fluid content">
		<div class="row">
			<div id="content2" class="col-sm-12 full">
			
				<div class="row">

					<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3 login-box-locked">
					
						<img src="{{asset('public/img/avatar.jpg')}}" class="avatar img-responsive"/>
					
						<h2>Jhon Smith</h2>
						<p>jhonsmith@mail.com</p>					
					
						<input id="prependedInput" class="form-control" size="16" type="password" placeholder="Enter your password">						
						<span class="help-block">
							<a href="#">
								<small>Forgot password ?</small>
							</a>
						</span>
						<label class="checkbox">
							<input type="checkbox" name="remember" id="remember" value="option">Remember me ?
						</label>
						<div class="pull-right">
							<a href="page-login.html">				
								<button type="button" class="btn btn-primary">Login</button>
							</a>
						</div>
					</div><!--/col-->

				</div><!--/row-->
		
			</div><!--/content-->	
			
		</div><!--/row-->
		
		
		
		<div id="usage-blank">
			<ul>
				<li>
					<div class="title">Memory</div>
					<div class="bar">
						<div class="progress">
						  	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>
						</div>
					</div>			
					<div class="desc">2GB of 8GB</div>
				</li>
				<li>
					<div class="title">HDD</div>
					<div class="bar">
						<div class="progress">
						  	<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
						</div>
					</div>			
					<div class="desc">750GB of 1TB</div>
				</li>
				<li>
					<div class="title">SSD</div>
					<div class="bar">
						<div class="progress">
					  		<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%"></div>
						</div>
					</div>			
					<div class="desc">300GB of 1TB</div>
				</li>
				<li>
					<div class="title">Bandwidth</div>
					<div class="bar">
						<div class="progress">
					  		<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
						</div>
					</div>			
					<div class="desc">50TB of 50TB</div>
				</li>
			</ul>	
		</div>			
		
	</div><!--/container-->
		
		
	<!-- start: JavaScript-->
	<!--[if !IE]>-->

			<script src="/public/Admin/js/jquery-2.1.1.min.js"></script>

	<!--<![endif]-->

	<!--[if IE]>
	
		<script src="/public/Admin/js/jquery-1.11.1.min.js"></script>
	
	<![endif]-->

	<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/public/Admin/js/jquery-2.1.1.min.js'>"+"<"+"/script>");
		</script>

	<!--<![endif]-->

	<!--[if IE]>
	
		<script type="text/javascript">
	 	window.jQuery || document.write("<script src='/public/js/jquery-1.11.1.min.js'>"+"<"+"/script>");
		</script>
		
	<![endif]-->
	<script src="/public/Admin/js/jquery-migrate-1.2.1.min.js"></script>
	<script src="/public/Admin/js/bootstrap.min.js"></script>

	
	<!-- theme scripts -->
	<script src="/public/Admin/js/SmoothScroll.js"></script>
	<script src="/public/Admin/js/jquery.mmenu.min.js"></script>
	<script src="/public/Admin/js/core.min.js"></script>

	
	<!-- end: JavaScript-->
	
</body>
</html>