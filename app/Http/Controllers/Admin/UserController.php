<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class UserController extends CommonController
{
    //全部用户
    public function index()
    {
        $users=User::where('role','!=',0)->get();
        return view('Admin/User/index')->with('users',$users);
    }
    /*public function destroy($id)
    {
        $status['status']=2;
            $res=User::where('id',$id)->update($status);
            if($res){
                $data=[
                    'status'=>0,
                    'msg'=>'用户停用成功',
                ];
            }else{
                $data=[
                    'stauts'=>1,
                    'msg'=>'用户停用失败，请稍后重试',
                ];
            }
        return $data;

    }*/
    //创建用户
    public function create()
    {
       return view('Admin/User/add');
    }

    //接收创建用户数据
    public function store(){
        $input=Input::except('_token','repwd');//排除指定字段
        $inspect=Input::all();//表单验证
        $repwd=Input::only('repwd');//获取指定字段

        //判断新增是否存在
        $username=$input['username'];
        $isres=User::where('username',$username)->first();
        if($input['password']!=$repwd['repwd']){
            return back()->with('message','重复输入密码错误！');
        }
        if($isres!=null){
            return back()->with('message','该账户已存在！');
        }
        $rules=[
            'username'=>'required',
            'nicname'=>'required',
            'password'=>'required',
            'repwd'=>'required',
        ];
        $message=[
            'username.required'=>'账号不能为空',
            'nicname.required'=>'昵称不能为空',
            'password.required'=>'密码不能为空',
            'repwd.required'=>'请重复输入密码',
        ];
        $input['password']=Crypt::encrypt($input['password']);
        $val=Validator::make($inspect,$rules,$message);
        if($val->passes()){
            $res=User::create($input);
            if($res){
                return redirect('Admin/user');
            }else{
                return back()->with('message','数据填充失败');
            }
        }else{
            return back()->withErrors($val);
        }
    }


}