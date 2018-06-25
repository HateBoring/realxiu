<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Admin\CommonController;
use App\Http\Model\Article;
use App\Http\Model\Cate;

class CateController extends CommonController {
    public function index(){
        $cateid=$_GET['cateid'];
        $list=Article::where('cateid','=',$cateid)
            ->orderBy('art_id','desc')
            ->get();
        $cate=Cate::all();
        /*dd($cate);*/
        return view('Home/Cate/index')->with([
            'list'=>$list,
            'cate'=>$cate
        ]);
    }
}