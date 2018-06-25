<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>文章内容</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/Home/css/cate.css')}}">
	@include('Home/Public/indexlink')
	@include('Home/Public/navlink')
</head>
<body>
<div>@include('Home/Public/nav')</div>
	{{--content--}}
	<div class="main">
		<div class="title">{{$_GET['type']}}</div>
		<div class="ptitle">
			@foreach(Session::get('cate2') as $key=>$value)
				@if($value->pid==$_GET['cateid'])
					<a href="#">{{$value->title}}</a>
				@endif
			@endforeach
		</div>
		<div class="artlist">
			@foreach($list as $key=>$value)
				<a href="{{action('Home\ArticleController@index',['art_id'=>$value->art_id])}}">
					<span class="artlabel">
						@foreach($cate as $k=>$v)
						@if($v->id==$value->cateid)
							[ {{$v->title}} ]
						@endif
						@endforeach
					</span>
					<span class="arttitle">{{$value->title}}</span>
					<span class="create_time">{{date('Y-m-d H:i',$value->create_time)}}</span>
				</a>
			@endforeach
		</div>
	</div>
	{{--content--}}

</body>
</html>