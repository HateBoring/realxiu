<!DOCTYPE html>
<html>
	<head>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>栏目编辑</title>
		@include('Admin/Public/header')

	</head>


<body>

	<div>@include('Admin/Public/topheader')</div>{{--引入头部--}}

	
	<div class="container-fluid content">
	
		<div class="row">

            <div>@include('Admin/Public/leftnav')</div>{{--引入左导航--}}
		
		<!-- start: Content -->
			<div class="main">
				<div><h4>添加分类</h4></div>
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
				<div class="row col-sm-6">
					<form class="form-horizontal" action="{{url('Admin/cate/'.$field->id)}}" method="post">
						<input type="hidden" name="_method" value="put" />{{--put方法提交到update--}}
						{{csrf_field()}}
						<div class="form-group">
							<label for="cate" class="col-sm-2 control-label">父级分类选择</label>
							<div class="col-sm-3">
								<select class="form-control" name="pid">
									<option value="0"> 顶级分类</option>
									@foreach($data as $d)
									<option value="{{$d->id}}"
									@if($d->id==$field->pid) selected
									@endif
									>{{$d->title}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">标题</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="title" name="title" value="{{$field->title}}">
							</div>
						</div>
						<div class="form-group">
							<label for="order" class="col-sm-2 control-label">排序</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="order" name="order" value="{{$field->order}}">
							</div>
						</div>
						<div class="form-group">
							<label for="keywords" class="col-sm-2 control-label">关键字</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="keywords" name="keywords" value="{{$field->keywords}}">
							</div>
						</div>
						<div class="form-group">
							<label for="description" class="col-sm-2 control-label">描述</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="description" name="description" value="{{$field->description}}" >
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-success">保存分类</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		<!-- end: Content -->
		<br><br><br>
		</div>
	</div>



@include('Admin/Public/footer');
{{--layer--}}
<script src="{{asset('resources/org/layer/layer.js')}}"></script>
{{--layer--}}

</body>
</html>