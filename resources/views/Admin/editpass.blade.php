<!DOCTYPE html>
<html>
	<head>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>修改密码</title>

		{{--公共样式--}}
		<link href="/public/Admin/css/bootstrap.min.css" rel="stylesheet">
		<link href="/public/Admin/css/jquery.mmenu.css" rel="stylesheet">
		<link href="/public/Admin/css/font-awesome.min.css" rel="stylesheet">
		<link href="/public/Admin/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
		<link href="/public/Admin/css/style.min.css" rel="stylesheet">

	</head>
	<style>
		.col-center-block {
			float: none;
			display: block;
			margin-left: auto;
			margin-right: auto;
			margin-top:40px;
		}
		.editpass{
			padding-bottom:10px;
			text-align:center;
			color:red;
		}
	</style>

	<body>

	<div>@include('Admin/public/topheader')</div>{{--引入头部--}}

	
	<div class="container-fluid content">
	
		<div class="row">

            <div>@include('Admin/public/leftnav')</div>{{--引入左导航--}}
		
		{{--content--}}
			<div class="main row">
				<div class="col-xs-7 col-sm-4 col-center-block">
					<form class="form-horizontal" method="post" action="">
						{{csrf_field()}}
						@if(count($errors)>0)
							xxx
						@endif
						<div class="form-group">
							<label for="pass" class="col-sm-2 control-label">原始密码</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="pass" name="pass" placeholder="原始密码">
							</div>
						</div>
						<div class="editpass">密码错误</div>
						<div class="form-group">
							<label for="newpass" class="col-sm-2 control-label">新密码</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="newpass" name="newpass" placeholder="新密码">
							</div>
						</div>
						<div class="editpass">新密码不能为空</div>
						<div class="form-group">
							<label for="conpass" class="col-sm-2 control-label">确认密码</label>
							<div class="col-sm-10">
																					{{--新密码name值_confirmation--}}
								<input type="text" class="form-control" id="conpass" name="newpass_confirmation" placeholder="确认新密码">
							</div>
						</div>
						<div class="editpass">两次输入的密码不一致</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-success" {{--onclick="return confirm('修改密码成功后需要重新登录，确认修改密码吗？')"--}}>确认修改密码</button>
							</div>
						</div>

					</form>
				</div>

			</div>
		{{--content--}}

	<div class="clearfix"></div>
	<script src="/public/Admin/js/jquery-2.1.1.min.js"></script>
	<script src="/public/Admin/js/bootstrap.min.js"></script>
	<!-- theme scripts -->
	<script src="/public/Admin/js/SmoothScroll.js"></script>
	<script src="/public/Admin/js/jquery.mmenu.min.js"></script>
	<script src="/public/Admin/js/core.min.js"></script>
	<script src="/public/Admin/plugins/d3/d3.min.js"></script>

	
	<!-- end: JavaScript-->
	
</body>
