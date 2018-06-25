<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="#">
    <title>用户中心</title>
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
				{{--头像--}}
				<div style="overflow:hidden;">
					<div class="pic">
						<a href="#" class="pictext">
							<p><span class="glyphicon glyphicon-pencil picicon"></span></p>
							<p>修改头像</p>
						</a>
						<img src="{{asset('uploads/20180525052651873.png')}}" class="picimg"/>
					</div>
					<div class="usertext">
						<p>丶什么都会泛光 <a href="#" style="color:#ec7f44"><span class="glyphicon glyphicon-edit" ></span></a></p>
						<p>用户等级：</p>
					</div>
				</div>
				{{--头像--}}
				<div class="textcontent">
					<h4>个人信息</h4>
					<p>账户：z627315114</p>
					<p>邮箱：627315114@qq.com <a href="#" style="color:#ec7f44"><span class="glyphicon glyphicon-edit" ></span></a></p>
					<p>Q Q：627315114 <a href="#" style="color:#ec7f44"><span class="glyphicon glyphicon-edit" ></span></a></p>
					<p>号龄：11天</p>
				</div>
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