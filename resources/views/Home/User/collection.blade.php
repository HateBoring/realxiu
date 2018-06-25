<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="#">
    <title>我的收藏</title>
	<link rel="stylesheet" type="text/css" href="{{asset('public/Home/css/user.css')}}">
	{{--引入公共样式--}}
	@include('Home/Public/indexlink')
	@include('Home/Public/navlink')

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
			<div class="concon">
				<div class="collectiont">
					<span>
						<p class="collt1">收藏总数</p>
						<p>135篇</p>
					</span>
					<span>
						<p class="collt1">最近一周收藏</p>
						<p>5篇</p>
					</span>
				</div>
				<div class="collectioneach">
					<form>
						<div style="width:400px;margin-top:20px;">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="请输入想要搜索的文章内容...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">搜索</button>
									</span>
							</div><!-- /input-group -->
						</div>
					</form>
				</div>
				<table class="table table-hover" style="margin-top:20px;">
					<thead>
					<tr>
						<th>文章标题</th>
						<th>作者</th>
						<th>收藏日期</th>
						<th>操作</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td><a href="#">干啥的噶十多个</a></td>
						<td>丶什么都会泛光</td>
						<td>2015-02-11</td>
						<td><a href="#">取消收藏</a></td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<script>
    $(".picimg").mousemove(function(){
        $(".pictext").show();
    });

    $(".pictext").mouseleave(function(){
        $(".pictext").hide();
    });
</script>
	{{--<include file="copyright" />
	<include file="footer" />	--}}
</body>
</html>