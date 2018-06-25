<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //图片上传
    public function upload()
    {
        $file = Input::file('Filedata');//获取上传信息
        if($file->isValid()){//如果上传信息存在

            $entension=$file->getClientOriginalExtension();//上传文件的后缀
            $newName=date('YmdHis').mt_rand(100,999).'.'.$entension;//重命名
            $path=$file->move(base_path().'/uploads',$newName);//上传文件路径重写
            $filepath='uploads/'.$newName;
            return $filepath;
        }
    }
}