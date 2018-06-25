<!DOCTYPE html>
<html>
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>用户登录</title>

	    <link href="{{asset('public/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('public/Admin/css/font-awesome.min.css')}}" rel="stylesheet">
	    <link href="{{asset('public/Admin/css/style.min.css')}}" rel="stylesheet">
		<style>
			footer {
				display: none;
			}
			.login-box{
				height:260px;
			}
		</style>

	</head>

<body>
	<div class="container-fluid content">
		<div class="row">
			<div class="login-box">
				<div class="header">后台用户登录</div>
				<form class="form-group login" method="post">
					{{csrf_field()}}
					<fieldset class="col-sm-12">
						<div class="form-group">
							<div class="controls row">
								<div class="input-group col-sm-12">
									<input type="text" class="form-control" name="username" placeholder="用户账号"/>
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="controls row">
								<div class="input-group col-sm-12">
									<input type="password" class="form-control" name="password" placeholder="用户密码"/>
									<span class="input-group-addon"><i class="fa fa-key"></i></span>
								</div>
							</div>
						</div>

						<br/>
						<div class="row">

							<button type="submit" class="btn btn-lg btn-primary col-xs-12">登陆</button>

						</div>
						<div class="controls row" style="text-align: center;color:red">
							@if(session('msg'))
								{{session('msg')}}
							@endif
						</div>
					</fieldset>

				</form>
			</div>
		</div><!--/row-->
	</div>
</body>
</html>