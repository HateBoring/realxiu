<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台首页</title>
    @include('Admin/Public/header')
    {{--引入upload--}}
    <script src="{{asset('resources/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/uploadify.css')}}">
    {{--引入upload--}}
    {{--引入ueditor--}}
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"> </script>
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
    <script type="text/javascript">
        var ue = UE.getEditor('editor');
    </script>
    {{--引入ueditor--}}
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
                        <h3 class="page-header"><i class="fa fa-clipboard"></i>文章管理
                            <a href="#" onclick="javascript:history.back(-1);" class="btn btn-primary" style="margin-left:20px">返回到上一页</a>
                        </h3>

                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index.html">后台</a></li>
                            <li><i class="fa fa-picture-o"></i>添加文章</li>
                        </ol>
                    </div>
                </div>
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
            <div class="art-insert">
                <form class="form-horizontal" method="post" action="{{url('Admin/article')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">文章标题</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control " name="title" id="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="small_title" class="col-sm-2 control-label" >短标题</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="small_title" id="small_title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="author" class="col-sm-2 control-label">作者</label>
                        <div class="col-md-2">
                            <input name="author" class="form-control" value="{{session('user')['nicname']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="titlecolor" class="col-sm-2 control-label">标题颜色</label>
                        <div class="col-md-2">
                            <select class="form-control" name="title_color" id="titlecolor">
                                <option>黑色</option>
                                <option>红色</option>
                                <option>黄色</option>
                                <option>蓝色</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="artstyle" class="col-sm-2 control-label">文章分类</label>
                        <div class="col-md-2">
                            <select class="form-control" name="cateid" id="artstyle">
                                @foreach($cates as $cate)
                                    <option value="{{$cate->id}}">{{$cate->_title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">

                        <label for="inputname" class="col-sm-2 control-label">缩略图:</label>
                        <div class="col-sm-5">
                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#file_upload').uploadify({
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : "{{csrf_token()}}"
                                        },
                                        'swf'      : "{{asset('resources/org/uploadify/uploadify.swf')}}",
                                        'uploader' : "{{action('Admin\ImageController@upload')}}",
                                        'buttonText': '上传图片',
                                        'onUploadSuccess' : function(file, data, response) {
                                            $('#thumb_img').attr('src','/'+data);
                                            $('#thumb').attr('value','/'+data);

                                        }
                                    });
                                });
                            </script>
                            <style>
                                .uploadify{display:inline-block;}
                                .uploadify-button{border:none;border-radius:5px;background: #009cff}
                            </style>
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                            <img src="" id="thumb_img" name="thumb" width="200"/>
                            <input type="hidden" name="thumb" value="" id="thumb"/>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editor" class="col-sm-2 control-label">内容</label>
                        <div class="col-md-8">
                            <script id="editor" type="text/plain" name="content" style="height:1000px;"></script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label" >描述</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="description" id="description" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keywords" class="col-sm-2 control-label" >关键字</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="keywords" id="keywords">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="submit" class="col-sm-2 control-label" ></label>
                        <div class="col-md-4">
                         <input type="submit" class="btn btn-success btn-lg" value="提交内容" id="submit"/>
                        </div>
                    </div>

                </form>
            </div>


            </div>
        </div>
        {{--内容--}}




    </div><!--/container-->

<script src="{{asset('public/Admin/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('public/Admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/Admin/js/core.min.js')}}"></script>
<script src="{{asset('resources/org/layer/layer.js')}}"></script>

</body>
</html>