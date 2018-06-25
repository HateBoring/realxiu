<!DOCTYPE html>
<html>
	<head>
    	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>404</title>
	    <!-- Css files -->
	    <link href="{{asset('public/Admin/css/bootstrap.min.css')}}" rel="stylesheet">
	    <link href="{{asset('public/Admin/css/style.min.css')}}" rel="stylesheet">
		<style>
			footer {
				display: none;
			}
		</style>
	</head>

<body>
	<div class="container-fluid content">
		<div class="row">
			<div id="content" class="col-sm-12 full">
				<div class="row box-error">
					<div class="col-lg-12 col-md-12 col-xs-12">
					<div class="text-center">
						<h1>404</h1>
						<h2>o(╥﹏╥)o 页面找不到了...</h2>
						<p>您可以尝试以下选择</p>
						<a href="javascript: history.go(-1)" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span> 返回到上一页</a>
						<a href="{{url('/')}}" class="btn btn-default"><span class="glyphicon glyphicon-home"></span> 返回首页</a>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>