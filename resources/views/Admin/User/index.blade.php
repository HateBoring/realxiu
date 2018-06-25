<!DOCTYPE html>
<html>
	<head>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>管理员管理</title>
		@include('Admin/Public/header')
		<script src="{{asset('resources/org/layer/layer.js')}}"></script>
		<style>
			.table-hover td{
				line-height:35px !important;
			}
		</style>
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
						<h3 class="page-header"><i class="fa fa-users"></i> 管理员</h3>
						<ol class="breadcrumb">
							<li><i class="fa fa-home"></i><a href="#">后台系统</a></li>
							<li><i class="fa fa-laptop"></i>管理员</li>
						</ol>
					</div>
				</div>
				<div class="row col-lg-12"><a href="{{action('Admin\UserController@create')}}" class="btn btn-success">新增管理员</a></div>
				<div class="row">
					<div class="col-lg-6">
						<table class="table table-hover">
							<from method="post" >
								<thead>
								<tr>
									<th style="width:20%;">管理员ID</th>
									<th style="width:20%;">账号</th>
									<th style="width:20%;">级别</th>
									{{--<th style="width:20%;">状态</th>
									<th style="width:20%;">操作</th>--}}
								</tr>
								</thead>
								<tbody>
								@foreach($users as $v)
									<tr>
										<td>{{$v->id}}</td>
										<td>{{$v->username}}</td>
										<td>
											@if ($v['role'] == 1)
												<span>编辑</span>
											@elseif ($v['role'] == 2)
												<span>管理员</span>
											@elseif($v['role'] == 3)
												<span>超级管理员</span>
											@endif
										</td>
										{{--<td>
											@if($v->status==1)
												<span style="color:#00d400;">开启</span>
											@elseif($v->status==2)
												<span style="color:#d40020;">关闭</span>
											@endif

										</td>
										<td>
											@if($v->status==1)
												<a href="#" onclick="stopUser({{$v->id}})" class="btn btn-danger">停用</a>
											@elseif($v->status==2)
												<a href="#" onclick="openUser({{$v->id}})" class="btn btn-info">开启</a>
											@endif


										</td>--}}
									</tr>
								@endforeach
								</tbody>
							</from>
						</table>
					</div>
				</div>
			</div>
			{{--content--}}
		<br><br><br>
		</div>
	</div>

<script>
    /*function stopUser(id) {
        layer.confirm('您确定要停用吗？',{
            btn: ['确定','取消'],
        },function(){                        // 当确定时执行
            //发送异步
            $.post("{{--{{url('Admin/user/open')}}--}}/"+id+'/'+'1',{'_method':'get','_token':"{{--{{csrf_token()}}--}}"},function(data){
                if(data.status==0){
                    layer.msg(data.msg,{icon:6},function(){
                        location.href=location.href;
                    });
                }else{
                    layer.msg(data.msg,{icon:5});
                }
            });
        },function(){});//取消
    }*/
</script>
@include('Admin/Public/footer')
</body>
</html>