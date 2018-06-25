<div class="connav">
    <a href="{{action('Home\UserController@index')}}" class="active"><span class="glyphicon glyphicon-user"></span> <span class="connavt">我的资料</span></a>
    <a href="{{action('Home\UserController@collection')}}"><span class="glyphicon glyphicon-heart-empty"></span> <span class="connavt">我的收藏</span></a>
    <a href="{{action('Home\UserController@myarticle')}}"><span class="glyphicon glyphicon-list-alt"></span> <span class="connavt">我的文章</span></a>
    <a href="{{action('Home\UserController@record')}}"><span class="glyphicon glyphicon-time"></span> <span class="connavt">浏览记录</span></a>
</div>