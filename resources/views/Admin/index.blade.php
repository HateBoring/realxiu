<!DOCTYPE html>
<html>
	<head>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>后台首页</title>
		@include('Admin/Public/header')
	</head>
<body>
<div>@include('Admin/Public/topheader')</div>{{--引入头部--}}
	<div class="container-fluid content">
		<div class="row">
            <div>@include('Admin/Public/leftnav')</div>{{--引入左导航--}}
			{{--content--}}
			<div class="main">
				{{--面包屑--}}
				<div class="row">
					<div class="col-lg-12">
						<h3 class="page-header"><i class="fa fa-laptop"></i> 主页</h3>
						<ol class="breadcrumb">
							<li><i class="fa fa-home"></i><a href="#">后台系统</a></li>
							<li><i class="fa fa-laptop"></i>主页</li>
						</ol>
					</div>
				</div>
				{{--数据--}}
				<div class="row">

					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="info-box">
							<div class="title">今日新增文章</div>
							<div class="count">{{$today}}篇</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="info-box">
							<div class="title">总文章</div>
							<div class="count">{{$all}}篇</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="info-box">
							<div class="title">今日访问数</div>
							<div class="count">325K</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="info-box">
							<div class="title">总访问数</div>
							<div class="count">259K</div>
						</div>
					</div>
				</div>
				{{--联系列表--}}
				<div class="row" style="margin-top:20px;">
					<div class="col-lg-5">
						<table class="table table-hover">
							<thead>
							<tr>
								<th>人事部</th>
								<th>职务</th>
								<th>电话</th>
								<th>邮箱</th>
								<th>QQ</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>杨震</td>
								<td>普通职员</td>
								<td>13436890542</td>
								<td>627315114@qq.com</td>
								<td>627315114</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			{{--content--}}
		<br><br><br>
		</div>
	</div>
@include('Admin/Public/footer')
</body>
</html>