<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>文章内容</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/Home/css/article.css')}}">
	@include('Home/Public/indexlink')
	@include('Home/Public/navlink')
</head>
<body>
<div>@include('Home/Public/nav')</div>
	{{--content--}}
	<div class="articlecontent">
		{{--top--}}
		<div class="art-top">

			<h2 style="display:inline-block ">{{$data->title}}</h2>
			@if($type=='Admin')
				<a href="{{action('Admin\StatusController@status', ['id' => $data->art_id,'status'=>'1'])}}" style="margin:0 0 10px 5px;" class="btn btn-info">通过</a>
				<a href="{{action('Admin\StatusController@status', ['id' => $data->art_id,'status'=>'2'])}}" style="margin:0 0 10px 5px;" class="btn btn-warning">未通过</a>
			@endif

			<div class="art-msg">
				<div class="art-msg-left"><span>{{date('Y-m-d H:i',$data->create_time)}}</span><span>{{$data->author}}</span></div>
				<div class="art-msg-right">
					<a href="#"><span class="glyphicon glyphicon-heart-empty"></span> {{$data->like}}</a>
					<a href="#"><span class="glyphicon glyphicon-comment"></span> {{$data->art_comment}}</a>
					<a href="#"><span class="glyphicon glyphicon-eye-open"></span> {{$data->count}}</a>
				</div>
			</div>
		</div>
		{{--top--}}
		{{--bottom--}}
		<div class="art-bottom">
			<div class="art-content">
				<div>

					{!! $data->content !!}

				</div>
				<div class="art-status">
					<a href="#">
						<span class="glyphicon glyphicon-heart-empty"></span> {{$data->like}}
					</a>
				</div>
				<div style="margin-top:20px;">
					<span style="font-weight:bold;">关键字：</span><a href="#">{{$data->keywords}}</a>
				</div>
				<div>
					<h4>相关阅读</h4>
					<div class="art-relevant">
						<ul>
							@foreach($list as $key=>$value)
							<li><a href="#">{{$key}}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="art-list">
				<div class="art-list-title"><span class="glyphicon glyphicon-menu-hamburger"></span> 推荐文章</div>
				<div class="art-list-con">
					<ul>
						@foreach($recommend as $key=>$value)
							<li><a href="#">{{$key}}</a></li>
						@endforeach
					</ul>
				</div>
				<div class="art-list-title"><span class="glyphicon glyphicon-menu-hamburger"></span> 最新文章</div>
				<div class="art-list-con">
					<ul>
						@foreach($newArt as $key=>$value)
							<li><a href="#"><span class="glyphicon glyphicon-minus"></span> {{$key}}</a></li>
						@endforeach
					</ul>
				</div>
				<div class="art-list-title"><span class="glyphicon glyphicon-menu-hamburger"></span> 阅读排行</div>
				<div class="art-list-con">
					<ul>
						@foreach($countArt as $key=>$value)
							<li><a href="#"><span class="glyphicon glyphicon-minus"></span> {{$key}}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	{{--content--}}

</body>
</html>