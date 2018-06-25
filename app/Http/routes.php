<?php

//前台路由组
Route::group(['namespace' => 'Home'], function(){
    // Home模块
    Route::get('/', [
        'as' => 'index', 'uses' => 'PublicController@index'
    ]);
    Route::get('nav','PublicController@nav');
    Route::get('user','UserController@index');//用户中心
    Route::get('user/collection','UserController@collection');//我的收藏
    Route::get('user/myarticle','UserController@myarticle');//我的文章
    Route::get('user/record','UserController@record');//我的文章
    Route::get('user/addarticle','UserController@addarticle');//我的文章
    Route::get('article','ArticleController@index');//文章页
    Route::any('search','ArticleController@search');//文章页
    Route::get('cate','CateController@index');

});
//后台路由组
Route::group(['namespace' => 'Admin','prefix'=>'Admin'],function(){
    Route::any('login','LoginController@login');//用户登录
});

Route::group(['namespace' => 'Admin','prefix'=>'Admin','middleware'=>['admin.login']],function(){
    Route::get('index','IndexController@index');
    Route::get('quit','LoginController@quit');//退出登录
    Route::any('editpass','IndexController@editpass');//修改密码
    /*----------leftnav-----------*/
    //Cate 页面路由
    Route::post('cates/changeorder','CateController@changeorder');
    Route::resource('cate','CateController');//资源路由，涉及增删改查
    //Article 页面路由
    Route::resource('article','ArticleController');
    Route::get('status','StatusController@status');
    //User 页面路由
    Route::resource('user','UserController');
    /*----------公共页面-----------*/
    Route::get('lockscreen','IndexController@lockscreen');//锁屏
    Route::get('404','IndexController@page_404');//404页面

    //Icons 页面路由
    Route::get('icons_font_awesome','IconsController@icons_font_awesome');
    Route::get('icons_climacons','IconsController@icons_climacons');

    //图片上传
    Route::any('upload','ImageController@upload');

});
