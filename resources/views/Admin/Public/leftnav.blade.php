{{--左导航--}}
<div class="sidebar ">
    <div class="sidebar-collapse">
        <div class="sidebar-menu">
            <ul class="nav nav-sidebar">
                <li><a href="{{action('Admin\IndexController@index')}}"><i class="fa fa-laptop"></i><span> 后台主页</span></a></li>
                <li><a href="{{url('Admin\cate')}}"><i class="fa fa-outdent"></i><span> 分类管理</span></a></li>
                <li><a href="{{action('Admin\ArticleController@index')}}"><i class="fa fa-clipboard"></i><span> 文章管理</span></a></li>
                <li><a href="{{action('Admin\UserController@index')}}"><i class="fa fa-users"></i><span> 管理员</span></a></li>
                <li>
                    <a href="#"><i class="fa fa-bolt"></i><span class="text"> 图标</span> <span class="fa fa-angle-down pull-right"></span></a>
                    <ul class="nav sub">
                        <li><a href="{{action('Admin\IconsController@icons_font_awesome')}}"><i class="fa fa-meh-o"></i><span class="text"> 字体图标</span></a></li>
                        <li><a href="{{action('Admin\IconsController@icons_climacons')}}"><i class="fa fa-meh-o"></i><span class="text"> 其他图标</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">

        <div class="sidebar-brand">
            realxiu
        </div>
    </div>

</div>
{{--左导航--}}