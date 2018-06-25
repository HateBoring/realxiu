<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="#">
    <title>浏览记录
	</title>
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
				<table class="table table-hover" style="margin-top:20px;">
					<thead>
					<tr>
						<th>2018-6-1 <a href="#" class="conmore"><span class="glyphicon glyphicon-plus "></span></a></th>
						<th></th>
						<th></th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td><a href="#">干啥的噶十多个</a></td>
						<td>丶什么都会泛光</td>
						<td>2015-02-11</td>
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