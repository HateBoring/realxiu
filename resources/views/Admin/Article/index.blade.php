<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台文章页</title>
    @include('Admin/Public/header')
    <script src="{{asset('resources/org/layer/layer.js')}}"></script>
</head>
<body>
<div>@include('Admin/Public/topheader')</div>{{--引入头部--}}
<div class="container-fluid content">
    <div class="row">
        <div>@include('Admin/Public/leftnav')</div>{{--引入左导航--}}
        {{--内容--}}
        <div class="main">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-clipboard"></i>文章管理</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">后台</a></li>
                        <li><i class="fa fa-picture-o"></i>文章管理</li>
                    </ol>
                </div>
            </div>
            <div class="art-btn">
                <a href="{{action('Admin\ArticleController@create')}}" class="btn btn-success">添加文章</a>
                <a href="{{action('Admin\ArticleController@index',['status'=>0])}}" class="btn btn-default">未审核</a>
                <a href="{{action('Admin\ArticleController@index',['status'=>1])}}" class="btn btn-info">审核通过</a>
                <a href="{{action('Admin\ArticleController@index',['status'=>2])}}" class="btn btn-danger">未通过</a>
                <a href="{{action('Admin\ArticleController@index')}}" class="btn btn-primary">全部文章</a>
                <div class="form-group col-md-5">
                    <form action="{{action('Admin\ArticleController@index')}}" method="get">
                    <div>
                        <div class="input-group">
                            <input type="text" id="search" name="search" class="form-control" placeholder="请输入搜索内容">
                            <span class="input-group-btn">
                                <input type="submit" class="btn btn-success">搜索</input>
                            </span>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
            <div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>文章标题</th>
                        <th>状态</th>
                        <th>责任编辑</th>
                        <th>缩略图</th>
                        <th>点击次数</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td><a href="#">{{$list->title}}</a></td>
                        <td
                            @if($list->status == 0)
                            style="color:#000000">未审核
                            @elseif($list->status == 1)
                            style="color:#17c100">审核通过
                            @elseif($list->status == 2)
                            style="color:#ff0000">未通过
                            @endif
                        </td>
                        <td>{{$list->author}}</td>
                        <td><img src="{{$list->thumb}}" width="200"/></td>
                        <td>{{$list->count}}</td>
                        <td>{{date('Y-m-d H:i',$list->create_time)}}</td>
                        <td>
                            <a href="{{action('Admin\ArticleController@edit', ['id' => $list->art_id])}}" class="btn btn-info">修改</a>
                            <a href="{{action('Admin\ArticleController@show', ['id' => $list->art_id])}}" class="btn btn-success">预览</a>
                            <a href="javascript:;" onclick="delArt('{{$list->art_id}}')" class="btn btn-danger">删除</a>
                            {{--<a href="" class="btn btn-danger">删除</a>--}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <div style="text-align: center">{{$data->links()}}</div>
        </div>
        </div>
        {{--内容--}}
</div>
<script>
    function delArt(id) {
        layer.confirm('您确定要删除吗？',{
            btn: ['确定','取消'],
        },function(){                        // 当确定时执行
           //发送异步
            $.post("{{url('Admin/article/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
                if(data.status==0){
                    layer.msg(data.msg,{icon:6},function(){
                        location.href=location.href;
                    });
                }else{
                    layer.msg(data.msg,{icon:5});
                }
            });
        },function(){});//取消
    }
</script>
@include('Admin/Public/footer')
</body>
</html>