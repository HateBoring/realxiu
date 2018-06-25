{{--头部--}}
<div class="navbar" role="navigation">

    <div class="container-fluid">

        <ul class="nav navbar-nav navbar-actions navbar-left">
            <li class="visible-md visible-lg"><a href="#" id="main-menu-toggle"><i class="fa fa-th-large"></i></a></li>
            <li class="visible-xs visible-sm"><a href="#" id="sidebar-menu"><i class="fa fa-navicon"></i></a></li>
        </ul>

        <form class="navbar-form navbar-left">
            <button type="submit" class="fa fa-search"></button>
            <input type="text" class="form-control" placeholder="请输入搜索内容..."></a>
        </form>
        <ul class="nav navbar-nav navbar-right" >
            <li class="dropdown visible-md visible-lg">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Session::get('user.nicname') }} <span class="glyphicon glyphicon-menu-down"></span></a>
                <ul class="dropdown-menu"">
                    <li><a href="#"><i class="fa fa-user"></i> 个人信息</a></li>
                    <li><a href="#"><i class="fa fa-wrench"></i> 设置</a></li>
                    <li><a href="{{url('Admin/lockscreen')}}"><i class="fa fa-lock"></i> 锁屏</a></li>
                    <li class="divider"></li>
                    <li><a href="{{url('Admin/quit')}}"><i class="fa fa-sign-out"></i>退出登录</a></li>
                </ul>
            </li>
        </ul>
    </div>

</div>
{{--头部--}}