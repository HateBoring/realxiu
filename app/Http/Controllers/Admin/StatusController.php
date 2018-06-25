<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Article;


class StatusController extends CommonController
{
    //全部分类列表
    public function status()
    {
        $id=$_GET['id'];
        $data=array('status'=>$_GET['status']);
        $res=Article::where('art_id',$id)->update($data);
        return redirect('Admin/article');


    }

}