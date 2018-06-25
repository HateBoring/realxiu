<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Admin\CommonController;
use App\Http\Model\Article;
use App\Http\Model\Article_content;
use App\Http\Model\Cate;

class ArticleController extends CommonController {
    public function index(){
        $id=$_GET['art_id'];
        $data=Article::find($id);
        $data['content']=Article_content::find($id)->value('content');
        //相关阅读根据文章cateid查询文章
        $cateid=$data['cateid'];
        $list=Article::where('cateid',$cateid)
            ->orderBy('art_id','desc')
            ->take(10)
            ->pluck('art_id','title');
        //推荐文章like
        $recommend=Article::orderBy('like','desc')
            ->take(7)
            ->pluck('art_id','title');
        //最新文章art_id desc
        $newArt=Article::orderBy('art_id','desc')
            ->take(7)
            ->pluck('art_id','title');
        //阅读排行count
        $countArt=Article::orderBy('count','desc')
            ->take(7)
            ->pluck('art_id','title');
        return view('Home/Article/index')->with([
            'data'=>$data,
            'type'=>'Home',
            'list'=>$list,
            'recommend'=>$recommend,
            'newArt'=>$newArt,
            'countArt'=>$countArt
        ]);
    }
    public function search(){
        $search=$_GET['search'];
        $cate=Cate::all();
        if(isset($search)){
            $list=Article::where('title','like','%'.$search.'%')->get();
        }
        return view('Home/Article/search')->with([
            'list'=>$list,
            'cate'=>$cate
        ]);
    }
}