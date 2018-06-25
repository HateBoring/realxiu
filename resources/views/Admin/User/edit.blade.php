<!DOCTYPE html>
<html>
	<head>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>修改</title>
		@include('Admin/Public/header')
	</head>
<body>
<div>@include('Admin/Public/topheader')</div>{{--引入头部--}}
	<div class="container-fluid content">
		<div class="row">
            <div>@include('Admin/Public/leftnav')</div>{{--引入左导航--}}
			{{--content--}}
			<div class="main">
				<div class="row">
					<div class="col-lg-12">
						<h3 class="page-header"><i class="fa fa-laptop"></i>管理员编辑</h3>
						<ol class="breadcrumb">
							<li><i class="fa fa-home"></i><a href="#">管理员</a></li>
							<li><i class="fa fa-laptop"></i>管理员编辑</li>
						</ol>
					</div>
				</div>
				@if(count($errors)>0)
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">×</button>
						@if(is_object($errors))
							@foreach($errors->all() as $error)
								{{$error}}
							@endforeach
						@else
						@endif
					</div>
				@endif
				@if(session('message'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">×</button>
						{{session('message')}}
					</div>
				@endif
				<div class="row col-lg-8">
					<form class="form-horizontal" action="{{url('Admin/user')}}" method="post">
						{{csrf_field()}}
						<div class="form-group">
							<label for="username" class="col-sm-2 control-label">账户</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="username" name="username" placeholder="请填写账户">
							</div>
						</div>
						<div class="form-group">
							<label for="nicname" class="col-sm-2 control-label">昵称</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nicname" name="nicname" placeholder="请填写昵称">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">密码</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="password" name="password" placeholder="请输入密码">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">确认密码</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="password" name="repwd" placeholder="请再输入一次密码">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">权限</label>
							<div class="col-sm-2 ">
								<select class="form-control" name="role">
									<option value="1" select="selected">编辑</option>
									<option value="2">管理员</option>
									<option value="3">超级管理员</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-success">确定</button>
								<a href="#" onclick="javascript:history.back(-1);" class="btn btn-primary" style="margin-left:20px">返回到上一页</a>
							</div>
						</div>
					</form>
				</div>
			</div>
			{{--content--}}
		<br><br><br>
		</div>
	</div>
@include('Admin/Public/footer')
</body>
</html>