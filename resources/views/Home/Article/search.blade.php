<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>文章内容</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/Home/css/search.css')}}">
	@include('Home/Public/indexlink')
	@include('Home/Public/navlink')
</head>
<body>
<div>@include('Home/Public/nav')</div>
	{{--content--}}
	<div class="main">
        <div class="artlist">
		@if($list)
            @foreach($list as $key=>$value)
                <a href="#">
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
		@endif
        </div>
	</div>
	{{--content--}}

</body>
</html>