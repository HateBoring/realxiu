<?php
namespace App\Http\Controllers\Admin;
use App\Http\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;


class LoginController extends CommonController
{
    public function login(Request $request)//需要在函数添加，否则不能使用@request
    {
        if(!session('user')){

            if($input=Input::all()){
                $username=$input['username'];
                $password=$input['password'];
                $res=Admin::where('username',$username)->first();
                if(!$res['username']||$password!=Crypt::decrypt($res['password'])){
                    return back()->with('msg','用户名或密码不正确');
                }
                $request->session()->put('user',$res);//把数据存储到session
                $request->session()->save();
                return redirect('Admin/index');

            }else{
                return view('Admin.login');
            }
        }else{
            return redirect('Admin/index');
        }

    }
    public function quit(){
        session(['user'=>null]);
        return redirect('Admin/login');
    }


}