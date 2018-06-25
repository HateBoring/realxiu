<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Article;
use Validator;
use Illuminate\Http\Request;

class IndexController extends CommonController
{
    public function index(Request $request)
    {
        /*//time();当前时间
        $over=strtotime("+1 day");
        create_time>=time();*/
        $date=strtotime(date('Y-m-d', time()));
        /*dd($date);*/
        $today=Article::where('create_time','>=',$date)->count();
        $all=Article::count();
        return view('Admin/index')->with([
            'today'=>$today,
            'all'=>$all
        ]);
    }

    public function leftnav(){
        return view('Admin/Public/leftnav');
    }

    public function topheader(){
        return view('Admin/Public/topheader');
    }
    public function lockscreen(){
        return view('Admin/Public/lockscreen');
    }
    public function page_404(){
        return view('Admin/Public/page_404');
    }
    //更改管理员密码
    /*public function editpass(){
        if($input=Input::all()){
            //编写验证规则，验证规则需要用数组的方式呈现
            $rules=[
                //验证字段=》验证方法1|验证方法2|验证方法3
                'newpass'=>'required|between:6,20|confirmed',
            ];
            //编写提示信息，验证规则需要用数组的方式呈现
            $message=[
                'newpass.required'=>'新密码不能为空',
                'newpass.between'=>'密码必须在6-20位之间',
                'newpass.confirmed'=>'新密码和确认密码不一致',
            ];
            //Validator::make laravel自带的验证规则，需要引入use Dotenv\Validator;
            $validator=Validator::make($input,$rules,$message);
            //passes()方法，判断是否为空
            if($validator->passes()){
                echo 'yes';
            }else{
                /*dd($val->errors()->all());*/
                /*return back()->withErrors($validator);*/
                /*dd(back()->withErrors());*/
                /*return back()->withErrors();
            }
        if(){
        }else{
            return view('Admin/editpass');
        }

    }*/
}