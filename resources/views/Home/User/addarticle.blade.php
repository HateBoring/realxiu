<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="#">
    <title>新增文章</title>
	<link rel="stylesheet" type="text/css" href="{{asset('public/Home/css/user.css')}}">
	{{--引入公共样式--}}
	@include('Home/Public/indexlink')
	@include('Home/Public/navlink')
	{{--ueditor--}}
	<script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
	<script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"> </script>
	<script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
	<script type="text/javascript">
        var ue = UE.getEditor('editor');//实例化编辑器
	</script>
	<script src="{{asset('resources/org/layer/layer.js')}}"></script>
</head>
<body>
	{{--<include file="Index/nav"/>--}}
	<div>@include('Home/Public/nav')</div>

	<div id="page-content" class="index-page" style="margin-top:100px;">
		<div class="content-box">
			<div class="nub_cot0"><div class="nub_sub0">个人中心</div></div>
			{{--conleft--}}
			@include('Home/User/public')
			{{--conright--}}
			<div class="concon" style="font-size:14px">
				<form class="form-horizontal" method="post" action="">

					<div class="form-group">
						<label for="title" class="col-sm-1 control-label">标题</label>
						<div class="col-md-6">
							<input type="text" class="form-control " name="title" id="title">
						</div>
					</div>
					<div class="form-group">
						<label for="artstyle" class="col-sm-1 control-label">分类</label>
						<div class="col-md-3">
							<select class="form-control" name="cateid" id="artstyle">
								<option value="1">MYSQL</option>
								<option value="11">&mdash;&mdash; MYSQL技术1</option>
								<option value="13">AJAX</option>
								<option value="14">PHP</option>
								<option value="18">444444444444444444</option>
								<option value="19">&mdash;&mdash; 22222222222222</option>
								<option value="3">Laravel</option>
								<option value="8">&mdash;&mdash; Laravel技术1</option>
								<option value="9">&mdash;&mdash; Laravel技术2</option>
								<option value="4">JQuery</option>
								<option value="10">&mdash;&mdash; JQuery技术1</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="small_title" class="col-sm-1 control-label" >内容</label>
						<div class="col-md-10">
							<script id="editor" name="content" type="text/plain" style="height:1000px;">
                            </script>
						</div>
					</div>
					<div class="form-group">
						<label for="small_title" class="col-sm-1 control-label" ></label>
						<div class="col-md-10">
							<input type="button" value="提交" onclick="issubmit()" class="btn btn-info col-sm-2" />
                            <a href="#" onclick="javascript:history.back(-1);" class="btn btn-danger col-sm-2" style="margin-left:20px">返回</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<script>
function issubmit(id) {
	layer.prompt({
        title: '请输入您的登录密码，并确认', formType: 1
	}, function () {
		/*确定*/
		//获取ID发送异步
		$.post("{{url('Admin/article')}}/" + id, {
			'_token': '{{ csrf_token() }}',
			'_method': 'delete'
		}, function (data) {
			if (data.status == 0) {
				layer.msg(data.msg, {icon: 1});//成功
			} else {
				layer.msg(data.msg, {icon: 2});//失败
			}
		});
	}, function () {
		/*取消*/
	});
}
</script>
	{{--<include file="copyright" />
	<include file="footer" />	--}}
</body>
</html>