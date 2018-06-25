<!DOCTYPE html>
<html>
	<head>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>栏目管理</title>
@include('Admin/Public/header')
<script src="{{asset('resources/org/layer/layer.js')}}"></script>
		<style>
			.catebtn{
				margin:10px 0px;
			}
			.catebtn a{
				margin-right:10px;
			}
			table{
				font-size:14px;
			}
		</style>
	</head>
<body>
	<div>@include('Admin/Public/topheader')</div>{{--引入顶部--}}
	<div class="container-fluid content">
		<div class="row">
            <div>@include('Admin/Public/leftnav')</div>{{--引入左导航--}}
			{{--内容--}}
			<div class="main">
				<div class="row">
					<div class="col-lg-12">
						<h3 class="page-header"><i class="fa fa-clipboard"></i>分类管理</h3>
						<ol class="breadcrumb">
							<li><i class="fa fa-home"></i><a href="#">后台</a></li>
							<li><i class="fa fa-picture-o"></i>分类管理</li>
						</ol>
					</div>
				</div>
				<div class="row catebtn">
					<a href="{{url('Admin/cate/create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加分类</a>
					<a href="{{url('Admin/cate')}}" class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span> 全部分类</a>
				</div>
				<div>
					<table class="table table-hover">
						<from method="post" >
							<thead>
							<tr>
								<th>分类标题</th>
								<th>查看次数</th>
								<th>排序（数值越大，维序越高）</th>
								<th>操作</th>
							</tr>
							</thead>
							<tbody>
							@foreach($data as $v)
								<tr>
									<td>{{$v->_title}}</td>
									<td>{{$v->view}}</td>
									<td>
										<input type="text" style="width:80px" name="order[]" onchange="changeOrder(this,{{$v->id}})" value="{{$v->order}}" class="form-control"/>
									</td>
									<td>

										<a href="{{url('Admin/cate/'.$v->id.'/edit')}}" class="btn btn-info">修改</a>
										<a href="javascript:" onclick="delCate('{{$v->id}}')" class="btn btn-danger">删除</a>
									</td>
								</tr>
							@endforeach
							</tbody>
						</from>
					</table>
				</div>
			</div>
			{{--内容--}}
		<br><br><br>
		</div>
	</div>
<script>
	function changeOrder(obj,cate_id){
		var cate_order=$(obj).val();
		$.post("{{url('Admin/cates/changeorder')}}",{
		    '_token':'{{ csrf_token() }}',
			'id':cate_id,
			'order':cate_order
		},function(data){
			if(data.status==0){
				layer.msg(data.msg,{icon:1});//成功
			}else{
				layer.msg(data.msg,{icon:2});//失败
			}

		});
	}
	/*删除分类*/
	function delCate(id){
        layer.confirm('确定要删除该分类吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            /*确定*/
			//获取ID发送异步
			$.post("{{url('Admin/cate')}}/"+id,{
                '_token':'{{ csrf_token() }}',
			    '_method':'delete'
			},function(data){
				if(data.status==0){
                	layer.msg(data.msg,{icon:1},function(){
                        location.href=location.href;
					});//成功
				}else{
					layer.msg(data.msg,{icon:2});//失败
				}
			});
        }, function(){
            /*取消*/
        });
	}
</script>
@include('Admin/Public/footer')
</body>
</html>