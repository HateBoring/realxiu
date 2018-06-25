<div class="wrap">
	<div class="header">
		<a href="{{asset('/')}}">Realxiu</a><a href="{{url('/')}}" class="index">首页</a>
	</div>
	<div class="top-nav">
		<div id="navList" class="navlist-wrap">

			<div class="navlist clearfix">

				<a href="" class="nav-btn" data-device="#androidItem">文章分类 <span class="glyphicon glyphicon-menu-down"></span></a>
				<a href="" class="nav-btn" data-device="#iphoneItem">会员 <span class="glyphicon glyphicon-menu-down"></span></a>
				<a href="" class="nav-btn" data-device="#ipadItem">栏目3 <span class="glyphicon glyphicon-menu-down"></span></a>
				<a href="" class="nav-btn" data-device="#pcItem">栏目4 <span class="glyphicon glyphicon-menu-down"></span></a>
				<a href="" class="nav-btn" data-device="#searchItem"><span class="glyphicon glyphicon-search"></span></a>
				<div class="user">
					<a href="#" id="openlogin">登录</a>
					<a href="#" id="openreg">注册</a>
				</div>
			</div>
		</div>
		<div id="expandZone" class="expand active">
			<div class="download">
				<div id="androidItem" class="item">
					<div class="download-list">
                        @foreach(Session::get('cate1') as $key=>$value)
							<a href="{{action('Home\CateController@index',['cateid'=>$value->id,'type'=>$value->title])}}">{{$value->title}}</a>
                        @endforeach
					</div>
				</div>
				<div id="iphoneItem" class="item">
					<div class="download-list">
						<a href="#">aaaaa</a>
					</div>
				</div>
				<div id="ipadItem" class="item">
					<div class="download-list">
						<a href="#">bbbbb</a>
					</div>
				</div>
				<div id="pcItem" class="item">
					<div class="download-list">
						<a href="#">ccccc</a>
					</div>
				</div>
				<div id="searchItem" class="item">
					<div class="download-list" style="border:none !important; ">
						<div style="margin:0 auto;width:500px;">
                            <form method="get" action="{{action('Home\ArticleController@search')}}">
                                <div class="input-group">
									{{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                                    <input type="text" name="search" class="form-control" placeholder="搜索内容">
                                    <span class="input-group-btn">
                                        <input class="btn btn-default" type="submit" value="搜索" />
                                    </span>
                                </div><!-- /input-group -->
                            </form>
						</div>
					</div>
				</div>
			</div>
			<div id="closeBtn" class="close-btn"><span class="glyphicon glyphicon-triangle-top"></span></div>
		</div>
		<div class="nav-bottom-bg"></div>
	</div>
</div>
<script>
    $(document).ready(function(){
        $("#openlogin").click(function(){
            $(".userlogin").fadeIn();
        });
        $("#loginclose").click(function(){
            $(".userlogin").fadeOut();
        });
        $("#openreg").click(function(){
            $(".userreg").fadeIn();
        });
        $("#regclose").click(function(){
            $(".userreg").fadeOut();
        });
        $(".username").click(function(){
            $(".userbox").slideDown();
        });
        $(".closeuserbox").click(function(){
            $(".userbox").slideUp();
        });
    });
</script>

<div class="userlogin">
	<div class="loginbox">
		<div class="logintitle">用户登录<a href="#" id="loginclose"><span class="glyphicon glyphicon-remove"></span></a></div>
		<form class="form-horizontal">
			<p>
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
				<input type="text" class="form-control" placeholder="请输入账户">
			</div>
			</p>
			<p>
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
				<input type="text" class="form-control" placeholder="请输入密码">
			</div>
			</p>
			<p>
				<input type="submit" class="btn btn-info submit" value="立即登录"/>
			</p>
		</form>
	</div>
</div>
<div class="userreg">
	<div class="regbox">
		<div class="logintitle">注册账户<a href="#" id="regclose"><span class="glyphicon glyphicon-remove"></span></a></div>
		<form class="form-horizontal">
			<p>
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
				<input type="text" class="form-control" placeholder="请输入账户">
			</div>
			</p>
			<p>
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
				<input type="text" class="form-control" placeholder="请输入密码">
			</div>
			</p>
			<p>
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
				<input type="text" class="form-control" name="repassword" placeholder="请重复输入密码">
			</div>
			</p>
			<p>
			<div class="input-group">
				<img src="/public/Home/images/25.jpg" style="width:120px;height:30px;" class="codeimg"/>
				<input type="text" class="form-control code" name="repassword" placeholder="验证码">

			</div>
			</p>
			<p>
				<input type="submit" class="btn btn-info submit" value="立即注册" />
			</p>
		</form>
	</div>
</div>