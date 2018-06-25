<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="#">
    <title>博客首页</title>

	{{--引入公共样式--}}
	@include('Home.Public.indexlink')
	@include('Home.Public.navlink')

</head>
<body>
	<div>@include('Home.Public.nav')</div>
	{{--内容--}}

	<div id="page-content" class="index-page" style="margin-top:100px;">
		<div id="container">
			@foreach($data as $key=>$value)
				<div class="item">
					<a href="{{action('Home\ArticleController@index',['art_id'=>$value->art_id])}}"><img class="example-image" src="{{asset($value->thumb)}}" alt=""/></a>
					<div class="content-item">
						<a href="{{action('Home\ArticleController@index',['art_id'=>$value->art_id])}}">{{$value->title}} </a>
						<div class="time"> {{date('Y-m-d',$value->create_time)}}<span class="artauthor">{{$value->author}}</span></div>
						<p class="info">{!! $value->content !!}</p>
					</div>
					<div class="bottom-item">
						<a href="#"><span class="glyphicon glyphicon-eye-open"></span> {{$value->count}}</a>
						<a href="#"><span class="glyphicon glyphicon-comment"></span> 123</a>
						<a href="#"><span class="glyphicon glyphicon-heart-empty"></span> {{$value->like}}</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>
	{{--内容--}}
	<div style="text-align: center">
		{{$data->links()}}
	</div>

<script type="text/javascript" src="{{asset('public/Home/js/jquery.pinto.js')}}"></script>
<script type="text/javascript" src="{{asset('public/Home/js/main.js')}}"></script>


	{{--<include file="copyright" />
	<include file="footer" />	--}}
</body>
</html>